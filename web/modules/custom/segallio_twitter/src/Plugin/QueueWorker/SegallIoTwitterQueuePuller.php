<?php

namespace Drupal\segallio_twitter\Plugin\QueueWorker;

use Drupal\segallio_puller\SegallIoPullerQueueWorkerBase;


/**
 * @QueueWorker(
 *  id = "segallio_twitter_pulling",
 *  title = @Translation("Pulling twitter data."),
 *  cron = {"time" = 60},
 *  pullers = {"twitter_puller"},
 * )
 */
class SegallIoTwitterQueuePuller extends SegallIoPullerQueueWorkerBase {}
