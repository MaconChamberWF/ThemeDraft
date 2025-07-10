<?php

// Template Name: Home

get_header(); ?>
<?php
    the_content();
?>

  

    <?php include(locate_template('_modules/featured_media.php')); ?>

  </main>

<?php get_footer(); ?>
