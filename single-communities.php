<?php get_header(); ?>

<header>
  <?php include(locate_template('_components/breadcrumbs.php')); ?>
  <?php include(locate_template('_components/hero.php')); ?>
</header>

<main>  
  <?php include(locate_template('_partials/modules.php')); ?>
</main>

<?php get_footer(); ?>