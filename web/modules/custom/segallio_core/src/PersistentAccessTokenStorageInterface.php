<?php

namespace Drupal\segallio_core;

/**
 * Interface PersistentAccessTokenStorageInterface.
 */
interface PersistentAccessTokenStorageInterface {

  /**
   * Get the access token object.
   *
   * @param string $name
   *   The name of the storage.
   *
   * @return mixed
   */
  public function get($name);

  /**
   * Set an access token values.
   *
   * @param $name
   *   The name of the storage.
   * @param $value
   *   The value.
   *
   * @return \Drupal\segallio_core\PersistentAccessTokenStorageInterface
   */
  public function set($name, $value);

}
