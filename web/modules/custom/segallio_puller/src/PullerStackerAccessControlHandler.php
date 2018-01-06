<?php

namespace Drupal\segallio_puller;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Puller stacker entity.
 *
 * @see \Drupal\segallio_puller\Entity\PullerStacker.
 */
class PullerStackerAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_puller\Entity\PullerStackerInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished puller stacker entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published puller stacker entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit puller stacker entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete puller stacker entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add puller stacker entities');
  }

}
