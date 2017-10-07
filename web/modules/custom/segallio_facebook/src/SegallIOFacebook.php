<?php

namespace Drupal\segallio_facebook;

/**
 * Class SegallIOFacebook.
 */
class SegallIOFacebook {

  /**
   * @return SegallIOFaecebookGraphInterface
   */
  static public function getFacebookGraph() {
    return \Drupal::service('facebook_grpah');
  }

  /**
   * @return SegallIOFacebookRefreshToken
   */
  static public function getFacebookRefreshToken() {
    return \Drupal::service('facebook_refresh_token');
  }

}
