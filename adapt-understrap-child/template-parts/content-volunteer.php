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
        <h2 class="mb-5">Register to volunteer</h2>
        <div class="d-flex flex-wrap justify-content-between">

            <!-- arguments for Volunteer -->
            <?php
            $args = array(
                'post_type' => 'Volunteer',
                'post_per_page' => 6, // display the 3 most recent Volunteer 
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
                        <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                        <?php the_excerpt() ?>
                        <?php
                        $term = get_the_category();
                        if ($term) {
                            foreach ($term as $t) {
                                $t = get_term($t);
                                print_r('<a href="' . get_term_link($t) . '">' . $t->name . '</a>');
                            }
                        }

                        ?>
                        <footer class="volunteer-card-footer">
                            <?php $card_footer = get_field('card_footer') ?>
                            <?php if ($card_footer) : ?>
                                <p>Posted by: <?php _e($card_footer['author']) ?></p>
                                <p>Date of volunteer: <?php _e($card_footer['date']) ?></p>

                            <?php endif; ?>
                        </footer>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e('sorry no posts match the criteria') ?></p>
            <?php endif; ?>
        </div>
    </section>




</article><!-- #post-## -->