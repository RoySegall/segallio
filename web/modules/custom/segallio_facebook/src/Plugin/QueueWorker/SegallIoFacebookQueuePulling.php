<?php

namespace Drupal\segallio_facebook\Plugin\QueueWorker;

use Drupal\segallio_puller\SegallIoPullerQueueWorkerBase;

/**
 * @QueueWorker(
 *  id = "segallio_facebook_pulling",
 *  title = @Translation("Pulling facebook data"),
 * )
 */
class SegallIoFacebookQueuePulling extends SegallIoPullerQueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  protected $plugins = [
    'facebook_albums',
    'facebook_pictures',
    'facebook_posts',
  ];

}
