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
   * @param $asset
   *   The asset we pulled.
   *
   * @return mixed
   */
  public function actionRouter($asset);

  /**
   * Inserting the item.
   *
   * @param $asset
   *   The asset we pulled.
   *
   * @return mixed
   */
  public function insert($asset);

  /**
   * Updating an item.
   *
   * @param $asset
   *   The asset we pulled.
   *
   * @return mixed
   */
  public function update($asset);

  /**
   * Pulling the asset if from the asset.
   *
   * @param $asset
   *   The asset we pulled.
   *
   * @return mixed
   */
  public function getAssetId($asset);

  /**
   * Pulling from the resource.
   *
   * @return mixed
   */
  public function pull();

}
