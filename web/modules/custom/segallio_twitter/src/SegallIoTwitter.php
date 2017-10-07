<?php

namespace Drupal\segallio_twitter;

class SegallIoTwitter {

  /**
   * @return SegallIoTwitterGraphInterface
   */
  static public function getTwitterGraph() {
    return \Drupal::service('segallio_twitter_grpah');
  }

}
