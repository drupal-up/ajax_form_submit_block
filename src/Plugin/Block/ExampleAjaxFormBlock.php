<?php

namespace Drupal\ajax_form_submit_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a "Example ajax submit form block"
 *
 * @Block(
 *   id = "ajax_submit_form_block",
 *   admin_label = @Translation("Example ajax submit form block")
 * )
 */
class ExampleAjaxFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    
    $form = \Drupal::formBuilder()->getForm('\Drupal\ajax_form_submit_block\Form\AjaxSubmitDemo');
    return $form;
  }
}