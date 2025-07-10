<?php
  $args = array(
    'post_type'      => 'communities',
    'posts_per_page' => -1,
    'orderby'				 => 'title',
    'order'					 => 'ASC'
  );
  $communities = new WP_Query( $args );

  if(!$mapParams) {
    $mapParams = [
      'eyebrow' => get_sub_field('eyebrow'),
      'headline' => get_sub_field('headline'),
      'intro' => get_sub_field('intro')
    ];
  }
?>

<section class="o-section o-section--lg o-section--map">
  <div class="o-map">
    <div class="o-map__wrapper">
      <div class="o-map__intro-wrap">
        <div class="o-map__intro-inner">
          <?php if($mapParams['eyebrow']): ?><h2 class="c-eyebrow u-color--red"><?php echo $mapParams['eyebrow']; ?></h2><?php endif; ?>
          <?php if($mapParams['headline']): ?><div class="c-headline u-size--h2 u-color--offWhite"><?php echo $mapParams['headline']; ?></div><?php endif; ?>
          <?php if($mapParams['intro']): ?><div class="c-rte c-rte--light"><?php echo $mapParams['intro']; ?></div><?php endif; ?>
        </div>
      </div>
      <div class="o-map__content-wrap">
        <div class="o-map__map">
          <div class="o-ratio o-ratio--map">
            <?php include(locate_template('_components/map.php')); ?>
          </div>
        </div>
        <div class="o-map__content">
          <?php $count = 0; ?>
          <?php while($communities->have_posts()): $communities->the_post(); ?>
            <div class="o-map__panel <?php if($count == 0): ?>is-active<?php endif; ?>" data-map-panel="<?php echo $count; ?>">
              <?php 
                if(get_post_thumbnail_id()) {
                  $imageId = get_post_thumbnail_id();
                } else {
                  $imageId = get_field('default_hero_image', 'option');
                }
              ?>
              <div class="o-ratio o-ratio--pageLink o-ratio--image">
                <?php echo wp_get_attachment_image($imageId, 'intro'); ?>
              </div>
              <div class="o-map__panel-content">
                <h4 class="c-headline u-size--h4 u-color--offWhite u-margin-top-sm"><?php the_title(); ?></h4>
                <?php if(get_the_excerpt()): ?><div class="c-rte c-rte--light"><p><?php the_excerpt(); ?></p></div><?php endif; ?>
                <div class="u-margin-top-sm"><a href="<?php the_permalink(); ?>" class="c-btn">Explore</a></div>
              </div>
            </div>
            <?php $count++; ?>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php wp_reset_postdata(); ?>