<?php

namespace Drupal\segallio_puller\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Puller stacker entities.
 */
class PullerStackerViewsData extends EntityViewsData {

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
