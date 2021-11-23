<?php

/**
 * Template Name: Events
 * Display all events from events cpt
 * @package Understrap
 * @since 1.0.0
 * 
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
			<?php get_template_part('global-templates/left-sidebar-check'); ?>

			<main class="site-main" id="main">

				<!-- THE LOOP -->
				<?php
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/content', 'events');

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<!-- get_template_part( 'global-templates/right-sidebar-check' );  -->
			<?php ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
