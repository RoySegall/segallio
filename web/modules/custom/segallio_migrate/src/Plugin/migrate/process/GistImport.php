<?php

/**
 * @file
 * Contain \Drupal\segallio_migrate\migrate\process
 */

namespace Drupal\segallio_migrate\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Taking the content of a gist and inject it into the gist file.
 *
 * @MigrateProcessPlugin(
 *   id = "gist_import"
 * )
 */
class GistImport extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    return file_get_contents(drupal_get_path('module', 'segallio_migrate') . '/assets/jsons/' . $value);
  }

}
