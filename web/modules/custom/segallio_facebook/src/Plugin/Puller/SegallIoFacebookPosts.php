<?php

namespace Drupal\segallio_facebook\Plugin\Puller;

use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @Puller(
 *  id = "facebook_posts",
 *  label = @Translation("Facebook posts."),
 *  entity_type = "status",
 *  social = "facebook",
 *  fields = {
 *   "object_id" = "post_id",
 *   "message" = "name",
 *   "permalink_url" = "url",
 *   "full_picture" = {"field" = "assets", "callback" = "copyImage", "default_value" = 0},
 *   "reactions" = {"field" = "likes", "callback" = "countReactions", "default_value" = 0},
 *   "shares" = {"field" = "shares", "callback" = "countShares", "default_value" = 0},
 *   "comments" = {"field" = "comments", "callback" = "countComments", "default_value" = 0},
 *   "created_time" = {"field" = "created", "callback" = "strToTimestamp"}
 *  }
 * )
 */
class SegallIoFacebookPosts extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * Return a list of assets from the social network.
   *
   * @return mixed
   */
  public function assets() {
    return $this->social->getPosts();
  }

}
