<?php

function springy_textfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'text';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('text input textfield'));

  $output = '<div class="field"><input' . drupal_attributes($element['#attributes']) . ' /></div>';

  return $output;
}

function springy_webform_email($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'email';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('text input textfield'));

  $output = '<div class="field "><input' . drupal_attributes($element['#attributes']) . ' /></div>';

  return $output;
}

function springy_emailfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'email';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('text input'));

  $output = '<div class="field"><input' . drupal_attributes($element['#attributes']) . ' /></div>';

  return $output;
}

function springy_search($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'search';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('text input textfield'));

  $output = '<div class="field "><input' . drupal_attributes($element['#attributes']) . ' /></div>';

  return $output;
}


function springy_textarea($variables) {
$element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
  _form_set_class($element, array('form-textarea'));

  $element['#attributes']['class'][] = 'input textarea';

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper field'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    drupal_add_library('system', 'drupal.textarea');
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}

function springy_select($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'size'));
  //_form_set_class($element, array('form-select'));

  return '<div class="picker"><select' . drupal_attributes($element['#attributes']) . '>' . form_select_options($element) . '</select></div>';
}

function springy_password($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'password';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('input password'));

  $output = '<div class="field"><input' . drupal_attributes($element['#attributes']) . ' /></div>';

 //return $output . $extra;
  return $output;
}