<?php

/**
 * Partial template for content in volunteer.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <!-- arguments for Volunteer -->
    <?php
    $args = array(
        'post_type' => 'Volunteer',
        'post_per_page' => 6, // display the 3 most recent Volunteer 
    );
    // pass args into query
    $the_volunteer_query = new WP_Query($args);
    ?>

    <section class="pt-5">

        <!-- BANNER: Front end content -->
        <header class="volunteer-header">
            <?php
            the_content()
            ?>
        </header>

        <div class="volunteer-body d-flex flex-wrap justify-content-between">
            <h2>Current Postions</h2>

            <!-- arguments for Volunteer -->
            <?php
            $args = array(
                'post_type' => 'Volunteer',
                'post_per_page' => -1, // display the 3 most recent Volunteer 
                'order' => 'DESC'
            );
            // pass args into query
            $the_volunteer_query = new WP_Query($args);
            ?>

            <?php if ($the_volunteer_query->have_posts()) : ?>
                <?php while ($the_volunteer_query->have_posts()) : $the_volunteer_query->the_post(); ?>
                    <!-- CARD LAYOUT HERE -->
                    <!-- volunteer CARD -->
                    <div class="community-child">
                        <?php the_title('<h4 class="card-volunteer-title">', '</h4>') ?>
                        <div class="community-child-content"><?php the_content() ?></div>
                        
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e('sorry no posts match the criteria') ?></p>
            <?php endif; ?>
        </div>
    </section>




</article><!-- #post-## -->