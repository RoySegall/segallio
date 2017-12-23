<?php

namespace Drupal\segallio_github\Plugin\QueueWorker;

use Drupal\segallio_puller\SegallIoPullerQueueWorkerBase;

/**
 * @QueueWorker(
 *  id = "segallio_github_pulling",
 *  title = @Translation("The plugin ID."),
 * )
 */
class SegallIOGithubQueuePuller extends SegallIoPullerQueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  protected $plugins = ['gists', 'events'];

}
