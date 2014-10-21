<fieldset>
    <legend>Log in to your account</legend>
    <?php print drupal_render_children($form) ?>
    <div class="field">
        <div class="login-link btn default"><a href="<?php print url('user/password'); ?>">Have you lost your password?</a></div>
    </div>
</fieldset>