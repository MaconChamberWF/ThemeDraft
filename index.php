<?php get_header(); ?>

<?php 
  $postsPage = get_option('page_for_posts');
  if(get_field('page_headline', $postsPage)) {
    $pageHeadline = get_field('page_headline', $postsPage);
  } else {
    $pageHeadline = get_the_title($postsPage);
  }

  if(get_post_thumbnail_id($postsPage)) {
    $imageId = get_post_thumbnail_id($postsPage);
  } else {
    $imageId = get_field('default_hero_image', 'option');
  }
?>

<header>
  <?php include(locate_template('_components/breadcrumbs.php')); ?>
  <?php include(locate_template('_components/hero.php')); ?>
</header>

<main>
  <?php include(locate_template('_partials/news.php')); ?>
</main>

<?php get_footer(); ?>