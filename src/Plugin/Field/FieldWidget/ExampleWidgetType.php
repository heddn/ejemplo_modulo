<?php

/**
 * @file
 * Contains Drupal\ejemplo\Plugin\Field\FieldWidget\ExampleWidgetType.
 */

namespace Drupal\ejemplo\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'example_widget_type' widget.
 *
 * @FieldWidget(
 *   id = "example_progress",
 *   label = @Translation("Example progress"),
 *   field_types = {
 *     "example_progress",
 *   }
 * )
 */
class ExampleWidgetType extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
    // Implement default settings.
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : NULL;

    $element = array(
      '#type' => 'textfield',
      '#title' => t('Percentage Complete'),
      '#default_value' => $value,
      '#size' => 3,
      '#maxlength' => 3,
    );

    return array('value' => $element);
  }

}
