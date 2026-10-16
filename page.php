<?php get_header(); ?>

<main class="main-content--center page__container">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="page__ttl"><?php the_title(); ?></h1>

        <div class="page__content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php
    endwhile;
    ?>
  </div>
</main>

<?php get_footer(); ?>