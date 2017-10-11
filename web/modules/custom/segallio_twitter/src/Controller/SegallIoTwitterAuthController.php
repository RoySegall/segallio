<?php

namespace Drupal\segallio_twitter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\segallio_core\PersistentAccessTokenStorageInterface;
use Drupal\social_auth_twitter\Controller\TwitterAuthController;
use Drupal\social_auth_twitter\TwitterAuthManager;
use Drupal\social_api\Plugin\NetworkManager;
use Drupal\social_auth\SocialAuthUserManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Zend\Diactoros\Response\RedirectResponse;

/**
 * Manages requests to Twitter API.
 */
class SegallIoTwitterAuthController extends TwitterAuthController {

  /**
   * The session manager.
   *
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $session;

  /**
   * @var PersistentAccessTokenStorageInterface
   */
  protected $persistentAccessToken;

  /**
   * TwitterLoginController constructor.
   *
   * @param \Drupal\social_api\Plugin\NetworkManager $network_manager
   *   Used to get an instance of social_auth_twitter network plugin.
   * @param \Drupal\social_auth_twitter\TwitterAuthManager $twitter_manager
   *   Used to manage authentication methods.
   * @param \Drupal\social_auth\SocialAuthUserManager $user_manager
   *   Manages user login/registration.
   * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
   *   Used to store the access token into a session variable.
   * @param PersistentAccessTokenStorageInterface $persistent_access_token
   */
  public function __construct(
    NetworkManager $network_manager,
    TwitterAuthManager $twitter_manager,
    SocialAuthUserManager $user_manager,
    SessionInterface $session,
    PersistentAccessTokenStorageInterface $persistent_access_token
  ) {
    parent::__construct($network_manager, $twitter_manager, $user_manager, $session);
    $this->persistentAccessToken = $persistent_access_token;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.network.manager'),
      $container->get('twitter_auth.manager'),
      $container->get('social_auth.user_manager'),
      $container->get('session'),
      $container->get('persistent_access_token_storage')
    );
  }

  /**
   * Callback function to login user.
   */
  public function callback() {
    $parent = parent::callback();

    $at = $this->session->get('social_auth_twitter_access_token');

    // Saves access token so that event subscribers can call Twitter API.
    $this->persistentAccessToken->set('twitter', (object) $at);

    return $parent;
  }

}
