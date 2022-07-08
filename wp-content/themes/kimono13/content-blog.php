<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $kimono, $post;
$is_blog = $kimono['is_blog'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <h1 class="entry-title title-post"><?php the_title(); ?></h1>

        <div class="image-featured">
            <?php if(has_post_thumbnail()){the_post_thumbnail();}?>
        </div><!-- end image -->

        <div class="entry-content content-post">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->

    </header><!-- .entry-header -->
</article><!-- #post -->
