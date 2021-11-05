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

    <header class="entry-header">



    </header><!-- .entry-header -->

    <div class="entry-content">
        <h2>Im the static entry content html from content-home.php</h2>
        <header class="header-front">
            <h1><?php
                the_content();;
                ?></h1>
            <button class="main-button">Participate</button>
        </header>

        <section class="pt-5">
            <h2 class="mb-5">Join The Community</h2>
            <div class="d-flex">
                <div class="community-child">
                    <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                    <!-- <img src="http://localhost/adapt-local/wp-content/uploads/2021/10/P1240042-2-1.jpg" alt="">
                    <h3 class="mt-3">Hiking frank slide</h3> -->
                    <button class="main-button mt-3">Participate</button>
                </div>
                <div class="community-child">
                    <img src="http://localhost/adapt-local/wp-content/uploads/2021/10/P1220286-2.jpg" alt="">
                    <h3 class="mt-3">Hike 2</h3>
                    <button class="main-button mt-3">Participate</button>
                </div>
                <div class="community-child">
                    <img src="http://localhost/adapt-local/wp-content/uploads/2021/10/P1230221-1.jpg" alt="">
                    <h3 class="mt-3">Hike 3</h3>
                    <button class="main-button mt-3">Participate</button>
                </div>
            </div>

        </section>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php understrap_edit_post_link(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->















<main class="site-main" id="main">






</main><!-- #main -->