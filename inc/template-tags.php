<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Starter_Theme
 */

if ( ! function_exists( 'underscoresass_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function underscoresass_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' on %s', 'post date', 'underscoresass' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

        // Added by user end
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo ' <span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: post title */
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'underscoresass' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        } // Added by user ends

        // Added by user start
        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'underscoresass' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            ' <span class="edit-link">',
            '</span>'
        );
        // Added by user end

	}
endif;

if ( ! function_exists( 'underscoresass_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function underscoresass_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'Written by %s', 'post author', 'underscoresass' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'underscoresass_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function underscoresass_entry_footer() {
		// Hide tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( '', 'list item separator', 'underscoresass' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'underscoresass' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

	}
endif;

if ( ! function_exists( 'underscoresass_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function underscoresass_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;


	function underscoresass_display_category() {
        $categories_list = get_the_category_list( esc_html__( ' ', 'underscoresass' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<span class="cat-links">' . esc_html__( '%1$s', 'underscoresass' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        }
    }


/**
 * Post navigation (previous / next post) for single posts.
 */
function underscoresass_post_navigation() {
    the_post_navigation( array(
        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'underscoresass' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Next post:', 'underscoresass' ) . '</span> ' .
            '<span class="post-title">%title</span>',
        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'underscoresass' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Previous post:', 'underscoresass' ) . '</span> ' .
            '<span class="post-title">%title</span>',
    ) );
}

/**
 * Read more excerpt thingy
 */

function underscores_excerpt_more ( $more ) {

    return "...";
}

add_filter( 'excerpt_more', 'underscores_excerpt_more' );

/**
 * Read more excerpt thingy
 */

function underscores_excerpt_length ( $lenght ) {

    return 100;
}

add_filter( 'excerpt_length', 'underscores_excerpt_length' );