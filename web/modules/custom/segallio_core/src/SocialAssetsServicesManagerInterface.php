<?php

namespace Drupal\segallio_core;

use Drupal\segallio_facebook\SegallIOFacebookGraph;
use Drupal\segallio_github\SegallIoGithubApiInterface;
use Drupal\segallio_instagram\SegallIoInstagramPostsInterface;
use Drupal\segallio_twitter\SegallIoTwitterGraphInterface;

/**
 * Class SocialAssetsServicesManager.
 */
interface SocialAssetsServicesManagerInterface {

  /**
   * Get the matching service for a social network.
   *
   * @param string $social_network
   *   The social network name.
   *
   * @return SegallIoGithubApiInterface|SegallIOFacebookGraph|SegallIoInstagramPostsInterface|SegallIoTwitterGraphInterface
   */
  public function servicesRouter($social_network);

}
