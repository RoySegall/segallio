<?php

namespace Drupal\segallio_facebook;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Album entity.
 *
 * @see \Drupal\segallio_facebook\Entity\Album.
 */
class AlbumAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_facebook\Entity\AlbumInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished album entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published album entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit album entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete album entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add album entities');
  }

}
