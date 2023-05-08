<?php

namespace Drupal\di_examples\Services;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\di_examples\Services\Interfaces\LoggerServiceInterface;

/**
 * Logger service implementation.
 *
 * @version 1.0.0
 */
class LoggerService implements LoggerServiceInterface {

  /**
   * Logger Factory.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   * Construct.
   *
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $loggerFactory
   *   The logger factory.
   */
  public function __construct(LoggerChannelFactoryInterface $loggerFactory) {
    $this->loggerFactory = $loggerFactory;
  }

  /**
   * Logs something.
   *
   * @inheritDoc
   */
  public function logSomething($something) {
    $this->loggerFactory->get('di examples')->warning('DI Examples Logger: @something', [
      '@something' => $something,
    ]);
  }

}
