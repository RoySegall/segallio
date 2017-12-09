<?php

namespace Drupal\segallio_instagram\Plugin\Puller;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;

/**
 * @Puller(
 *  id = "instagram_puller",
 *  label = @Translation("Instagram media."),
 *  entity_type = "instagram",
 *  social = "instagram",
 *  fields = {
 *   "id" = "id",
 *   "text" = "name",
 *   "likes" = {"field" = "likes", "callback" = "instagramLikes"},
 *   "comments" = {"field" = "likes", "callback" = "instagramComments"},
 *   "created_time" = {"field" = "created", "callback" = "strToTime"},
 *   "extended_entities" = {"field" = "assets", "callback" = "getTwitterMedia"}
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
   *   The nubmer of comments.
   */
  public function instagramComments($field) {
    return $field->count;
  }

}
