<?php
  $category = get_the_category();

  if(get_post_thumbnail_id()) {
    $imageId = get_post_thumbnail_id();
  } else {
    $imageId = get_field('default_hero_image', 'option');
  }
?>

<a href="<?php the_permalink(); ?>" class="c-media-card">
  <div class="c-media-card__image">
    <div class="o-ratio o-ratio--mediaCard">
      <?php echo wp_get_attachment_image($imageId, 'intro'); ?>
    </div>
    <?php if($category): ?>
      <div class="c-media-card__category"><?php echo $category[0]->cat_name; ?></div>
    <?php endif; ?>
  </div>
  <div class="c-media-card__content">
    <time class="c-media-card__date"><?php echo get_the_date('F j, Y'); ?></time>
    <h3 class="c-media-card__headline"><?php the_title(); ?></h3>
  </div>
</a>