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
			<?php if ( is_single() ) : ?>
				<h1 class="entry-title title-post"><?php the_title(); ?></h1>
                                
                                <div class="image-featured">
                                    <?php if(has_post_thumbnail()){swe_the_post_thumbnail($post);}?>
                                </div><!-- end image -->
                                
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
			<?php else : ?>
			<h3 class="entry-title tn-blog-title">
                <span>New</span>
				<?php if($is_blog): the_title(); ?>
				<?php else:?>
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php endif;?>
			</h3>
			<?php endif; // is_single() ?>

		</header><!-- .entry-header -->

		<?php //if ( is_search() || $is_blog ) : // Only display Excerpts for Search ?>
		<!--<div class="entry-summary tn-blog-content-sort clearfix">
            <?php //the_post_thumbnail('thumbnail', array('class' => 'alignleft', 'width' => '160', 'height'=> 160 )); ?>
            <p><span class="bg_first_date-01">金閣寺店</span><?php //echo get_the_date(); ?></p>
			<?php //the_excerpt(); ?>
			<a href="<?php //the_permalink(); ?>" rel="bookmark">> <?php //_e('続きを読む','twentytwelve' ); ?></a>
            <div class="clearAll"></div>
		</div><!-- .entry-summary -->
		<?php //endif; ?>
                
	</article><!-- #post -->
