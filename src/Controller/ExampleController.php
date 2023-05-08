<?php

namespace Drupal\di_examples\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\di_examples\Services\LoggerService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * DI example controller.
 */
class ExampleController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Logger Service.
   *
   * @var \Drupal\di_examples\Services\LoggerService
   */
  protected $loggerService;

  /**
   * Example block constructor.
   */
  public function __construct(LoggerService $loggerService) {
    $this->loggerService = $loggerService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('di_examples.logger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function content() {
    $this->loggerService->logSomething('Example controller trigger!');

    return [
      '#markup' => $this->t('DI Example controller!'),
    ];
  }

}
