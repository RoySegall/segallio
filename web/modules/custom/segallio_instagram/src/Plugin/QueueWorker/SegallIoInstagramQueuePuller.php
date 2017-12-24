<?php

namespace Drupal\segallio_instagram\Plugin\QueueWorker;

use Drupal\segallio_puller\SegallIoPullerQueueWorkerBase;

/**
 * @QueueWorker(
 *  id = "segallio_instagram_pulling",
 *  title = @Translation("Instagram pulling."),
 *  cron = {"time" = 60},
 *  pullers = {"instagram_puller"},
 * )
 */
class SegallIoInstagramQueuePuller extends SegallIoPullerQueueWorkerBase {}
