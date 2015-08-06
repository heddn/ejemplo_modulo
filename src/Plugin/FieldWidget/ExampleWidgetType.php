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
 *   label = @Translation("Example progress") * )
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
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = array();
    // Implement settings form.

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();
    // Implement settings summary.

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : NULL;

    $element += array(
      '#theme' => 'example_progress',
      '#percentage' => $value,
      '#maximum' => $this->getFieldSetting('maximum'),
    );

    return array('value' => $element);
  }

}
