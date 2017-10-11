<?php

namespace Drupal\segallio_facebook\Controller;

use Drupal\segallio_core\PersistentAccessTokenStorageInterface;
use Drupal\social_api\Plugin\NetworkManager;
use Drupal\social_auth\SocialAuthUserManager;
use Drupal\social_auth_facebook\Controller\FacebookAuthController;
use Drupal\social_auth_facebook\FacebookAuthManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Returns responses for Simple FB Connect module routes.
 */
class SegallIoFacebookAuthController extends FacebookAuthController {

  /**
   * The Facebook authentication manager.
   *
   * @var \Drupal\social_auth_facebook\FacebookAuthManager
   */
  protected $facebookManager;

  /**
   * @var PersistentAccessTokenStorageInterface
   */
  protected $persistentAccessToken;

  /**
   * FacebookAuthController constructor.
   *
   * @param \Drupal\social_api\Plugin\NetworkManager $network_manager
   *   Used to get an instance of social_auth_facebook network plugin.
   * @param \Drupal\social_auth\SocialAuthUserManager $user_manager
   *   Manages user login/registration.
   * @param \Drupal\social_auth_facebook\FacebookAuthManager $facebook_manager
   *   Used to manage authentication methods.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request
   *   Used to access GET parameters.
   * @param \Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler $persistent_data_handler
   *   FacebookAuthPersistentDataHandler object.
   * @param PersistentAccessTokenStorageInterface $persistent_access_token
   */
  public function __construct(
    NetworkManager $network_manager,
    SocialAuthUserManager $user_manager,
    FacebookAuthManager $facebook_manager,
    RequestStack $request,
    FacebookAuthPersistentDataHandler $persistent_data_handler,
    PersistentAccessTokenStorageInterface $persistent_access_token
  ) {
    parent::__construct($network_manager, $user_manager, $facebook_manager, $request, $persistent_data_handler);
    $this->facebookManager = $facebook_manager;
    $this->persistentAccessToken = $persistent_access_token;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.network.manager'),
      $container->get('social_auth.user_manager'),
      $container->get('social_auth_facebook.manager'),
      $container->get('request_stack'),
      $container->get('social_auth_facebook.persistent_data_handler'),
      $container->get('persistent_access_token_storage')
    );
  }

  /**
   * Response for path 'user/login/facebook/callback'.
   *
   * Facebook returns the user here after user has authenticated in FB.
   */
  public function returnFromFb() {
    $parent = parent::returnFromFb();
    $at = $this->facebookManager->getAccessToken();
    $this->persistentAccessToken->set('facebook', $at);
    return $parent;
  }

}
