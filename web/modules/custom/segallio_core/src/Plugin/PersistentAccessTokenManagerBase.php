<?php

namespace Drupal\segallio_core\Plugin;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\segallio_core\Entity\SocialAccessTokens;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for Persistent access token manager plugins.
 */
abstract class PersistentAccessTokenManagerBase extends PluginBase implements PersistentAccessTokenManagerInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManager definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityTypeManager;

  /**
   * The entity query manager.
   *
   * @var \Drupal\Core\Entity\Query\QueryInterface
   */
  protected $entityQuery;

  /**
   * Constructs a new GithubPersistentAccessTokenManager object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManager $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->entityTypeManager = $entity_type_manager;
    $this->entityQuery = $this->entityTypeManager->getStorage('social_access_tokens')->getQuery();
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }

  /**
   * Get the access token from the DB.
   *
   * @return string
   *  The access token form the DB.
   *
   * @return SocialAccessTokens
   */
  protected function loadAccessTokenFromDb() {
    $results = $this->entityQuery
      ->condition('name', $this->getPluginId())
      ->execute();

    if (!$results) {
      return;
    }

    return $this->entityTypeManager->getStorage('social_access_tokens')->load(reset($results));
  }

  /**
   * Set the access in the DB.
   *
   * @param $object
   *   The object of the access token.
   */
  protected function setAccessTokenInDb($object) {

    $entity = $this->entityTypeManager
      ->getStorage('social_access_tokens')
      ->create([
        'name' => $this->getPluginId(),
        'access_token' => $object,
      ]);

    $entity->save();
  }

  /**
   * {@inheritdoc}
   */
  public function setAccessToken($object) {

    if ($entity = $this->loadAccessTokenFromDb()) {
      // update the token and return the object.
      $entity->set('access_token', $object);
      $entity->save();
    }

    $this->setAccessTokenInDb($object);

    return $this;
  }

}
