<?php

namespace Drupal\segallio_github;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Pull request entity.
 *
 * @see \Drupal\segallio_github\Entity\PullRequest.
 */
class PullRequestAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_github\Entity\PullRequestInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished pull request entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published pull request entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit pull request entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete pull request entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add pull request entities');
  }

}
