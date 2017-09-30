<?php

namespace Drupal\segallio_twitter\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Tweet entities.
 */
class TweetViewsData extends EntityViewsData {

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
