<?php

namespace Drupal\segallio_facebook\Plugin\Puller;

use Drupal\Core\Entity\EntityTypeManager;
use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_facebook\SegallIOFacebookGraph;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @Puller(
 *  id = "facebook_posts",
 *  label = @Translation("The plugin ID."),
 *  entity_type = "status",
 *  fields = {
 *   "foo" = "bar",
 *  }
 * )
 */
class SegallIoFacebookPosts extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * Drupal\segallio_facebook\SegallIOFacebookGraph definition.
   *
   * @var \Drupal\segallio_facebook\SegallIOFacebookGraph
   */
  protected $facebookGrpah;

  /**
   * PullerBase constructor.
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param EntityTypeManager $entity_type_manager
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManager $entity_type_manager, SegallIOFacebookGraph $facebook_grpah) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $entity_type_manager);
    $this->facebookGrpah = $facebook_grpah;
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
      $container->get('facebook_grpah')
    );
  }

  /**
   * Return a list of assets from the social network.
   *
   * @return mixed
   */
  public function assets() {
    return $this->pluginDefinition['fields'];
  }

}
