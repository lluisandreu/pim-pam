<?php
/// Make Drupal messages pretty
function springy_theme_registry_alter(&$theme_registry) {
  $theme_registry['status_messages']['function'] = '_custom_theme_status_messages';
}
/**
 * Custom theme function that overrides
 * theme('status_messages').
 */
function _custom_theme_status_messages($variables) {
  $display = $variables['display'];
  $output = '<div class="springy-messages">';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
    'info' => t('Informative message'),
  );

  // Map Drupal message types to their corresponding gumby classes.
  $status_class = array(
    'status' => 'success',
    'error' => 'danger',
    'warning' => 'warning',
    // Not supported, but in theory a module could send any type of message.
    // @see drupal_set_message()
    // @see theme_status_messages()
    'info' => 'info',
  );

  foreach (drupal_get_messages($display) as $type => $messages) {
    $class = (isset($status_class[$type])) ? $status_class[$type] : '';


    if (!empty($status_heading[$type])) {
      $output .= '<h4 class="element-invisible">' . $status_heading[$type] . "</h4>\n";
    }


      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li class="alert '.$status_class[$type].'">' . $message . "</li>\n";
      }
      $output .= " </ul>\n";

  }
  $output .= '</div>';

  return $output;
}