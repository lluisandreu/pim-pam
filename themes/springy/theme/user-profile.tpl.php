<div class="iac-container">
    <div class="profile"<?php print $attributes; ?>>
      <?php print render($user_profile); ?>
    </div>
    <?php
    $userid = arg(1);
    global $user;
    if($user->uid == is_numeric($userid) || $user->uid == 1) {
            print '<div class="iac iac-edit pretty medium primary btn icon-left icon-vcard"><a href="'.url('user/'.$userid.'/edit').'">Edit profile</a></div>';
    }
?>
</div>