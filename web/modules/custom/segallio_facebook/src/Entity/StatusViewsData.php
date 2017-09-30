<?php

namespace Drupal\segallio_facebook\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Status entities.
 */
class StatusViewsData extends EntityViewsData {

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
