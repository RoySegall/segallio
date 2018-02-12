<?php

namespace Drupal\segallio_instagram\Plugin\Puller;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\kint\Plugin\Devel\Dumper\Kint;
use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;

/**
 * @Puller(
 *  id = "instagram_puller",
 *  label = @Translation("Instagram media."),
 *  entity_type = "instagram",
 *  social = "instagram",
 *  fields = {
 *   "id" = "post_id",
 *   "link" = "url",
 *   "caption" = {"field" = "name", "callback" = "instagramText"},
 *   "likes" = {"field" = "hearts", "callback" = "instagramLikes"},
 *   "comments" = {"field" = "comments", "callback" = "instagramComments"},
 *   "created_time" = "created",
 *   "images" = {"field" = "asset", "callback" = "getInstagramMedia"}
 *  }
 * )
 */
class SegallIoInstagramPuller extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function assets() {
    $results = $this->social->getMedia();

    // The items are listed in the data property of results.
    return $results->data;
  }

  /**
   * Process the ID from a string to an int.
   *
   * @param $field
   *   The field value.
   *
   * @return int
   *   The ID of the post.
   */
  public function processId($field) {
    return intval(str_replace("_", "", $field));
  }

  /**
   * Get the number of likes for a given post.
   *
   * @param $field
   *   The field value.
   *
   * @return int
   *   The number of likes the post got.
   */
  public function instagramLikes($field) {
    return $field->count;
  }

  /**
   * Get the number of comments on the post.
   *
   * @param $field
   *   The field value.
   *
   * @return int
   *   The number of comments.
   */
  public function instagramComments($field) {
    return $field->count;
  }

  /**
   * Get the image of the instagram post.
   *
   * @param $field
   *   The field in the resource.
   *
   * @return mixed
   *   The file object.
   */
  public function getInstagramMedia($field) {
    $field = (object)$field;
    $standart_resolution = (object)$field->standard_resolution;
    return system_retrieve_file($standart_resolution->url, NULL, TRUE, FILE_EXISTS_REPLACE);
  }

  /**
   * Get the text from the instagram post.
   *
   * @param $field
   *   The value of the request.
   *
   * @return mixed
   *   The text of the status.
   */
  public function instagramText($field) {
    return $field->text;
  }

  /**
   * {@inheritdoc}
   */
  protected function lookForDuplicates($asset) {
    return $this->entityStorage->getQuery()->condition('post_id', $asset['post_id'])->execute();
  }

}
