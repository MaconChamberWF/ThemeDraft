<div class="o-section o-section--grayBg">
  <div class="o-wrapper">
    <div class="o-grid o-grid--gutters-sm">
      <?php foreach(get_sub_field('ctas') as $cta): ?>
        <div class="o-grid__item u-width-1/2@sm">
          <?php include(locate_template('_components/cta.php')); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>