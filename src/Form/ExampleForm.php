<?php

namespace Drupal\di_examples\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\di_examples\Services\LoggerService;

/**
 * DI example form.
 */
class ExampleForm extends FormBase {

  /**
   * Logger Service.
   *
   * @var \Drupal\di_examples\Services\LoggerServiceLoggerService
   */
  protected $loggerService;

  /**
   * Example form contruct.
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
  public function getFormId() {
    return 'example_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['student_mail'] = [
      '#type' => 'email',
      '#title' => $this->t('Enter Email ID:'),
      '#required' => TRUE,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $this->loggerService->logSomething('Example form validation!');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->loggerService->logSomething('Example form submit!');
  }

}
