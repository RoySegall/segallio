<?php

namespace Drupal\segallio_facebook;

use Drupal\social_api\Plugin\NetworkManager;
use Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler;
use Facebook\Authentication\OAuth2Client;

/**
 * Class SegallIOFacebookRefreshToken.
 */
class SegallIOFacebookRefreshToken implements SegallIOFacebookRefreshTokenInterface {

  /**
   * Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler definition.
   *
   * @var \Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler
   */
  protected $socialAuthFacebookPersistentDataHandler;

  /**
   * The access token.
   *
   * @var \Facebook\Authentication\AccessToken
   */
  protected $accessToken;

  /**
   * @var \Facebook\Facebook
   */
  protected $facebook;

  /**
   * Constructs a new SegallIOFacebookGraph object.
   *
   * @param \Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler $social_auth_facebook_persistent_data_handler
   * @param \Drupal\social_api\Plugin\NetworkManager $plugin_network_manager
   */
  public function __construct(FacebookAuthPersistentDataHandler $social_auth_facebook_persistent_data_handler, NetworkManager $plugin_network_manager) {
    $this->socialAuthFacebookPersistentDataHandler = $social_auth_facebook_persistent_data_handler;
    $this->accessToken = $this->socialAuthFacebookPersistentDataHandler->get('access_token');
    $this->facebook = $plugin_network_manager->createInstance('social_auth_facebook')->getSdk();
  }

  /**
   * {@inheritdoc}
   */
  public function isExpired() {
    return $this->accessToken->isExpired();
  }

  /**
   * {@inheritdoc}
   */
  public function ensureToken() {

    if (!$this->isExpired()) {
      return $this->accessToken;
    }

    $oauth = new OAuth2Client($this->facebook->getApp(), $this->facebook->getClient());
    $access_token = $oauth->getLongLivedAccessToken($this->accessToken);
    $this->socialAuthFacebookPersistentDataHandler->set('access_token', $access_token);

    return $access_token;
  }

}
