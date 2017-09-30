<?php

namespace Drupal\segallio_facebook\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Album entities.
 *
 * @ingroup segallio_facebook
 */
interface AlbumInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Album name.
   *
   * @return string
   *   Name of the Album.
   */
  public function getName();

  /**
   * Sets the Album name.
   *
   * @param string $name
   *   The Album name.
   *
   * @return \Drupal\segallio_facebook\Entity\AlbumInterface
   *   The called Album entity.
   */
  public function setName($name);

  /**
   * Gets the Album creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Album.
   */
  public function getCreatedTime();

  /**
   * Sets the Album creation timestamp.
   *
   * @param int $timestamp
   *   The Album creation timestamp.
   *
   * @return \Drupal\segallio_facebook\Entity\AlbumInterface
   *   The called Album entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Album published status indicator.
   *
   * Unpublished Album are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Album is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Album.
   *
   * @param bool $published
   *   TRUE to set this Album to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_facebook\Entity\AlbumInterface
   *   The called Album entity.
   */
  public function setPublished($published);

}
