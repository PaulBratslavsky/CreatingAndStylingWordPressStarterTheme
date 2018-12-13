<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'underscoresass' ); ?></a>
        <?php if ( get_header_image() && is_front_page() ) : ?>
            <figure class="header-image"><?php the_header_image_tag(); ?></figure>
        <?php endif; ?>
	<header id="masthead" class="site-header">
		<div class="site-branding">

            <?php the_custom_logo(); ?>

            <div class="site-branding__text">
			<?php

			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$underscoresass_description = get_bloginfo( 'description', 'display' );
			if ( $underscoresass_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $underscoresass_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
            </div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                                                width="45" height="45" viewBox="0 0 224 224"
                                                                                                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"  font-size="none"  style="mix-blend-mode: normal"><path d="M0,224v-224h224v224z" fill="none"></path><g fill="#ffffff"><path d="M22.4,52.26667c-2.69275,-0.03808 -5.19741,1.37667 -6.55489,3.70252c-1.35749,2.32585 -1.35749,5.20245 0,7.5283c1.35749,2.32585 3.86215,3.7406 6.55489,3.70252h179.2c2.69275,0.03808 5.19741,-1.37667 6.55489,-3.70252c1.35749,-2.32585 1.35749,-5.20245 0,-7.5283c-1.35749,-2.32585 -3.86215,-3.7406 -6.55489,-3.70252zM22.4,104.53333c-2.69275,-0.03808 -5.19741,1.37667 -6.55489,3.70252c-1.35749,2.32585 -1.35749,5.20245 0,7.5283c1.35749,2.32585 3.86215,3.7406 6.55489,3.70252h179.2c2.69275,0.03808 5.19741,-1.37667 6.55489,-3.70252c1.35749,-2.32585 1.35749,-5.20245 0,-7.5283c-1.35749,-2.32585 -3.86215,-3.7406 -6.55489,-3.70252zM22.4,156.8c-2.69275,-0.03808 -5.19741,1.37667 -6.55489,3.70252c-1.35749,2.32585 -1.35749,5.20245 0,7.5283c1.35749,2.32585 3.86215,3.7406 6.55489,3.70252h179.2c2.69275,0.03808 5.19741,-1.37667 6.55489,-3.70252c1.35749,-2.32585 1.35749,-5.20245 0,-7.5283c-1.35749,-2.32585 -3.86215,-3.7406 -6.55489,-3.70252z"></path></g></g></svg><?php esc_html_e( '', 'underscoresass' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
        <!-- <a href="https://icons8.com/icon/68555/menu">Menu icon by Icons8</a> -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
