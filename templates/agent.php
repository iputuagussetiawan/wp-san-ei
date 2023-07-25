<div class="col-md-4 col-sm-12">


  <article <?php post_class(); ?>>

     <a href="<?php the_permalink(); ?>">

      <header class="heading-cpt-broadcast">
        <?php
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
        the_post_thumbnail( 'full' );
        }
        ?>

      </header>

      <div class="entry-summary">

        <?php the_excerpt(); ?>

      </div>

    </a>

  </article>

</div>