<?php

/**
 * Partial template for content in front-page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>



<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <!-- <--!!!!!!!!!!!!!!!!!! make url link an acf url field!!!!!!!!!!!!!!! -->
    <header class="home-entry-header" style="background-image: url('http://localhost/adapt-local/wp-content/uploads/2021/10/P1220286.jpg'); background-size: cover;">
        <div class="entry-content">
            <!-- add in advanced field option here -->

            <h2>Im the static entry content html from content-home.php</h2>

            <?php
            the_content();
            ?>



        </div><!-- .entry-content -->
    </header><!-- .entry-header -->
    <main class="site-main" id="main">

        <section class="pt-5">
            <h2 class="mb-5">Join The Community</h2>
            <div class="d-flex flex-wrap justify-content-between">

                <!-- arguments for events -->
                <?php
                $args = array(
                    'post_type' => 'Events',
                    'posts_per_page' => 3, // display the 3 most recent events 
                );
                // pass args into query
                $the_event_query = new WP_Query($args);
                ?>

                <?php if ($the_event_query->have_posts()) : ?>
                    <?php while ($the_event_query->have_posts()) : $the_event_query->the_post(); ?>
                        <!-- CARD LAYOUT HERE -->
                        <!-- EVENT CARD -->
                        <div class="community-child">
                            <?php the_title('<h4 class="card-event-title">', '</h4>') ?>
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
                            <footer class="event-card-footer">
                                <?php $card_footer = get_field('card_footer') ?>
                                <?php if ($card_footer) : ?>
                                    <p>Posted by: <?php _e($card_footer['author']) ?></p>
                                    <p>Date of Event: <?php _e($card_footer['date']) ?></p>

                                <?php endif; ?>
                            </footer>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e('sorry no posts match the criteria') ?></p>
                <?php endif; ?>
            </div>
            <!-- VIEW ALL BUTTON -->
            <?php $cta_link = get_field('event_view_all'); ?>
            <?php if ($cta_link) : ?>
                <a class="btn-primary" href="<?php echo esc_url($cta_link) ?>">View all Events</a>
            <?php endif; ?>
        </section>
    </main><!-- #main -->



</article><!-- #post-## -->