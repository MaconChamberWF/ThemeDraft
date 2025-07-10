<?php
  if($member['headshot']) {
    $imageId = $member['headshot'];
  } else {
    $imageId = get_field('default_hero_image', 'option');
  }
?>

<div class="c-member">
  <div class="o-ratio o-ratio--member o-ratio--image">
    <?php echo wp_get_attachment_image($imageId, 'member'); ?>
  </div>
  <div class="c-member__headline-wrap">
    <?php if($member['name']): ?><h3 class="c-headline u-size--h6 u-color--offWhite"><?php echo $member['name']; ?></h3><?php endif; ?>
    <?php if($member['linkedin']): ?>
      <div class="c-member__linkedin-wrap">
        <a href="<?php echo $member['linkedin']; ?>" target="_blank" class="c-member__linkedin">
          <span class="u-hide-visually">LinkedIn</span>
          <?php include(locate_template('_assets/icon-linkedin.svg')); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
  <?php if($member['job_title']): ?><div class="c-member__job-title"><?php echo $member['job_title']; ?></div><?php endif; ?>
  <?php if($member['bio']): ?>
    <div class="c-member__bio">
      <div class="c-rte c-rte--light c-rte--small"><?php echo $member['bio']; ?></div>
    </div>
  <?php endif; ?>
  <?php if($member['favorite']): ?>
    <div class="c-member__favorite">
      <h4 class="c-member__favorite-label">Favorite thing about Macon</h4>
      <div class="c-rte c-rte--light c-rte--small"><?php echo $member['favorite']; ?></div>
    </div>
  <?php endif; ?>
</div>