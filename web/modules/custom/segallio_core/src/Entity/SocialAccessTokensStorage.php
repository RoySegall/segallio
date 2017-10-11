<?php

namespace Drupal\segallio_core\Entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\Sql\SqlContentEntityStorage;

class SocialAccessTokensStorage extends SqlContentEntityStorage  implements EntityStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function save(EntityInterface $entity) {
    $access_object = $entity->get('access_token')->value;
    $entity->set('access_token', serialize($access_object));
    return parent::save($entity);
  }

}
