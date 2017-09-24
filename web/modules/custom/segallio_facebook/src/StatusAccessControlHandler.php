<?php

namespace Drupal\segallio_facebook;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Status entity.
 *
 * @see \Drupal\segallio_facebook\Entity\Status.
 */
class StatusAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_facebook\Entity\StatusInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished status entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published status entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit status entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete status entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add status entities');
  }

}
