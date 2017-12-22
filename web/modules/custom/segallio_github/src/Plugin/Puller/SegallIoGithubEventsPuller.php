<?php

namespace Drupal\segallio_github\Plugin\Puller;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_github\Entity\Repository;
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
    // todo: get more data about the repo.
    $map = [
      'repo_id' => 'id',
      'name' => 'name',
      'url' => 'url',
      'status' => 'public',
    ];

    $results = $this->entityTypeManger
      ->getStorage('repository')
      ->getQuery()
      ->condition('repo_id', $repo->id)
      ->execute();

    if ($results) {
      /** @var Repository $entity */
      $entity = $this->entityTypeManger->getStorage('repository')->load(reset($results));

      foreach ($map as $key => $key_object) {
        $entity->set($key, $repo->{$key_object});
      }

      $entity->save();

      return;
    }

    $item = [];

    foreach ($map as $key => $key_object) {
      $item[$key] = $repo->{$key_object};
    }

    $this->entityTypeManger->getStorage('repository')->create($item)->save();
  }

  /**
   * @param $payload
   */
  public function processPayload($payload) {

    if (empty($payload->pull_request)) {
      // Not a pull request information.
      return;
    }

    dpm($payload);
    // todo: act by the payload.

    //public url -> string(68) "https://api.github.com/repos/Gizra/openscholar-huji-hebrew/pulls/790"
    //→pubpublic html_url -> string(57) "https://github.com/Gizra/openscholar-huji-hebrew/pull/790"
    //public diff_url -> string(62) "https://github.com/Gizra/openscholar-huji-hebrew/pull/790.diff"
    //public patch_url -> string(63) "https://github.com/Gizra/openscholar-huji-hebrew/pull/790.patch"
    //public issue_url -> string(69) "https://api.github.com/repos/Gizra/openscholar-huji-hebrew/issues/790"
    //public number -> integer790
    //public state -> string(6) "closed"
    //public locked -> boolFALSE
    //public title -> string(49) "Revert "Auto assign term for iCal importer items""
    //→public user -> stdClass(17)
    //public body -> string(41) "Reverts Gizra/openscholar-huji-hebrew#786"
    //public created_at -> string(20) "2017-12-21T13:53:54Z"
    //public updated_at -> string(20) "2017-12-21T13:54:00Z"
    //public closed_at -> string(20) "2017-12-21T13:54:00Z"
    //public merged_at -> string(20) "2017-12-21T13:54:00Z"
    //public merge_commit_sha -> string(40) "02cd509419dac9a5b7b9723f3dbbbff2d405098e"
    //public assignee -> NULL
    //public assignees -> array(0)
    //public requested_reviewers -> array(0)
    //public milestone -> NULL
    //public commits_url -> string(76) "https://api.github.com/repos/Gizra/openscholar-huji-hebrew/pulls/790/commits"
    //public review_comments_url -> string(77) "https://api.github.com/repos/Gizra/openscholar-huji-hebrew/pulls/790/comments"
    //→public review_comment_url -> string(82) "https://api.github.com/repos/Gizra/openscholar-huji-hebrew/pulls/comments{/numbe…"
    //public comments_url -> string(78) "https://api.github.com/repos/Gizra/openscholar-huji-hebrew/issues/790/comments"
    //→public statuses_url -> string(108) "https://api.github.com/repos/Gizra/openscholar-huji-hebrew/statuses/ad0c06e292bf…"
    //→public head -> stdClass(5)
    //→public base -> stdClass(5)
    //→public _links -> stdClass(8)
    //public author_association -> string(11) "CONTRIBUTOR"
    //public merged -> boolTRUE
    //public mergeable -> NULL
    //public rebaseable -> NULL
    //public mergeable_state -> string(7) "unknown"
    //→public merged_by -> stdClass(17)
    //public comments -> integer0
    //public review_comments -> integer0
    //public maintainer_can_modify -> boolFALSE
    //public commits -> integer1
    //public additions -> integer2
    //public deletions -> integer377lic id -> integer159662584
    //public changed_files -> integer10
  }

}
