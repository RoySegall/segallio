<?php

namespace Drupal\segallio_github\Plugin\Puller;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;

/**
 * @Puller(
 *  id = "events",
 *  label = @Translation("Events"),
 *  entity_type = "repository",
 *  social = "github",
 *  fields = {}
 * )
 *
 * todo: make entity_type as multiple.
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
      $asset['repo']->public = $asset['public'];

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
    $results = $this->entityTypeManger
      ->getStorage('repository')
      ->getQuery()
      ->condition('repo_id', $repo->id)
      ->execute();

    if ($results) {
      dpm($repo, 'foo');
      return;
    }

    $this->entityTypeManger->getStorage('repository')
      ->create([
        'repo_id' => $repo->id,
        'name' => $repo->name,
        'url' => $repo->url,
        'status' => $repo->public,
      ])
      ->save();
  }

  /**
   * @param $payload
   */
  public function processPayload($payload) {
    // todo: act by the payload.
  }

}
