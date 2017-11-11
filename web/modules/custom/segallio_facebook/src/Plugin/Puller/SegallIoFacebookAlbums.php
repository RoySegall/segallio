<?php

namespace Drupal\segallio_facebook\Plugin\Puller;

use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @Puller(
 *  id = "facebook_albums",
 *  label = @Translation("Facebook albums."),
 *  entity_type = "album",
 *  social = "facebook",
 *  fields = {
 *   "object_id" = "post_id",
 *   "name" = "name",
 *   "link" = "url",
 *   "reactions" = {"field" = "likes", "callback" = "countReactions", "default_value" = 0},
 *   "shares" = {"field" = "shares", "callback" = "countShares", "default_value" = 0},
 *   "comments" = {"field" = "comments", "callback" = "countComments", "default_value" = 0},
 *   "created_time" = {"field" = "created", "callback" = "strToTimestamp"}
 *  }
 * )
 */
class SegallIoFacebookAlbums extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * Return a list of albums from facebook.
   *
   * @return mixed
   */
  public function assets() {
    return $this->social->getAlbums();
  }

}
