<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix iac-container"<?php print $attributes; ?>>
<?php print render($title_prefix); ?>
<?php print render($title_suffix); ?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php
      print render($content);
    ?>
  </div>
<?php
global $user;
if((in_array("administrator",$user->roles)) || ($user->uid == 1)) {
        print '<div class="iac iac-edit pretty medium primary btn icon-left icon-pencil"><a href="'.url('node/'.$node->nid.'/edit').'">Edit this page</a></div>';
}
?>
</div>