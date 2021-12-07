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
    <header class="home-entry-header" style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id, 'large') ?>); background-size: cover;">
        <div class="entry-content">
            <!-- add in advanced field option here -->
            <div class="banner-front-page">
                <?php
                the_content()
                ?>
                <!-- VIEW ALL BUTTON -->
                <?php $button_link = get_field('participate_button'); ?>
                <?php if ($button_link) : ?>
                    <a class="btn-primary" href="<?php echo esc_url($button_link) ?>">Participate</a>
                <?php endif; ?>

            </div>
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->
    <main class="site-main" id="main">

        <section class="">
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
                        <div class="community-child-home">

                            <div class="card-img-home"><?php echo get_the_post_thumbnail($post->ID, 'large'); ?></div>
                            <?php the_title('<h3 class="card-event-title">', '</h3>') ?>
                            <a class="btn-primary" href="https://adapt.web.dmitcapstone.ca/adapt/participate/">Sign up</a>


                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e('sorry no posts match the criteria') ?></p>
                <?php endif; ?>
            </div>
            <!-- VIEW ALL BUTTON -->
        </section>
        <section class="volunteer-section">
            <div class="vol-div">
                <h2>Join Our Volunteers</h2>
                <?php $volunteer_section = get_field('volunteer_section_text'); ?>
                <?php if ($volunteer_section) : ?>
                    <p><?php echo $volunteer_section ?></p>
                <?php endif; ?>
            </div>
            <div class="volunteer-img" style="background-image: url(<?php the_field('volunteer_section_img') ?>)">
                <?php $volunteer_button = get_field('volunteer_button'); ?>
                <?php if ($volunteer_button) : ?>
                    <a class="btn-primary" href="<?php echo esc_url($volunteer_button) ?>">Volunteer</a>
                <?php endif; ?>
            </div>
        </section>
        <section>
            <?php
            $mission_group = get_field('mission');
            if ($mission_group) : ?>
                <div class="mission-panel">
                    <div class="mission-main container">
                        <div class="mission-content">
                            <h2>
                                <?php echo $mission_group['mission_title']; ?>
                            </h2>
                            <div>
                                <?php echo $mission_group['mission_text']; ?>
                            </div>
                        </div>
                        <div class="mission-adapt"><img src="<?php echo $mission_group['mission_image']; ?>" alt="" /></div>
                    </div>
                </div>
            <?php endif; ?>

        </section>
        <section class="news-section">
            <div class="vol-div">
                <h2>News</h2>
                <?php $news_section = get_field('news_section_text'); ?>
                <?php $news_image = get_field('news_section_text'); ?>
                <?php if ($news_section) : ?>
                    <div class="news-card">
                        <h3><?php echo get_field('news_section_title') ?></h3>
                        <p><?php echo $news_section ?></p>
                        <div class="offsite-link">
                            <?php
                            $link = get_field('link');
                            if ($link) : ?>
                                <a class="hollow-btn" href="<?php echo esc_url($link); ?>">visit site</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $news_section_2 = get_field('news_section_text_2'); ?>
                <div class="news-card">
                    <?php if ($news_section_2) : ?>
                        <h3><?php echo get_field('news_section_title_2') ?></h3>
                        <p><?php echo $news_section_2 ?></p>
                        <div class="offsite-link">
                            <?php
                            $link2 = get_field('link_2');
                            if ($link2) : ?>
                                <a class="hollow-btn" href="<?php echo esc_url($link2); ?>">visit site</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="news-img">
                <img src="<?php echo get_field('news_section_img'); ?>" alt="" />
            </div>


        </section>
        <section>
            <!-- <h2>Social Links</h2> -->
        </section>






    </main><!-- #main -->



</article><!-- #post-## -->