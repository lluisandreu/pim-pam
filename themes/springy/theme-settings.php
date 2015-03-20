<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function springy_form_system_theme_settings_alter(&$form, &$form_state) {


  // Add a checkbox to toggle the breadcrumb trail.
  /*
   *$form['toggle_breadcrumb'] = array(
   *  '#type' => 'checkbox',
   *  '#title' => t('Display the breadcrumb'),
   *  '#default_value' => theme_get_setting('toggle_breadcrumb'),
   *  '#description'   => t('Show a trail of links from the homepage to the current page.'),
   *);
   */

    $font_list = array(
        'roboto' => '<a href="https://www.google.com/fonts/specimen/Roboto" target="_blank">Roboto</a>',
        'roboto_slab' => '<a href="https://www.google.com/fonts/specimen/Roboto+Slab" target="_blank">Roboto Slab</a>',
        'roboto_condensed' => '<a href="https://www.google.com/fonts/specimen/Roboto+Condensed" target="_blank">Roboto Condensed</a>',
        'open_sans' => '<a href="https://www.google.com/fonts/specimen/Open+Sans" target="_blank">Open Sans</a>',
        'source_sans_pro' => '<a href="https://www.google.com/fonts/specimen/Source+Sans+Pro" target="_blank">Source Sans Pro</a>',
        'ubuntu' => '<a href="https://www.google.com/fonts/specimen/Ubuntu" target="_blank">Ubuntu</a>',
    );

    $form['viewport'] = array(
        '#type' => 'fieldset',
        '#title' => t('Viewport settings'),
        '#description' => t('Let\'s you define the viewport meta tag content'),
    );

    $form['viewport']['viewport_settings'] = array(
        '#type' => 'textfield',
        '#title' => t('Viewport content'),
        '#default_value' => theme_get_setting('viewport_settings'),
        '#description' => t('Change the setting into content=""'),
    );

    $form['modernizr'] = array(
        '#type' => 'fieldset',
        '#title' => t('Modernizr'),

        'modernizr_settings' => array(
            '#type' => 'checkbox',
            '#title' => t('Include the last version of Modernizr. Recommended!'),
            '#default_value' => theme_get_setting('modernizr_settings'),
            '#description' => t('Modernizr is a JavaScript library that detects HTML5 and CSS3 features in the user’s browser.'),
        ),
    );

    $form['wmt_validation'] = array(
        '#type' => 'fieldset',
        '#title' => t('Webmaster tools validator'),

        'wmt_validation_check' => array(
            '#type' => 'checkbox',
            '#title' => t('Verify your site on Webmaster Tools using a <meta> tag in the head'),
            '#default_value' => theme_get_setting('wmt_validation_check'),
        ),
        'wmt_validation_text' => array(
            '#type' => 'textfield',
            '#title' => 'Paste your code here',
            '#default_value' => theme_get_setting('wmt_validation_text'),
        ),
    );

    $form['google_fonts_load'] = array(
        '#type' => 'fieldset',
        '#title' => t('Load some Google Fonts'),

        'font_settings' => array(
            '#type' => 'checkboxes',
            '#title' => t('Select the fonts you want to load'),
            '#options' => $font_list,
            '#description' => t('Selected fonts will be printed in the html.tpl.php using a <"link"> tag'),
            '#default_value' => theme_get_setting('font_settings'),
        ),
    );


}