<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr($container); ?>">

		<div>

			<footer class="site-footer row" id="colophon">
				<div class="col-md-7">
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'footer_menu',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'footer_menu',
							'depth'           => 1,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>


				</div>

				<div class="site-info col-md-5">
					<!-- Your site title as branding in the menu -->
					<?php if (!has_custom_logo()) { ?>

						<?php if (is_front_page() && is_home()) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>

						<?php endif; ?>

					<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- this is the wordpress and understrap information -->
					<?php //understrap_site_info(); 
					?>

				</div><!-- .site-info -->

			</footer><!-- #colophon -->



			<!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer();
?>

</body>

</html>