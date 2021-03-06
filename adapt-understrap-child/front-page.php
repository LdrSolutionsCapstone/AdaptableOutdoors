<?php

/**
 * The template for displaying HOMEPAGE-CONTENT
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
		<?php
		/**
		 * The template for displaying all pages
		 *
		 * This is the template that displays all pages by default.
		 * Please note that this is the WordPress construct of pages
		 * and that other 'pages' on your WordPress site will use a
		 * different template.
		 *
		 * @package Understrap
		 */

		// Exit if accessed directly.
		defined('ABSPATH') || exit;

		get_header();

		$container = get_theme_mod('understrap_container_type');

		?>

		<div class="wrapper" id="page-wrapper">

			<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

				<div class="row">

					<!-- Do the left sidebar check -->
					<!-- get_template_part( 'global-templates/left-sidebar-check' );
					<main class="site-main" id="main" -->
					<?php ?>

					<!-- THE LOOP -->
					<?php
					while (have_posts()) {
						the_post();
						get_template_part('template-parts/content', 'home');

						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()) {
							comments_template();
						}
					}
					?>

					</main><!-- #main -->

					<!-- Do the right sidebar check et_template_part( 'global-templates/right-sidebar-check' ); -->
					<?php ?>

				</div><!-- .row -->

			</div><!-- #content -->

		</div><!-- #page-wrapper -->
	</div>
</div>


<?php
get_footer();
