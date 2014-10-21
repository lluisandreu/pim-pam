<?php

if(!module_exists("jquery_update")){
  drupal_set_message(t("Springy requires jQuery Update (> 1.9) to work properly"), 'warning', FALSE);
}

/**
 * Implements hook_form_alter().
 */
function springy_form_alter(&$form, &$form_state, $form_id) {
    switch ($form_id) {
      // Tweak Drupal Search Module
      case 'search_block_form':
        $form['search_block_form']['#attributes']['class'] = array("input");
        $form['search_block_form']['#attributes']['placeholder'] = 'I am searching for...';
        $form['search_block_form']['#prefix'] = '<div class="field search-block-form__field">';
        $form['search_block_form']['#suffix'] = '</div>';
        $form['search_block_form']['#size'] = 20;
        break;
      case 'search_form':
        $form['basic']['keys']['#attributes']['class'][] = "input";
        $form['basic']['keys']['#prefix'] = '<div class="field search-form__field">';
        $form['basic']['keys']['#suffix'] = '</div>';
        break;
    }

}

function springy_html_head_alter(&$head_elements) {
    if(theme_get_setting('viewport_settings')){
    $viewport_settings = theme_get_setting('viewport_settings');
    $head_elements['viewport']['#type'] = 'markup';
    $head_elements['viewport']['#markup'] = '<meta name="viewport" content="'.$viewport_settings.'">' . "\n" ;
    }
    if(theme_get_setting('wmt_validation_check') && theme_get_setting('wmt_validation_text')){
      $wmt_validation_code = theme_get_setting('wmt_validation_text');
      $head_elements['validation']['#type'] = 'markup';
      $head_elements['validation']['#markup'] = $wmt_validation_code . "\n";
    }
}

/// Add custom Font Types
function springy_preprocess_html(&$variables) {
  if(theme_get_setting('font_settings')){
    $font_settings = theme_get_setting('font_settings');

    if($font_settings['source_sans_pro'] !== 0){
      drupal_add_css("//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,200italic,300italic,400italic,600italic", array('type' => 'external'));
    }
    if($font_settings['open_sans'] !== 0){
      drupal_add_css("//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300", array('type' => 'external'));
    }
    if($font_settings['roboto_condensed'] !== 0){
      drupal_add_css("//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,400,700,300", array('type' => 'external'));
    }
    if($font_settings['roboto_slab'] !== 0){
      drupal_add_css("//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700", array('type' => 'external'));
    }
    if($font_settings['roboto'] !== 0){
      drupal_add_css("//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic", array('type' => 'external'));
    }
    if($font_settings['ubuntu'] !== 0){
     drupal_add_css("//fonts.googleapis.com/css?family=Ubuntu:300,400,500,300italic,400italic,500italic", array('type' => 'external'));
    }
  }
}


function springy_theme() {
  $items = array();
  // create custom user-login.tpl.php
  $items['user_login'] = array(
  'render element' => 'form',
  'path' => drupal_get_path('theme', 'springy') . '/theme/user',
  'template' => 'user-login',
  'preprocess functions' => array(
    'springy_preprocess_user_login'
  ),
 );
  $items['user_register_form'] = array(
  'render element' => 'form',
  'path' => drupal_get_path('theme', 'springy') . '/theme/user',
  'template' => 'user-register-form',
  'preprocess functions' => array(
  'springy_preprocess_user_register_form'
  ),
);
  $items['user_pass'] = array(
  'render element' => 'form',
  'path' => drupal_get_path('theme', 'springy') . '/theme/user',
  'template' => 'user-pass',
  'preprocess functions' => array(
  'springy_preprocess_user_pass_form'
  ),
);
return $items;
}

// Unset Drupal Stylesheets
function springy_css_alter(&$css) {
    unset($css[drupal_get_path('module','system').'/system.theme.css']);
    unset($css[drupal_get_path('module','system').'/system.menus.css']);
    unset($css[drupal_get_path('module','system').'/system.base.css']);
    unset($css[drupal_get_path('module','system').'/system.messages.css']);
    unset($css[drupal_get_path('module','field').'/theme/field.css']);
    unset($css[drupal_get_path('module','node').'/node.css']);
    unset($css[drupal_get_path('module','search').'/search.css']);
    unset($css[drupal_get_path('module','user').'/user.css']);
    unset($css[drupal_get_path('module','views').'/css/views.css']);
}


// Messages
include "theme/system/messages.tpl.inc";

// Buttons
include "theme/system/buttons.tpl.inc";

// Fields
include "theme/system/fields.func.inc";

// Tabs
include "theme/system/tabs.func.inc";






