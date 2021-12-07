<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check get_template_part( 'global-templates/left-sidebar-check' );-->
			<?php  ?>

			<main class="site-main-volunteer" id="main">

				<?php
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/content', 'single');
					understrap_post_nav();
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check get_template_part('global-templates/right-sidebar-check');-->
			<?php  ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
