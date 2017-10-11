<?php

namespace Drupal\segallio_core\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Persistent access token manager plugins.
 */
interface PersistentAccessTokenManagerInterface extends PluginInspectionInterface {

  public function getAccessToken();

  public function setAccessToken($object);

  public function isExpired();

}
