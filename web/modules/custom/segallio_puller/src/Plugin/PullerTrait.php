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
    return count($value['data']);
  }

  public function countComments($value) {
    return count($value['data']);
  }

  public function countShares($value) {
    return count($value['count']);
  }

}
