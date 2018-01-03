<?php

namespace Drupal\segallio_restful\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManager;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class SegallIoRestfulController.
 */
class SegallIoRestfulController extends ControllerBase {

  /**
   * Drupal\Core\Entity\EntityTypeManager definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityTypeManager;

  /**
   * Constructs a new SegallIoRestfulController object.
   */
  public function __construct(EntityTypeManager $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * Get all the entries.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   Return Hello string.
   */
  public function allEntries() {

    $storage = $this->entityTypeManager->getStorage('puller_stacker');

    // todo: Handle pager.
    $results = $storage
      ->getQuery()
      ->execute();

    $stackers = $storage->loadMultiple($results);

    // Get the entities to load and sort them by date.
    $entities = [];
    foreach ($stackers as $stacker) {
      $entities[] = $stacker;
    }

    // serialize.

    // print the serialize.

    // Get all the entries.
    return new JsonResponse(['foo' => 'bar']);
  }

}
