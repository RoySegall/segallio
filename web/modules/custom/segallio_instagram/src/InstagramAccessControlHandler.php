<?php

namespace Drupal\segallio_instagram;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Instagram entity.
 *
 * @see \Drupal\segallio_instagram\Entity\Instagram.
 */
class InstagramAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_instagram\Entity\InstagramInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished instagram entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published instagram entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit instagram entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete instagram entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add instagram entities');
  }

}
