<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */
/*echo "This is from content.php to display posts"; */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php

		if ( is_singular() ) :

			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

		    <?php underscoresass_post_thumbnail(); ?>

        <?php endif; ?>

	</header><!-- .entry-header -->

    <section class="post-content">

        <?php if (  is_active_sidebar( 'sidebar-1' ) ) : ?>

            <?php underscoresass_display_category(); // User created function to display category ?>

            <div class="entry-meta">
                <?php underscoresass_posted_by(); ?>
                <?php underscoresass_posted_on(); ?>
            </div><!-- .entry-meta -->

        <?php endif; ?>

        <?php if (  !is_active_sidebar( 'sidebar-1' ) ) : ?>

        <div class="post-content__wrap">

            <div class="post-content__meta">

                <div class="post-content__image">
                    <?php underscoresass_post_thumbnail(); ?>
                </div>


                <?php underscoresass_display_category(); // User created function to display category ?>

            <div class="entry-meta">
                <?php underscoresass_posted_by(); ?>
                <?php underscoresass_posted_on(); ?>
            </div><!-- .entry-meta -->

                <footer class="entry-footer">
                    <?php underscoresass_entry_footer(); ?>
                </footer><!-- .entry-footer -->

            </div>

            <div class="post-content__body">

        <?php endif; ?>


	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscoresass' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscoresass' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->




        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <footer class="entry-footer">
		        <?php underscoresass_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>


                <?php if (  !is_active_sidebar( 'sidebar-1' ) ) : ?>
            </div>
        </div>
        <?php endif; ?>

    <?php underscoresass_post_navigation(); ?>

    <?php if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif; ?>

    </section>

    <?php get_sidebar(); ?>


</article><!-- #post-<?php the_ID(); ?> -->
