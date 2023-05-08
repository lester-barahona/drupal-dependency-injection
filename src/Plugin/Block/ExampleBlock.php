<?php

namespace Drupal\di_examples\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\di_examples\Services\LoggerService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Example Block.
 *
 * @Block(
 *   id = "example_block",
 *   admin_label = @Translation("Example block"),
 * )
 */
class ExampleBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Logger Service.
   *
   * @var \Drupal\di_examples\Services\LoggerServiceLoggerService
   */
  protected $loggerService;

  /**
   * Example block constructor.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, LoggerService $loggerService) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->loggerService = $loggerService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('di_examples.logger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $this->loggerService->logSomething('Example block build');

    return [
      '#markup' => $this->t('Example block!'),
    ];
  }

}
