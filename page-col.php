<?php

// Template Name: Cost of Living Calculator

get_header(); ?>

<header>
  <?php include(locate_template('_components/breadcrumbs.php')); ?>
</header>

<main>
  <?php echo do_shortcode('[dci-cost-of-living-calculator]'); ?>
</main>

<?php get_footer(); ?>