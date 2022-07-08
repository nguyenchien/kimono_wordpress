<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post;
?>

<div id="post-<?php the_ID();?>" class="g-item four columns" <?php post_class(); ?>>
    <div class="image">
        <?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
        <?php swe_the_post_thumbnail($post,'thumbnail'); ?>
    </div><!-- end image -->

    <div class="text">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <p class="title"><?php the_title(); ?></p>
            <p class="date"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></p>
        </a>
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- end text -->
</div><!-- end gallery-item -->
