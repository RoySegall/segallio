<?php

namespace Drupal\segallio_puller\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Theme\ThemeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\segallio_puller\Plugin\PullerManager;

/**
 * Class SegallIoPullerPullersListControllers.
 */
class SegallIoPullerPullersListControllers extends ControllerBase {

  /**
   * Drupal\segallio_puller\Plugin\PullerManager definition.
   *
   * @var \Drupal\segallio_puller\Plugin\PullerManager
   */
  protected $pluginManagerPuller;

  /**
   * Constructs a new SegallIoPullerPullersListControllers object.
   */
  public function __construct(PullerManager $plugin_manager_puller) {
    $this->pluginManagerPuller = $plugin_manager_puller;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.puller')
    );
  }

  /**
   * Pullers.
   *
   * @return string
   *   Return Hello string.
   */
  public function pullers() {
    return [
      '#type' => 'table',
      '#header' => $this->buildHeader(),
      '#title' => $this->t('Pullers list'),
      '#rows' => $this->buildRows(),
      '#empty' => $this->t('No pullers.'),
    ];
  }

  public function buildHeader() {
    return [$this->t('Puller ID'), $this->t('Puller social network'), $this->t('Actions')];
  }

  public function buildRows() {
    $pullers = [];
    foreach ($this->pluginManagerPuller->getDefinitions() as $definition) {
      $pull_link = Link::createFromRoute($this->t('Manually pull'), 'segallio_pull_items', ['pull_id' => $definition['id']], ['attributes' => ['class' => ['button']]]);
      $pullers[] = [$definition['id'], ucfirst($definition['social']), $pull_link];
    }

    return $pullers;
  }

}
