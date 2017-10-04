<?php

namespace Drupal\segallio_instagram\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Instagram entities.
 *
 * @ingroup segallio_instagram
 */
interface InstagramInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Instagram name.
   *
   * @return string
   *   Name of the Instagram.
   */
  public function getName();

  /**
   * Sets the Instagram name.
   *
   * @param string $name
   *   The Instagram name.
   *
   * @return \Drupal\segallio_instagram\Entity\InstagramInterface
   *   The called Instagram entity.
   */
  public function setName($name);

  /**
   * Gets the Instagram creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Instagram.
   */
  public function getCreatedTime();

  /**
   * Sets the Instagram creation timestamp.
   *
   * @param int $timestamp
   *   The Instagram creation timestamp.
   *
   * @return \Drupal\segallio_instagram\Entity\InstagramInterface
   *   The called Instagram entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Instagram published status indicator.
   *
   * Unpublished Instagram are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Instagram is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Instagram.
   *
   * @param bool $published
   *   TRUE to set this Instagram to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_instagram\Entity\InstagramInterface
   *   The called Instagram entity.
   */
  public function setPublished($published);

}
