<?php

namespace Drupal\segallio_puller\Plugin;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Entity\EntityTypeManager;

/**
 * Base class for Puller plugins.
 */
abstract class PullerBase extends PluginBase implements PullerInterface {

  /**
   * Holds the name of the service which the plugin depends on.
   *
   * @var string
   */
  static $service;

  /**
   * The entity storgate.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $entityStorage;

  /**
   * The entity query.
   *
   * @var \Drupal\Core\Entity\Query\QueryInterface
   */
  protected $entityQuery;

  /**
   * PullerBase constructor.
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param EntityTypeManager $entity_type_manager
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManager $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityStorage = $entity_type_manager->getStorage($this->pluginDefinition['entity_type']);
    $this->entityQuery = $this->entityStorage->getQuery();
  }

  /**
   * Updating an item.
   *
   * @return mixed
   */
  public function update() {
  }

  /**
   * Inserting the item.
   *
   * @return mixed
   */
  public function insert() {
  }

  /**
   * Determine if the asset need an update or delete.
   *
   * @return mixed
   */
  public function actionRouter() {
  }

}
