<?php
  $staffMembers = get_sub_field('staff_members');
?>

<div class="o-section o-section--blueBg">
  <div class="o-wrapper">
    <div class="o-section-intro o-section-intro--centered u-margin-bottom-md">
        <?php if(get_sub_field('eyebrow')): ?>
          <div class="c-eyebrow u-color--offWhite"><?php echo get_sub_field('eyebrow'); ?></div>
        <?php endif; ?>
        <?php if(get_sub_field('headline')): ?>
          <h2 class="c-headline u-size--h2 u-color--white"><?php echo get_sub_field('headline'); ?></h2>
        <?php endif; ?>
        <?php if(get_sub_field('intro')): ?>
          <div class="c-rte c-rte--light"><?php echo get_sub_field('intro'); ?></div>
        <?php endif; ?>
    </div>
    <div class="o-grid o-grid--gutters-md">
      <?php foreach($staffMembers as $member): ?>
        <div class="o-grid__item u-width-1/2@sm u-width-1/3@md">
          <?php include(locate_template('_components/member.php')); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>