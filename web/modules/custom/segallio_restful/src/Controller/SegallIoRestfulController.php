<?php

namespace Drupal\segallio_restful\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\segallio_core\SegallIoCoreEntityFlatten;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Symfony\Component\Serializer\SerializerInterface;


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
   * @var \Symfony\Component\Serializer\SerializerInterface
   */
  protected $serialize;

  /**
   * @var SegallIoCoreEntityFlatten
   */
  protected $flatter;

  /**
   * Constructs a new SegallIoRestfulController object.
   */
  public function __construct(EntityTypeManager $entity_type_manager, SerializerInterface $serialize, SegallIoCoreEntityFlatten $flatter) {
    $this->entityTypeManager = $entity_type_manager;
    $this->serialize = $serialize;
    $this->flatter = $flatter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('serializer'),
      $container->get('segallio_core.entity_fltter')
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

    // Sort the entities.
    $entities = [];
    foreach ($stackers as $stacker) {
      $entities[$stacker->get('entity_type')->value][] = $stacker->get('entity_id')->value;
    }

    // Load the entities.
    $loaded = [];
    foreach ($entities as $entity_type => $entity_ids) {
      $loaded = array_merge($loaded, $this->entityTypeManager->getStorage($entity_type)->loadMultiple($entity_ids));
    }

    // Order the entities.
    usort($loaded, function ($a, $b) {
      $time = [
        'a' => $a->getCreatedTime() == 0 ? $a->getChangedTime() : $a->getCreatedTime(),
        'b' => $b->getCreatedTime() == 0 ? $b->getChangedTime() : $b->getCreatedTime(),
      ];

      if ($time['a'] == $time['b']) {
        return 0;
      }

      return $time['a'] > $time['b'] ? 1 : -1;
    });

    // serialize.
    $serialized = [];
    foreach ($loaded as $entity) {
      $serialized[] = $this->flatter->flatten($entity) + ['entity_type' => $entity->getEntityTypeId()];
    }

    // Get all the entries.
    return new JsonResponse($serialized);
  }

}
