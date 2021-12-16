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
        <?php
        // $events = tribe_get_events(['posts_per_page' => 5]);

        // Loop through the events, displaying the title and content for each
        // foreach ($events as $event) {
        //     echo '<h4>' . $event->post_title . '</h4>';
        //     echo wpautop($event->post_content);
        // }
        // 
        ?>

        <section class="">
            <h2 class="mb-5">Join The Community</h2>
            <div class="d-flex flex-wrap justify-content-between">

                <!-- arguments for events -->
                <?php
                $events = tribe_get_events([
                    'posts_per_page' => 3,
                    'order' => 'DESC'
                ]);
                ?>

                <!-- CARD LAYOUT HERE -->
                <!-- EVENT CARD -->
                <?php foreach ($events as $event) { ?>
                    <div class="community-child-home">

                        <div class="card-img-home"><?php echo get_the_post_thumbnail($event->ID, 'large'); ?></div>
                        <?php echo "<h3 class='card-event-title'>" . $event->post_title . "</h3>" ?>
                        <a class="btn-primary" href="https://adapt.web.dmitcapstone.ca/adapt/participate/">Sign up</a>


                    </div>
                <?php } ?>
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
        <section class="social-links-section">
            <h2>Social Links</h2>
            <ul class="social-container">
                <?php
                $social_area = get_field('social_group');
                $you_tube_area = $social_area['you_tube'];
                $facebook_area = $social_area['facebook'];
                $instagram_area = $social_area['instagram'];
                // if($social_area):
                ?>
                <li>
                    <a href="<?php echo $you_tube_area['link'] ?>">
                        <img src="<?php echo $you_tube_area['img']  ?>" alt="">
                    </a>
                </li>
                <li>
                    <a href="<?php echo $facebook_area['link'] ?>">
                        <img src="<?php echo $facebook_area['img']  ?>" alt="">
                    </a>
                </li>
                <li>
                    <a href="<?php echo $instagram_area['link'] ?>">
                        <img src="<?php echo $instagram_area['img']  ?>" alt="">
                    </a>
                </li>
            </ul>
        </section>






    </main><!-- #main -->



</article><!-- #post-## -->