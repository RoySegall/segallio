<?php

namespace Drupal\segallio_facebook;

/**
 * Class SegallIOFacebook.
 */
class SegallIOFacebook {

  /**
   * @return SegallIOFacebookGraph
   */
  static public function getFacebookGraph() {
    return \Drupal::service('facebook_grpah');
  }

}
