<?php
$type = '';
if($result['fields']['ss_filemime'] === 'application/pdf'){
  $type = 'pdf';
}
?>

<li class="<?php print $classes .' '. $type; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <h3 class="title"<?php print $title_attributes; ?>>
    <a href="<?php print $url; ?>">
    <?php
    print $title;
    if($type == 'pdf'){print '<em> (DOCUMENT/PDF)</em>';}
    ?></a>
  </h3>
  <?php print render($title_suffix); ?>
  <div class="search-snippet-info">
    <?php if ($snippet): ?>
      <p class="search-snippet"<?php print $content_attributes; ?>><?php print $result['snippets']['content'][0]; ?></p>
    <?php endif; ?>
      <p class="bundle link"><?php print '<em><strong>' . $result['type'] . '</strong> - <a href="'.$result['link'].'">'. $result['link'] . '</a></em>'; ?></p>
  </div>
</li>
