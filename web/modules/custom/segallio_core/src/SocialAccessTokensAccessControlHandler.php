<?php

namespace Drupal\segallio_core;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Social access tokens entity.
 *
 * @see \Drupal\segallio_core\Entity\SocialAccessTokens.
 */
class SocialAccessTokensAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_core\Entity\SocialAccessTokensInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished social access tokens entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published social access tokens entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit social access tokens entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete social access tokens entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add social access tokens entities');
  }

}
