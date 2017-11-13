<?php

namespace Drupal\ajax_form_submit_block\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
/**
 *
 */
class AjaxSubmitDemo extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajax_submit_block_demo';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>'
    ];

    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number 1'),
    ];

    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number 2'),
    ];

    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Submit'),
      '#ajax' => [
        'callback' => '::setMessage',
      ],
    ];

    return $form;
  }

  /**
   *
   */
  public function setMessage(array $form, FormStateInterface $form_state) {

    $response = new AjaxResponse();
    $response->addCommand(
      new HtmlCommand(
        '.result_message',
        '<div class="my_top_message">The result is ' . t('The results is ') . ($form_state->getValue('number_1') + $form_state->getValue('number_2')) . '</div>')
    );
    return $response;

   }

   public function submitForm(array &$form, FormStateInterface $form_state) {
   }

}
