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
 *   "id" = "post_id",
 *   "message" = "label",
 *   "permalink_url" = "url",
 *   "full_picture" = {"field" = "assets", "function" = "copyImage"},
 *   "reactions" = {"field" = "reactions", "function" = "count"},
 *   "shared_posts" = {"field" = "shares", "function" = "count"},
 *   "comments" = {"field" = "comments", "function" = "count"},
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
    return $asset['id'];
  }

}
