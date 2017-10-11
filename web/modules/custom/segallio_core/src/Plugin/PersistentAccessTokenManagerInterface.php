<?php

namespace Drupal\segallio_core\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\segallio_core\Entity\SocialAccessTokens;

/**
 * Defines an interface for Persistent access token manager plugins.
 */
interface PersistentAccessTokenManagerInterface extends PluginInspectionInterface {

  /**
   * Get the access token object.
   *
   * @return mixed
   *   The access token object.
   */
  public function getAccessToken();

  /**
   * Setting an access token object.
   *
   * @param $object
   *   The object it self.
   *
   * @return \Drupal\segallio_core\Entity\SocialAccessTokens
   */
  public function setAccessToken($object);

}
