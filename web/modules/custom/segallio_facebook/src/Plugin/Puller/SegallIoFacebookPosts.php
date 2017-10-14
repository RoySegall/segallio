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
 *   "full_picture" = {"field" = "assets", "callback" = "copyImage"},
 *   "reactions" = {"field" = "reactions", "callback" = "countReactions"},
 *   "shares" = {"field" = "shares", "callback" = "countShares"},
 *   "comments" = {"field" = "comments", "callback" = "countComments"},
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

  /**
   * {@inheritdoc}
   */
  public function getAssetId($asset) {
    return $asset['object_id'];
  }

}
