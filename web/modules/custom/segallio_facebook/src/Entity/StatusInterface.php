<?php

namespace Drupal\segallio_facebook\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Status entities.
 *
 * @ingroup segallio_facebook
 */
interface StatusInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Status name.
   *
   * @return string
   *   Name of the Status.
   */
  public function getName();

  /**
   * Sets the Status name.
   *
   * @param string $name
   *   The Status name.
   *
   * @return \Drupal\segallio_facebook\Entity\StatusInterface
   *   The called Status entity.
   */
  public function setName($name);

  /**
   * Gets the Status creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Status.
   */
  public function getCreatedTime();

  /**
   * Sets the Status creation timestamp.
   *
   * @param int $timestamp
   *   The Status creation timestamp.
   *
   * @return \Drupal\segallio_facebook\Entity\StatusInterface
   *   The called Status entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Status published status indicator.
   *
   * Unpublished Status are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Status is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Status.
   *
   * @param bool $published
   *   TRUE to set this Status to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_facebook\Entity\StatusInterface
   *   The called Status entity.
   */
  public function setPublished($published);

}
