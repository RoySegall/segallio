<?php

namespace Drupal\segallio_puller\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Drupal\Console\Core\Command\ContainerAwareCommand;
use Drupal\Console\Core\Style\DrupalStyle;
use Drupal\Console\Annotations\DrupalCommand;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Finder\Finder;

/**
 * Class SegallIoPullerImporterCommand.
 *
 * @DrupalCommand (
 *     extension="segallio_puller",
 *     extensionType="module"
 * )
 */
class SegallIoPullerImporterCommand extends ContainerAwareCommand {

  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('migrate:jsons')
      ->addArgument(
        'social_network',
        InputArgument::REQUIRED,
        $this->trans('Get the social network which is the folder as well.')
      )
      ->setDescription($this->trans('Importing imported social data from jsons'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new DrupalStyle($input, $output);
    $path = drupal_get_path('module', 'segallio_puller') . '/src/social_jsons/' . $input->getArgument('social_network');
    $foo = new Finder();

    /** @var \Symfony\Component\Finder\SplFileInfo[] $files */
    $files = $foo->files()->in($path);

    foreach ($files as $file) {
      list($entity_type) = explode('_', $file->getFilename());
      $puller = $this->getPullerByEntityType($entity_type);

      /** @var \Symfony\Component\Serializer\Serializer $serialize */
      $serialize = \Drupal::service('serializer');
      $content = $serialize->decode($file->getContents(), 'json');
      $puller->setAssets($content)->pull();
      $params = [
        '@entity' => $entity_type,
        '@file' => $file->getFilename(),
      ];
      $io->success(t('Inserting a data to the entity @entity from the file @file', $params));
    }
  }

  /**
   * Get the puller plugin by entity type.
   *
   * @param string $entity_type
   *   The entity type.
   *
   * @return \Drupal\segallio_puller\Plugin\PullerBase
   *   The puller plugin.
   */
  protected function getPullerByEntityType($entity_type) {
    // todo: search by entity type and not hard coded.
    $puller_id = 'facebook_posts';
    return \Drupal::service('plugin.manager.puller')->createInstance($puller_id);
  }

}
