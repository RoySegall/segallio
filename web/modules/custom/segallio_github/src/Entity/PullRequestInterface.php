<?php

namespace Drupal\segallio_github\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Pull request entities.
 *
 * @ingroup segallio_github
 */
interface PullRequestInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Pull request name.
   *
   * @return string
   *   Name of the Pull request.
   */
  public function getName();

  /**
   * Sets the Pull request name.
   *
   * @param string $name
   *   The Pull request name.
   *
   * @return \Drupal\segallio_github\Entity\PullRequestInterface
   *   The called Pull request entity.
   */
  public function setName($name);

  /**
   * Gets the Pull request creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Pull request.
   */
  public function getCreatedTime();

  /**
   * Sets the Pull request creation timestamp.
   *
   * @param int $timestamp
   *   The Pull request creation timestamp.
   *
   * @return \Drupal\segallio_github\Entity\PullRequestInterface
   *   The called Pull request entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Pull request published status indicator.
   *
   * Unpublished Pull request are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Pull request is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Pull request.
   *
   * @param bool $published
   *   TRUE to set this Pull request to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_github\Entity\PullRequestInterface
   *   The called Pull request entity.
   */
  public function setPublished($published);

}
