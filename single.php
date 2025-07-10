<?php get_header(); ?>

<header>
  <?php include(locate_template('_components/breadcrumbs.php')); ?>
  <div class="o-section o-section--postHero">
    <div class="o-wrapper o-wrapper--sm">
      <h1 class="c-headline c-headline--pageHeadline u-color--offWhite u-margin-bottom-sm"><?php the_title(); ?></h1>
      <div class="u-color--offWhite"><?php echo get_the_date('F j, Y'); ?></div>
    </div>
  </div>
</header>

<main class="o-section o-section--postBody">
  <?php
    $categories = get_the_category(get_the_ID());

    if(get_post_thumbnail_id()) {
      $imageId = get_post_thumbnail_id();
    } else {
      $imageId = get_field('default_hero_image', 'options');
    }
  ?>
  <div class="o-wrapper o-wrapper--sm">
    <div class="o-ratio o-ratio--postHero o-ratio--image">
      <?php echo wp_get_attachment_image($imageId, 'large');  ?>
    </div>
    <?php if($categories): ?>
      <div class="o-btn-group o-btn-group--tags u-margin-top-xs">
        <?php foreach($categories as $category): ?>
          <a href="<?php echo get_category_link($category); ?>" class="c-tag"><?php echo $category->name; ?></a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <div class="c-rte u-margin-top-xs u-padding-top-xs u-border-top">
      <?php the_content(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>