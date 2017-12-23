<?php

namespace Drupal\segallio_github\Plugin\Puller;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;

/**
 * @Puller(
 *  id = "events",
 *  label = @Translation("Events"),
 *  entity_type = "repository",
 *  social = "github",
 *  entity_types = {"repository", "pull_request"},
 *  fields = {}
 * )
 */
class SegallIoGithubEventsPuller extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * Return lists of gists from GitHub.
   *
   * @return mixed
   */
  public function assets() {
    return $this->social->getEvents();
  }

  /**
   * {@inheritdoc}
   */
  public function pull() {
    $assets = $this->assets();

    // Iterate over the posts.
    foreach ($assets as $i => $asset) {
      $asset = (array) $asset;

      // Setting up extra fields.
      $asset['repo']->public = $asset['public'];
      $asset['payload']->public = $asset['public'];
      $asset['payload']->name = $asset['repo']->name;

      // Github events are a different kind of data; They contains sub-assets:
      // repo, payload of the action, if the repo is public or not etc. etc. So
      // we won't act like the other pullers but just mind the data by our self.
      $this->processRepo($asset['repo']);
      $this->processPayload($asset['payload']);
    }
  }

  /**
   * @param $repo
   */
  public function processRepo($repo) {
    // todo: get more data about the repo.
    $map = [
      'repo_id' => 'id',
      'name' => 'name',
      'url' => 'url',
      'status' => 'public',
    ];

    $this->handleObject($repo, $map, 'repository', 'repo_id', $repo->id);
  }

  /**
   * @param $payload
   */
  public function processPayload($payload) {

    if (empty($payload->pull_request)) {
      // Not a pull request information.
      return;
    }

    $payload->pull_request->name = $payload->name;
    $payload->pull_request->public = $payload->public;

    $map = [
      'url' => 'html_url',
      'status' => 'public',
      'repo_name' => 'name',
      'pr_id' => 'number',
      'name' => 'title',
    ];

    $this->handleObject($payload->pull_request, $map, 'pull_request', 'url', $payload->pull_request->html_url);
  }

  /**
   * Convert the object to an entity.
   *
   * @param \stdClass $source_object
   *   The asset to process.
   * @param $map
   *   The mapping.
   * @param string $entity_type
   *   The entity type.
   * @param $key
   *   The key to search as the GUID.
   * @param $id
   *   The value to in the GUID field.
   */
  protected function handleObject($source_object, $map, $entity_type, $key, $id) {
    $results = $this->entityTypeManger
      ->getStorage($entity_type)
      ->getQuery()
      ->condition($key, $id)
      ->execute();

    if ($results) {
      /** @var ContentEntityBase $entity */
      $entity = $this->entityTypeManger->getStorage($entity_type)->load(reset($results));
      $function = 'addCreatedLog';
    }
    else {
      $entity = $this->entityTypeManger->getStorage($entity_type)->create([]);
      $function = 'addUpdatedLog';
    }


    foreach ($map as $key => $key_object) {
      $entity->set($key, $source_object->{$key_object});
    }

    $entity->save();

    $this->{$function}($entity);
  }

}
