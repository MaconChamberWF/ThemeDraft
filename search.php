<?php

// Search Landing Page
   global $wp_query;

get_header(); ?>

<main class="main main-search">

   <div class="search-form-wrap">
      <?php get_search_form(); ?>
   </div>

   <section class="search__content-col search-results">

      <?php
         global $wp_query;
         if($wp_query->found_posts == 1):
            $search_query = $wp_query->found_posts . ' Result for "' . get_search_query() . '"';
         else:
            $search_query = $wp_query->found_posts . ' Results for "' . get_search_query() . '"';
         endif;
      ?>

      <header class="search-results__header">
         <h1 class="search-results__title">Search Results</h1>
         <p class="search-results__label"><?php echo $search_query; ?></p>
      </header>

      <?php if(have_posts()): ?>

            <?php while(have_posts()): the_post(); ?>

               <?php get_template_part( '_partials/content', 'search' ); ?>

            <?php endwhile; ?>

      <?php endif; ?>

   </section>

</main>

<?php get_footer(); ?>
