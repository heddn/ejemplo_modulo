<?php

/**
 * @file
 * Contains Drupal\ejemplo\Plugin\Field\FieldFormatter\ExampleFormatterType.
 */

namespace Drupal\ejemplo\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'example_progress' formatter.
 *
 * @FieldFormatter(
 *   id = "example_progress",
 *   label = @Translation("Example progress formatter"),
 *   field_types = {
 *     "example_progress"
 *   }
 * )
 */
class ExampleFormatterType extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'maximum' => 100,
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];

    $elements['maximum'] = array(
      '#type' => 'textfield',
      '#title' => t('Maximum'),
      '#default_value' => $this->getFieldSetting('maximum') ? $this->getFieldSetting('maximum') : $this->defaultSettings()['maximum'],
      '#size' => 4,
      '#maxlength' => 6,
      '#required' => TRUE,
    );

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $arguments = array(
      '%maximum' => $this->getFieldSetting('maximum') ? $this->getFieldSetting('maximum') : $this->defaultSettings()['maximum'],
    );
    $summary = array(
      '#markup' => $this->t('Maximum value: %maximum', $arguments),
    );

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#theme' => 'example_progress',
        '#percentage' => $item->value,
        '#maximum' => $this->getFieldSetting('maximum') ? $this->getFieldSetting('maximum') : $this->defaultSettings()['maximum'],
      );

    }

    return $elements;
  }

}
