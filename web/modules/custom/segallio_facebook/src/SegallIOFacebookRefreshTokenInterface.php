<?php

namespace Drupal\segallio_facebook;

use Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler;
use Drupal\social_api\Plugin\NetworkManager;
use Facebook\Authentication\AccessToken;

/**
 * Interface SegallIOFacebookRefreshTokenInterface.
 */
interface SegallIOFacebookRefreshTokenInterface {

  /**
   * Check if a token is expored or not.
   *
   * @return boolean
   */
  public function isExpired();

  /**
   * Making sure the access token is OK.
   *
   * @return AccessToken
   */
  public function ensureToken();

}
