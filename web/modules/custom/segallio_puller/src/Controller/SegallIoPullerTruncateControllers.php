<?php

namespace Drupal\segallio_puller\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class SegallIoPullerTruncateControllers.
 */
class SegallIoPullerTruncateControllers extends ControllerBase {

  /**
   * @return mixed
   */
  public function truncateItems($entity_type) {

    // todo move to dependency injection.
    $storage = \Drupal::entityTypeManager()->getStorage($entity_type);
    $storage->delete($storage->loadMultiple());
    drupal_set_message(t('All the items for @entity_type removed.', [
      '@entity_type' => $entity_type,
    ]));

    return new RedirectResponse(Url::fromRoute('segallio_puller.segall_io_puller_pullers_list_controllers_pullers')->setAbsolute()->toString());
  }

}
