<?php

namespace Drupal\segallio_core;

/**
 * Class SegallIoCore.
 */
class SegallIoCore {

  /**
   * @return \Drupal\segallio_core\PersistentAccessTokenStorageInterface
   */
  public static function getPersistentAccessTokenStorage() {
    return \Drupal::service('persistent_access_token_storage');
  }

}
