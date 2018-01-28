<?php

namespace Drupal\segallio_restful\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file_entity\Entity\FileEntity;
use Drupal\segallio_core\SegallIoCoreEntityFlatten;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Symfony\Component\Serializer\SerializerInterface;
use \Symfony\Component\HttpFoundation\RequestStack;

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
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $request;

  /**
   * Constructs a new SegallIoRestfulController object.
   */
  public function __construct(EntityTypeManager $entity_type_manager, SerializerInterface $serialize, SegallIoCoreEntityFlatten $flatter, RequestStack $request) {
    $this->entityTypeManager = $entity_type_manager;
    $this->serialize = $serialize;
    $this->flatter = $flatter;
    $this->request = $request->getCurrentRequest();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('serializer'),
      $container->get('segallio_core.entity_fltter'),
      $container->get('request_stack')
    );
  }

  /**
   * Get all the entries.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   The restful representation of the entities.
   */
  public function allEntries() {
    $page = $this->request->query->get('page', 0);
    $perpage = 25;

    $storage = $this->entityTypeManager->getStorage('puller_stacker');

    $results = $storage
      ->getQuery()
      ->condition('entity_type', 'album', '!=')
      ->range($page * $perpage , $perpage)
      ->sort('created', 'DESC')
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
      $serialized[] = $this->flatter->flatten($entity, $this->getFlattenHandlers()) + ['entity_type' => $entity->getEntityTypeId()];
    }

    // Get all the entries.
    return new JsonResponse($serialized);
  }

  /**
   * Get a specific entity type in a restful request.
   *
   * @param string $entity_type
   *   The entity type.
   *
   * @return JsonResponse
   *   The request of the route.
   */
  public function getEntity($entity_type) {
    $page = $this->request->query->get('page', 0);
    $perpage = 25;

    $storage = $this->entityTypeManager->getStorage($entity_type);

    $results = $storage
      ->getQuery()
      ->range($page * $perpage , $perpage)
      ->execute();

    $loaded = $storage->loadMultiple($results);

    // serialize.
    $serialized = [];
    foreach ($loaded as $entity) {
      $serialized[] = $this->flatter->flatten($entity, $this->getFlattenHandlers());
    }

    // Get all the entries.
    return new JsonResponse($serialized);
  }

  /**
   * callbacks for entity flattening.
   *
   * @return array
   */
  protected function getFlattenHandlers() {
    $callback = function($items) {
      $results = [];

      foreach ($items as $item) {
        $results[] = [
          'type' => $item->bundle(),
          'url' => file_create_url($item->getFileUri())
        ];
      }

      return $results;
    };

    return [
      'assets' => $callback,
      'asset' => $callback,
    ];
  }

}
