<?php

namespace Drupal\segallio_puller\Plugin;

/**
 * Base class for Puller plugins.
 */
trait PullerTrait {

  /**
   * Download the image and create a file object.
   *
   * @param $value
   *   The value of the field.
   *
   * @return mixed
   *   The file object.
   */
  public function copyImage($value) {
    return system_retrieve_file($value, NULL, TRUE, FILE_EXISTS_REPLACE);
  }

  /**
   * Get the total reaction for a given entry.
   *
   * @param $value
   *   The value of the field.
   *
   * @return mixed
   *   The number of reactions.
   */
  public function countReactions($value) {
    if (empty($value['summary'])) {
      return 0;
    }

    return $value['summary']['total_count'];
  }

  /**
   * Get the total comments for a given entry.
   *
   * @param $value
   *   The value of the field.
   *
   * @return mixed
   *   The number of comments.
   */
  public function countComments($value) {
    if (empty($value['summary'])) {
      return 0;
    }

    return $value['summary']['total_count'];
  }

  /**
   * Get the total shares sfor a given entry.
   *
   * @param $value
   *   The value of the field.
   *
   * @return mixed
   *   The number of shares.
   */
  public function countShares($value) {
    if (empty($value['count'])) {
      return 0;
    }

    return $value['count'];
  }

  /**
   * Take a string and convert it to unixtimesamp.
   *
   * @param $value
   *   The value from the API.
   *
   * @return int
   *   The unix timestamp of the string.
   */
  public function strToTime($value) {
    return strtotime($value);
  }

}
