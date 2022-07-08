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
$category_data = get_category_data(get_the_category($post));
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">			
			<h2 class="entry-title tn-blog-title">
                <?php if(isNewBlog($post)): ?>
					<span>New</span>
				<?php endif; ?>
				<?php if($is_blog): ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php else: ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php endif;?>
			</h2>
		</header><!-- .entry-header -->

		<?php if ( is_search() || $is_blog ) : // Only display Excerpts for Search ?>
		<div class="entry-summary tn-blog-content-sort clearfix">
            <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
            </a>
            <p class="first-title">
                <span class="shop-name <?php echo $category_data['class'];?>"><?php echo $category_data['shop'];?></span>
                <?php echo get_the_date(); ?>
			</p>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark">> <?php _e('続きを読む','twentytwelve' ); ?></a>
            <div class="clearAll"></div>
		</div><!-- .entry-summary -->
		<?php endif; ?>
                
	</article><!-- #post -->