<?php

namespace Drupal\segallio_facebook\Plugin\Puller;

use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @Puller(
 *  id = "facebook_pictures",
 *  label = @Translation("Facebook photos."),
 *  entity_type = "picture",
 *  social = "facebook",
 *  fields = {
 *   "id" = "post_id",
 *   "name" = "name",
 *   "link" = "url",
 *   "album" = {"field" = "album", "callback" = "albumReference"},
 *   "picture" = {"field" = "asset", "callback" = "copyImage"},
 *   "reactions" = {"field" = "likes", "callback" = "countReactions", "default_value" = 0},
 *   "shares" = {"field" = "shares", "callback" = "countShares", "default_value" = 0},
 *   "comments" = {"field" = "comments", "callback" = "countComments", "default_value" = 0},
 *   "created_time" = {"field" = "created", "callback" = "strToTime"}
 *  }
 * )
 */
class SegallIoFacebookPictures extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * Return a list of photos from facebook.
   *
   * @return mixed
   */
  public function assets() {
    return $this->social->getPhotos();
  }

  /**
   * Get the album ID from facebook and replace with an album ID.
   *
   * @param $value
   *   The value of the field.
   *
   * @return int
   *   The album ID.
   */
  public function albumReference($value) {
    $results = $this->entityTypeManger
      ->getStorage('album')
      ->getQuery()
      ->condition('post_id', $value['id'])
      ->execute();

    return reset($results);
  }

}
