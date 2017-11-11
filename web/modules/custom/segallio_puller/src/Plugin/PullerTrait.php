<?php

namespace Drupal\segallio_puller\Plugin;

/**
 * Base class for Puller plugins.
 */
trait PullerTrait {

  public function copyImage($value) {
    return system_retrieve_file($value, NULL, TRUE, FILE_EXISTS_REPLACE);
  }

  public function countReactions($value) {
    if (empty($value['summary'])) {
      return 0;
    }

    return $value['summary']['total_count'];
  }

  public function countComments($value) {
    if (empty($value['summary'])) {
      return 0;
    }

    return $value['summary']['total_count'];
  }

  public function countShares($value) {
    if (empty($value['count'])) {
      return 0;
    }

    return $value['count'];
  }

}
