<?php

namespace Drupal\segallio_github;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Repository entity.
 *
 * @see \Drupal\segallio_github\Entity\Repository.
 */
class RepositoryAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_github\Entity\RepositoryInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished repository entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published repository entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit repository entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete repository entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add repository entities');
  }

}