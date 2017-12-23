<?php

namespace Drupal\segallio_twitter\Plugin\QueueWorker;

use Drupal\segallio_puller\SegallIoPullerQueueWorkerBase;


/**
 * @QueueWorker(
 *  id = "segallio_twitter_pulling",
 *  title = @Translation("Pulling twitter data."),
 * )
 */
class SeegallIoTwitterQueuePuller extends SegallIoPullerQueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  protected $plugins = ['twitter_puller'];

}
