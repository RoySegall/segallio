<?php

namespace Drupal\segallio_facebook\Plugin\QueueWorker;

use Drupal\segallio_puller\SegallIoPullerQueueWorkerBase;

/**
 * @QueueWorker(
 *  id = "segallio_facebook_pulling",
 *  title = @Translation("Pulling facebook data"),
 *  cron = {"time" = 60},
 *  pullers = {"facebook_albums", "facebook_pictures", "facebook_posts"},
 * )
 */
class SegallIoFacebookQueuePulling extends SegallIoPullerQueueWorkerBase {}
