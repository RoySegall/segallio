<?php

namespace Drupal\segallio_instagram;

/**
 * Interface SegallIoInstagramPostsInterface.
 */
interface SegallIoInstagramPostsInterface {

  /**
   * Get the posts from the instagram page.
   *
   * @return array
   */
  public function getMedia();

}
