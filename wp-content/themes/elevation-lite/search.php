<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Elevation Lite
 */

get_header(); ?>

<div class="container">
     <div class="site-pagelayout">
        <section class="site-page-content">
            <div class="site-bloglist">
				<?php if ( have_posts() ) : ?>
                    <header>
                        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'elevation-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'search' ); ?>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <?php get_template_part( 'no-results' ); ?>
                <?php endif; ?>                  
            </div><!-- site-bloglist -->
        </section>      
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->

<?php get_footer(); ?>