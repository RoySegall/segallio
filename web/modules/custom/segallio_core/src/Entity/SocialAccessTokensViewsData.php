<?php

namespace Drupal\segallio_core\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Social access tokens entities.
 */
class SocialAccessTokensViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
