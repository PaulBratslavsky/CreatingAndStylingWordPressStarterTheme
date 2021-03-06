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
		endif;

		if ( 'post' === get_post_type() ) :
			?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
            <?php underscoresass_post_thumbnail(); ?>
        </a>


            <?php underscoresass_display_category(); // User created function to display category ?>


            <div class="entry-meta">
				<?php
                underscoresass_posted_by();
				underscoresass_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

    <section class="post-content"> // more attention needed here
	<div class="entry-content">
		<?php

		the_excerpt();

		?>
	</div><!-- .entry-content -->

        <?php

            $read_more_link = sprintf(
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
		    );

        ?>

        <div class="continue-reading">
            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                <?php echo $read_more_link; ?>
            </a>
        </div>

	<footer class="entry-footer">
		<?php underscoresass_entry_footer(); ?>
	</footer><!-- .entry-footer -->

    </section>
</article><!-- #post-<?php the_ID(); ?> -->
