<?php $custom = get_sub_field('custom'); ?>

<div class="o-section o-section--offWhiteBg">
  <div class="o-wrapper o-wrapper--md">
    <div class="o-grid o-grid--gutters-sm">

      <?php if($custom): ?>
        <?php $pageLinks = get_sub_field('page_links'); ?>
        <?php foreach($pageLinks as $page): ?>
          <div class="o-grid__item u-width-1/2@md">
            <?php
              $pageLink = [
                'headline' => $page['headline'],
                'text' => '<p>' . $page['text'] . '</p>',
                'imageId' => $page['image'],
                'url' => $page['link']['url'],
                'target' => $page['link']['target'],
              ];
            ?>
            <?php include(locate_template('_components/page-link.php')); ?>
          </div>
        <?php endforeach; ?>
      <?php else: ?>

        <?php
          $args = array(
            'post_type' => 'page',
            'post_parent' => get_the_ID(),                               
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
          );

          $query = new WP_Query($args);
        ?>
        <?php if($query->have_posts()): ?>
          <?php while($query->have_posts()): $query->the_post(); ?>
            <div class="o-grid__item u-width-1/2@md">
              <?php 
                $pageLink = [
                  'headline' => get_the_title(),
                  'text' => '<p>' . get_the_excerpt() . '</p>',
                  'imageId' => get_post_thumbnail_id(get_the_ID()),
                  'url' => get_permalink()
                ];
              ?>
              <?php include(locate_template('_components/page-link.php')); ?>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>