<?php

namespace Drupal\segallio_puller\Plugin;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\segallio_core\SocialAssetsServicesManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for Puller plugins.
 */
abstract class PullerBase extends PluginBase implements PullerInterface {

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
   * The social service handler.
   *
   * @var \Drupal\segallio_facebook\SegallIOFacebookGraph|\Drupal\segallio_github\SegallIoGithubApiInterface|\Drupal\segallio_instagram\SegallIoInstagramPostsInterface|\Drupal\segallio_twitter\SegallIoTwitterGraphInterface
   */
  protected $social;

  /**
   * PullerBase constructor.
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param EntityTypeManager $entity_type_manager
   * @param SocialAssetsServicesManager $social
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManager $entity_type_manager, SocialAssetsServicesManager $social) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityStorage = $entity_type_manager->getStorage($this->pluginDefinition['entity_type']);
    $this->entityQuery = $this->entityStorage->getQuery();
    $this->social = $social->servicesRouter($this->pluginDefinition['social']);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('social_assets_services_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function update($asset) {
  }

  /**
   * {@inheritdoc}
   */
  public function insert($asset) {
  }

  /**
   * {@inheritdoc}
   */
  public function actionRouter($asset) {
    $id = $this->getAssetId($asset);

    return $this->entityQuery->condition('post_id', $id)->execute() ? 'update' : 'insert';
  }

  /**
   * {@inheritdoc}
   */
  public function pull() {
    $assets = $this->assets();

    // Iterate over the posts.
    foreach ($assets as $asset) {
      // check if the assert already been ported.
      if ($this->actionRouter($asset) == 'insert') {
        $this->insert($asset);
      }
      else {
        $this->update($asset);
      }
    }
  }

}
