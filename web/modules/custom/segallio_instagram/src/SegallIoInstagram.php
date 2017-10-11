<?php

namespace Drupal\segallio_instagram;

/**
 * Helper class to get the instagram posts.
 */
class SegallIoInstagram {

  /**
   * @return \Drupal\segallio_instagram\SegallIoInstagramPosts
   */
  public static function getApi() {
    return \Drupal::service('segallio_instagram.api');
  }

}
