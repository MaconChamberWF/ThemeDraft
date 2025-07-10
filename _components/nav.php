<nav class="c-nav">
  <div class="c-nav__logo">
    <a href="/" class="c-nav__logo-link">
      <img src="<?php echo get_theme_file_uri('/_assets/logo-choose-macon.png'); ?>" alt="Logo Macon">
      <span class="u-hide-visually"><?php echo bloginfo('name'); ?></span>
    </a>
  </div>
  <button class="c-nav__toggle" data-full-menu-toggle>
    <span class="u-hide-visually">Menu</span>
    <div class="c-nav__toggle-icon">
      <?php include(locate_template('_assets/icon-menu.svg')); ?>
    </div>
  </button>
</nav>