<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

wp_register_style( 'style-blog', get_template_directory_uri() . '/css/blog.css', array('style-takuhai'));
wp_enqueue_style( 'style-blog' );
wp_register_style( 'font-icon', WP_HOME.'/css/takuhai-font-icon.css', array('style-takuhai'));
wp_enqueue_style( 'font-icon' );

get_header();
global $post;
$taxonomy = get_query_var('taxonomy');
$term = term_exists(get_query_var('term'), $taxonomy);
$cat = $term['term_id'];
$cat_item = get_term($cat, $taxonomy);
?>

	<div class="container clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
		?>
		<div class="cate-blog-main detail-page">
			<?php //getShopBlogInfo($cat_item); ?>
		</div><!-- end cate-blog-main -->

		<section id="primary" class="site-content site-content-blog d-two-thirds d-column left ">
			<div id="content" role="main" class="tn-blog-cat">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post();
						$taxonomies = get_post_taxonomies($post);
						$taxonomy = $taxonomies[0];
						$cate = getShopBlog($post,$taxonomy);
						$category_data = get_category_data($cate) ;
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<h2 class="entry-title tn-blog-title">
									<?php if (isNewBlog($post)): ?>
										<span>New</span>
									<?php endif; ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h2>
							</header><!-- .entry-header -->


							<div class="entry-summary tn-blog-content-sort clearfix">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('thumbnail', $attr = array('alt' => strip_tags(get_the_title()),)); ?>
								</a>
								<p class="first-title">
									<?php echo get_the_date(); ?>
								</p>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark">> <?php _e('続きを読む', 'twentytwelve'); ?></a>
								<div class="clearAll"></div>
							</div><!-- .entry-summary -->


						</article><!-- #post -->
						<?php
					endwhile;

					twentytwelve_content_nav('nav-below');
					?>

				<?php else : ?>
					<?php get_template_part('content', 'none'); ?>
				<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		<section id="sidebar-blog" class="d-one-third d-column flright">
			<?php get_sidebar('blog'); ?>
		</section>
	</div>
<?php get_footer(); ?>