<?php

namespace Drupal\segallio_puller\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Puller plugins.
 */
interface PullerInterface extends PluginInspectionInterface {

  /**
   * Return a list of assets from the social network.
   *
   * @return mixed
   */
  public function assets();

  /**
   * Determine if the asset need an update or delete.
   *
   * @return mixed
   */
  public function actionRouter();

  /**
   * Inserting the item.
   *
   * @return mixed
   */
  public function insert();

  /**
   * Updating an item.
   *
   * @return mixed
   */
  public function update();

}
