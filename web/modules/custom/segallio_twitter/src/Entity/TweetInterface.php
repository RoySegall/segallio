<?php

namespace Drupal\segallio_twitter\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Tweet entities.
 *
 * @ingroup segallio_twitter
 */
interface TweetInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Tweet name.
   *
   * @return string
   *   Name of the Tweet.
   */
  public function getName();

  /**
   * Sets the Tweet name.
   *
   * @param string $name
   *   The Tweet name.
   *
   * @return \Drupal\segallio_twitter\Entity\TweetInterface
   *   The called Tweet entity.
   */
  public function setName($name);

  /**
   * Gets the Tweet creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Tweet.
   */
  public function getCreatedTime();

  /**
   * Sets the Tweet creation timestamp.
   *
   * @param int $timestamp
   *   The Tweet creation timestamp.
   *
   * @return \Drupal\segallio_twitter\Entity\TweetInterface
   *   The called Tweet entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Tweet published status indicator.
   *
   * Unpublished Tweet are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Tweet is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Tweet.
   *
   * @param bool $published
   *   TRUE to set this Tweet to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_twitter\Entity\TweetInterface
   *   The called Tweet entity.
   */
  public function setPublished($published);

}
