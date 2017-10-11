<?php

namespace Drupal\segallio_github\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\segallio_core\PersistentAccessTokenStorageInterface;
use Drupal\social_api\Plugin\NetworkManager;
use Drupal\social_auth\SocialAuthDataHandler;
use Drupal\social_auth\SocialAuthUserManager;
use Drupal\social_auth_github\GithubAuthManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Returns responses for Simple Github Connect module routes.
 */
class SegallIOGithubAuthController extends ControllerBase {

  /**
   * The network plugin manager.
   *
   * @var \Drupal\social_api\Plugin\NetworkManager
   */
  private $networkManager;

  /**
   * The user manager.
   *
   * @var \Drupal\social_auth\SocialAuthUserManager
   */
  private $userManager;

  /**
   * The github authentication manager.
   *
   * @var \Drupal\social_auth_github\GithubAuthManager
   */
  private $githubManager;

  /**
   * Used to access GET parameters.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  private $request;

  /**
   * The Social Auth Data Handler.
   *
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $dataHandler;

  /**
   * The logger channel.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   * @var PersistentAccessTokenStorageInterface
   */
  protected $persistentAccessToken;

  /**
   * GithubAuthController constructor.
   *
   * @param \Drupal\social_api\Plugin\NetworkManager $network_manager
   *   Used to get an instance of social_auth_github network plugin.
   * @param \Drupal\social_auth\SocialAuthUserManager $user_manager
   *   Manages user login/registration.
   * @param \Drupal\social_auth_github\GithubAuthManager $github_manager
   *   Used to manage authentication methods.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request
   *   Used to access GET parameters.
   * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $social_auth_data_handler
   *   SocialAuthDataHandler object.
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger_factory
   *   Used for logging errors.
   * @param PersistentAccessTokenStorageInterface $persistent_access_token
   */
  public function __construct(
    NetworkManager $network_manager,
    SocialAuthUserManager $user_manager,
    GithubAuthManager $github_manager,
    RequestStack $request,
    SessionInterface $social_auth_data_handler,
    LoggerChannelFactoryInterface $logger_factory,
    PersistentAccessTokenStorageInterface $persistent_access_token
  ) {

    $this->networkManager = $network_manager;
    $this->userManager = $user_manager;
    $this->githubManager = $github_manager;
    $this->request = $request;
    $this->dataHandler = $social_auth_data_handler;
    $this->loggerFactory = $logger_factory;

    // Sets the plugin id.
    $this->userManager->setPluginId('social_auth_github');

    // Sets the session keys to nullify if user could not logged in.
    $this->userManager->setSessionKeysToNullify(['access_token', 'oauth2state']);
    $this->setting = $this->config('social_auth_github.settings');
    $this->persistentAccessToken = $persistent_access_token;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.network.manager'),
      $container->get('social_auth.user_manager'),
      $container->get('social_auth_github.manager'),
      $container->get('request_stack'),
      $container->get('session'),
      $container->get('logger.factory'),
      $container->get('persistent_access_token_storage')
    );
  }

  /**
   * Response for path 'user/login/github'.
   *
   * Redirects the user to Github for authentication.
   */
  public function redirectToGithub() {
    /* @var \League\OAuth2\Client\Provider\Github false $github */
    $github = $this->networkManager->createInstance('social_auth_github')->getSdk();

    // If github client could not be obtained.
    if (!$github) {
      drupal_set_message($this->t('Social Auth Github not configured properly. Contact site administrator.'), 'error');
      return $this->redirect('user.login');
    }

    // Github service was returned, inject it to $githubManager.
    $this->githubManager->setClient($github);

    // Generates the URL where the user will be redirected for Github login.
    // If the user did not have email permission granted on previous attempt,
    // we use the re-request URL requesting only the email address.
    $github_login_url = $this->githubManager->getGithubLoginUrl();

    $state = $this->githubManager->getState();

    $this->dataHandler->set('oauth2state', $state);

    return new TrustedRedirectResponse($github_login_url);
  }

  /**
   * Response for path 'user/login/github/callback'.
   *
   * Github returns the user here after user has authenticated in Github.
   */
  public function callback() {
    // Checks if user cancel login via Github.
    $error = $this->request->getCurrentRequest()->get('error');
    if ($error == 'access_denied') {
      drupal_set_message($this->t('You could not be authenticated.'), 'error');
      return $this->redirect('user.login');
    }

    /* @var \League\OAuth2\Client\Provider\Github false $github */
    $github = $this->networkManager->createInstance('segallio_github_social_auth_github')->getSdk();

    // If Github client could not be obtained.
    if (!$github) {
      drupal_set_message($this->t('Social Auth Github not configured properly. Contact site administrator.'), 'error');
      return $this->redirect('user.login');
    }

    $state = $this->dataHandler->get('oauth2state');

    // Retreives $_GET['state'].
    $retrievedState = $this->request->getCurrentRequest()->query->get('state');
    if (empty($retrievedState) || ($retrievedState !== $state)) {
      $this->userManager->nullifySessionKeys();
      drupal_set_message($this->t('Github login failed. Unvalid oAuth2 State.'), 'error');
      return $this->redirect('user.login');
    }

    // Saves access token to session.
    $this->dataHandler->set('access_token', $this->githubManager->getAccessToken());

    $this->githubManager->setClient($github)->authenticate();

    // Gets user's info from Github API.
    if (!$github_profile = $this->githubManager->getUserInfo()) {
      drupal_set_message($this->t('Github login failed, could not load Github profile. Contact site administrator.'), 'error');
      return $this->redirect('user.login');
    }

    // Since this project handle only a one-man show, I'm overriding the
    // original callback and set the account access token as the general access
    // token.
    if ($github_profile->getNickname() != 'RoySegall') {
      drupal_set_message($this->t('Only RoySegall is allowed'), 'error');
      return $this->redirect('user.login');
    }

    $this->persistentAccessToken->set('github', $this->githubManager->getAccessToken());

    $account = $this->userManager->loadUserByProperty('uid', 1);
    user_login_finalize($account);
    return $this->redirect('<front>');
  }

}
