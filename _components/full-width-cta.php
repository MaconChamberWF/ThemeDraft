<?php
$fullWidthCta = $fullWidthCta ?? '';
?>


<?php
  if(!$fullWidthCta) {
    $fullWidthCta = array(
      'headline' => get_sub_field('headline'),
      'button' => get_sub_field('button')
    );
  }
?>

<div class="c-full-width-cta">
  <div class="c-full-width-cta__logo">
    <?php include(locate_template('_assets/logo-monogram.svg')); ?>
  </div>
  <?php if($fullWidthCta['headline']): ?>
    <div class="c-full-width-cta__headline">
      <div class="c-headline u-size--h3 u-color--offWhite"><?php echo $fullWidthCta['headline']; ?></div>
    </div>
  <?php endif; ?>
  <?php if($fullWidthCta['button']): ?>
    <div class="c-full-width-cta__btn">
      <a href="<?php echo $fullWidthCta['button']['url']; ?>" target="<?php echo $fullWidthCta['button']['target']; ?>" class="c-btn"><?php echo $fullWidthCta['button']['title']; ?></a>
    </div>  
  <?php endif; ?>
</div>