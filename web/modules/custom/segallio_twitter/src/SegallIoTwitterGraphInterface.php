<?php

namespace Drupal\segallio_twitter;

interface SegallIoTwitterGraphInterface {

  /**
   * Get the tweets of the user.
   *
   * @return array
   */
  public function getTweets();

}
