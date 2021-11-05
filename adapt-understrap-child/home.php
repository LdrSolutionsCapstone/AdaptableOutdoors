<?php

/***
 *
The template for displaying all blog posts.
 *
 * @package design+code demo
 * @since 1.0.0
 */
//display header
get_header();
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php if (have_posts()) : ?>
        <!-- start the loop | the loop grabs all the content and cycles through all of the content until it’s done. -->
        <?php while (have_posts()) : the_post(); ?>
            <!-- display the all of the blog posts -->
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php the_excerpt(); ?>
        <?php endwhile; ?>
        <!-- end while loop -->
    <?php else : ?>
        <!-- send to search page / some other general page with search function, tags, categories, archives,etc.. -->
        <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
    <!-- //On this page speciﬁcally - this would be area to add pagination and a sidebar - out of the loop. -->
</article>
<!-- //display footer -->
<?php get_footer(); ?>