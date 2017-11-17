<?php

namespace Drupal\segallio_twitter\Plugin\Puller;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;


/**
 * @Puller(
 *  id = "twitter_puller",
 *  label = @Translation("Twitter tweets."),
 *  entity_type = "tweet",
 *  social = "twitter",
 *  multifield = {"id"},
 *  fields = {
 *   "id" = {"post_id", {"field" = "url", "callback" = "tweetIdToUrl"}},
 *   "text" = "name",
 *   "favorite_count" = "hearts",
 *   "retweet_count" = "rts",
 *   "created_at" = {"field" = "created", "callback" = "strToTime"},
 *  }
 * )
 */
class SegallIoTwitterPuller extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function assets() {
    return $this->social->getTweets();
  }

  /**
   * Look for duplicate posts based on the current asset from the API.
   *
   * @param $asset
   *   The object from the API.
   *
   * @return int[]
   *   Results from the query.
   */
  protected function lookForDuplicates($asset) {
    return $this->entityStorage->getQuery()->condition('post_id', $asset['post_id'])->execute();
  }

  /**
   * Convert a tweet ID to a URL.
   *
   * @param $value
   *   The value of the field.
   *
   * @return string
   *   The URL.
   */
  public function tweetIdToUrl($value) {
    return "https://twitter.com/status/" . $value;
  }

  // todo: handle media download.

}
