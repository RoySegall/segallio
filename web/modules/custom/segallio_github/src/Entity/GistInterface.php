<?php

namespace Drupal\segallio_github\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Gist entities.
 *
 * @ingroup segallio_github
 */
interface GistInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Gist name.
   *
   * @return string
   *   Name of the Gist.
   */
  public function getName();

  /**
   * Sets the Gist name.
   *
   * @param string $name
   *   The Gist name.
   *
   * @return \Drupal\segallio_github\Entity\GistInterface
   *   The called Gist entity.
   */
  public function setName($name);

  /**
   * Gets the Gist creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Gist.
   */
  public function getCreatedTime();

  /**
   * Sets the Gist creation timestamp.
   *
   * @param int $timestamp
   *   The Gist creation timestamp.
   *
   * @return \Drupal\segallio_github\Entity\GistInterface
   *   The called Gist entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Gist published status indicator.
   *
   * Unpublished Gist are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Gist is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Gist.
   *
   * @param bool $published
   *   TRUE to set this Gist to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_github\Entity\GistInterface
   *   The called Gist entity.
   */
  public function setPublished($published);

}
