<div id="page">
    <header>
        <div class="row">
            <div class="twelve columns special head">
            <?php if ($logo): ?>
                <div id="logo">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                      <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                    </a>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </header>
    <nav>
        <div class="row">
            <div class="twelve columns">
                <?php print render($page['nav']); ?>

            </div>
        </div>
    </nav>
    <main>
        <div class="row">
            <div class="messages-area twelve columns">
                <?php print $messages; ?>
            </div>
            <?php if($is_front): ?>
                <!-- Homepage regions -->
                <div id="front">
                    <article class="twelve columns">
                        <?php print render($page['content']); ?>
                    </article>
                </div>
            <?php else: ?>
                <div id="no-front">
                    <?php if(!empty($page['aside'])): ?>
                        <article class="aside six columns">
                            <h1><?php print $title; ?></h1>
                            <?php print render($page['content']); ?>
                        </article>
                        <aside class="six columns">
                            <?php print render($page['aside']); ?>
                        </aside>
                    <?php else: ?>
                        <article class="twelve columns">
                            <h1><?php print $title; ?></h1>
                            <?php print render($tabs); ?>
                            <?php print render($page['content']); ?>
                        </article>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <div class="row">
                <div id="footer-columns" class="twelve columns">
                    <div class="footer-column footer-first three columns"><?php print render($page['footer_first']); ?></div>
                    <div class="footer-column footer-second three columns"><?php print render($page['footer_second']); ?></div>
                    <div class="footer-column footer-third three columns"><?php print render($page['footer_third']); ?></div>
                    <div class="footer-column footer-forth three columns"><?php print render($page['footer_forth']); ?></div>
                </div>
                <div id="footer-bottom" class="twelve columns">
                    <div id="credits">Drupal site by <a href="http://www.websitedevelopment.ltd.uk/" target="_blank">Website Development Ltd</a></div>
                </div>
            </div>
    </footer>
</div>