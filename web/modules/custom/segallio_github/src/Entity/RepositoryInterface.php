<?php

namespace Drupal\segallio_github\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Repository entities.
 *
 * @ingroup segallio_github
 */
interface RepositoryInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Repository name.
   *
   * @return string
   *   Name of the Repository.
   */
  public function getName();

  /**
   * Sets the Repository name.
   *
   * @param string $name
   *   The Repository name.
   *
   * @return \Drupal\segallio_github\Entity\RepositoryInterface
   *   The called Repository entity.
   */
  public function setName($name);

  /**
   * Gets the Repository creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Repository.
   */
  public function getCreatedTime();

  /**
   * Sets the Repository creation timestamp.
   *
   * @param int $timestamp
   *   The Repository creation timestamp.
   *
   * @return \Drupal\segallio_github\Entity\RepositoryInterface
   *   The called Repository entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Repository published status indicator.
   *
   * Unpublished Repository are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Repository is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Repository.
   *
   * @param bool $published
   *   TRUE to set this Repository to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_github\Entity\RepositoryInterface
   *   The called Repository entity.
   */
  public function setPublished($published);

}
