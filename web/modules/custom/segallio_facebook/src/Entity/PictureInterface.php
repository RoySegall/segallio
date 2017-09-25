<?php

namespace Drupal\segallio_facebook\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Picture entities.
 *
 * @ingroup segallio_facebook
 */
interface PictureInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Picture name.
   *
   * @return string
   *   Name of the Picture.
   */
  public function getName();

  /**
   * Sets the Picture name.
   *
   * @param string $name
   *   The Picture name.
   *
   * @return \Drupal\segallio_facebook\Entity\PictureInterface
   *   The called Picture entity.
   */
  public function setName($name);

  /**
   * Gets the Picture creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Picture.
   */
  public function getCreatedTime();

  /**
   * Sets the Picture creation timestamp.
   *
   * @param int $timestamp
   *   The Picture creation timestamp.
   *
   * @return \Drupal\segallio_facebook\Entity\PictureInterface
   *   The called Picture entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Picture published status indicator.
   *
   * Unpublished Picture are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Picture is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Picture.
   *
   * @param bool $published
   *   TRUE to set this Picture to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_facebook\Entity\PictureInterface
   *   The called Picture entity.
   */
  public function setPublished($published);

}
