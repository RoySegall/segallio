<?php

namespace Drupal\segallio_github\Plugin\Puller;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_puller\Plugin\PullerBase;
use Drupal\segallio_puller\Plugin\PullerInterface;

/**
 * @Puller(
 *  id = "gists",
 *  label = @Translation("Gists."),
 *  entity_type = "gist",
 *  social = "github",
 *  fields = {
 *   "id" = "unique_id",
 *   "url" = "url",
 *   "updated_at" = {"field" = "updated_at", "callback" = "githubCreatedAt"},
 *   "public" = "status",
 *   "files" = {"field" = "files", "callback" = "githubFilesProcess"}
 *  }
 * )
 */
class SegallIoGistsPuller extends PullerBase implements PullerInterface, ContainerFactoryPluginInterface {

  /**
   * Return lists of gists from GitHub.
   *
   * @return mixed
   */
  public function assets() {
    return $this->social->getGists();
  }

  /**
   * Converting the created at string to unixtimestamp.
   *
   * @param $field
   *   The string value.
   *
   * @return int
   *   The unix timestamp.
   */
  public function githubCreatedAt($field) {
    return strtotime($field);
  }

  /**
   * Process the file content to a JSON file.
   *
   * @param $field
   *   The field value.
   *
   * @return mixed
   *   The processed value.
   */
  public function githubFilesProcess($field) {

    $files = [];

    foreach ($field as $files_data) {

      $files_data = (object) $files_data;

      $file = [
        'filename' => $files_data->filename,
        'type' => $files_data->type,
        'file' => file_get_contents($files_data->raw_url),
        'raw_url' => $files_data->raw_url,
      ];

      $files[] = json_encode($file);
    }

    return $files;
  }

  /**
   * {@inheritdoc}
   */
  protected function lookForDuplicates($asset) {
    return $this->entityStorage->getQuery()->condition('unique_id', $asset['unique_id'])->execute();
  }

}
