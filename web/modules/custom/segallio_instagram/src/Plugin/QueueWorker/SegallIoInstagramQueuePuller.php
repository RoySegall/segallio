<?php

namespace Drupal\segallio_instagram\Plugin\QueueWorker;

use Drupal\segallio_puller\SegallIoPullerQueueWorkerBase;

/**
 * @QueueWorker(
 *  id = "segallio_instagram_pulling",
 *  title = @Translation("Instagram pulling."),
 * )
 */
class SegallIOGithubQueuePuller extends SegallIoPullerQueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  protected $plugins = ['instagram_puller'];

}
