<?php

namespace Drupal\segallio_core\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Social access tokens entities.
 *
 * @ingroup segallio_core
 */
interface SocialAccessTokensInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  /**
   * Gets the Social access tokens name.
   *
   * @return string
   *   Name of the Social access tokens.
   */
  public function getName();

  /**
   * Sets the Social access tokens name.
   *
   * @param string $name
   *   The Social access tokens name.
   *
   * @return \Drupal\segallio_core\Entity\SocialAccessTokensInterface
   *   The called Social access tokens entity.
   */
  public function setName($name);

  /**
   * Gets the Social access tokens creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Social access tokens.
   */
  public function getCreatedTime();

  /**
   * Sets the Social access tokens creation timestamp.
   *
   * @param int $timestamp
   *   The Social access tokens creation timestamp.
   *
   * @return \Drupal\segallio_core\Entity\SocialAccessTokensInterface
   *   The called Social access tokens entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Social access tokens published status indicator.
   *
   * Unpublished Social access tokens are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Social access tokens is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Social access tokens.
   *
   * @param bool $published
   *   TRUE to set this Social access tokens to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\segallio_core\Entity\SocialAccessTokensInterface
   *   The called Social access tokens entity.
   */
  public function setPublished($published);

}
