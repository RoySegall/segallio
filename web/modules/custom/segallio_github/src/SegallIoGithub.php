<?php

namespace Drupal\segallio_github;

/**
 * Class SegallIoGithubApi
 */
class SegallIoGithub {

  /**
   * @return SegallIoGithubApiInterface
   */
  public static function getApi() {
    return \Drupal::service('segallio_github.api');
  }

}
