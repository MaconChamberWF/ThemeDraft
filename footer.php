<footer class="c-footer">
  <div class="o-wrapper">
    <div class="c-footer__inner">
      <div class="c-footer__monogram">
        <?php include(locate_template('_assets/logo-monogram.svg')); ?>
      </div>
      <div class="c-footer__content-wrap">
        <div class="c-footer__contact-info">
          <label class="c-eyebrow u-color--gold">Contact Us</label>
          <?php if(get_field('address', 'option')): ?>
            <address class="c-footer__address">
              <?php echo get_field('address', 'option'); ?>
            </address>
          <?php endif; ?>
          <?php if(get_field('phone', 'option')): ?>
            <div class="c-footer__phone"><a href="<?php echo 'tel:' . get_field('phone', 'option'); ?>"><?php echo get_field('phone', 'option'); ?></a></div>
          <?php endif; ?>
          <!-- <?php if(get_field('phone_toll_free', 'option')): ?>
            <div class="c-footer__phone"><a href="<?php echo 'tel:' . get_field('phone_toll_free', 'option'); ?>"><?php echo get_field('phone_toll_free', 'option'); ?></a></div>
          <?php endif; ?> -->
        </div>
      </div>
      <div class="c-footer__menu-wrap">
        <div class="c-footer__logo">
          <span class="u-hide-visually">Heart. Soul. Macon</span>
          <img src="/wp-content/themes/macon/_assets/logo-choose-macon.png" >
        </div>
        <?php $footerMenu = wp_get_nav_menu_items('footer-menu'); ?>
        <ul class="c-footer__items">
          <?php foreach($footerMenu as $item): ?>
            <?php $curNavItemID = $item->ID; ?>
            <?php if($item->menu_item_parent == 0): ?>
              <li class="c-footer__item">
                <a href="<?php echo $item->url; ?>" class="c-footer__link"><?php echo $item->title; ?></a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</footer>

<?php $v = file_get_contents(get_template_directory_uri() . '/_partials/cache-smash.php', true); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor.min.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.min.js?v=<?php echo $v; ?>"></script>

<?php wp_footer(); ?>

</body>
</html>
