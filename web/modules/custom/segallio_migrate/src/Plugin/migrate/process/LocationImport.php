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
 * Converting an address to geo location values.
 *
 * @MigrateProcessPlugin(
 *   id = "location_import"
 * )
 */
class LocationImport extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    list($lat, $lng) = explode(',', $value);
    return [
      'lat' => $lat,
      'lng' => $lng,
    ];

  }

}
