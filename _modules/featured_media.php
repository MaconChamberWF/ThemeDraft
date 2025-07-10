<?php
  $categories = get_sub_field('category');
  $tags = get_sub_field('tag');

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'ignore_sticky_posts' => true
  );

	if($categories || $tags) {
		$taxQuery = array('relation' => 'AND');

		if($categories) {
			$taxQuery[] = array(
				'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $categories
			);
		}

		if($tags) {
			$taxQuery[] = array(
				'taxonomy' => 'post_tag',
				'field' => 'term_id',
				'terms' => $tags
			);
		}

		$args['tax_query'] = $taxQuery;
	}

  $query = new WP_Query($args);
?>

<?php if($query->have_posts()): ?>
<section class="o-section">
  <div class="o-wrapper">
    <div class="o-section-intro">
      <div class="o-section-intro__content">
        <h2 class="c-eyebrow u-color--red">Featured Media</h2>
        <div class="c-headline u-size--h2">Keep on the pulse</div>
      </div>
      <div class="o-section-intro__btn">
        <a href="/news" class="c-btn c-btn--sm">View All Media</a>
      </div>
    </div>  
    <div class="o-grid o-grid--gutters-sm u-margin-top-sm">
      <?php while($query->have_posts()): $query->the_post(); ?>
        <div class="o-grid__item u-width-1/2@md">
          <?php include(locate_template('_components/media-card.php')); ?>
        </div>
      <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>