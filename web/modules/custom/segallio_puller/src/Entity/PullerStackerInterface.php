<?php

namespace Drupal\segallio_puller\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Puller stacker entities.
 *
 * @ingroup segallio_puller
 */
interface PullerStackerInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Puller stacker name.
   *
   * @return string
   *   Name of the Puller stacker.
   */
  public function getName();

  /**
   * Sets the Puller stacker name.
   *
   * @param string $name
   *   The Puller stacker name.
   *
   * @return \Drupal\segallio_puller\Entity\PullerStackerInterface
   *   The called Puller stacker entity.
   */
  public function setName($name);

  /**
   * Gets the Puller stacker creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Puller stacker.
   */
  public function getCreatedTime();

  /**
   * Sets the Puller stacker creation timestamp.
   *
   * @param int $timestamp
   *   The Puller stacker creation timestamp.
   *
   * @return \Drupal\segallio_puller\Entity\PullerStackerInterface
   *   The called Puller stacker entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Puller stacker published status indicator.
   *
   * Unpublished Puller stacker are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Puller stacker is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Puller stacker.
   *
   * @param bool $published
   *   TRUE to set this Puller stacker to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_puller\Entity\PullerStackerInterface
   *   The called Puller stacker entity.
   */
  public function setPublished($published);

}
