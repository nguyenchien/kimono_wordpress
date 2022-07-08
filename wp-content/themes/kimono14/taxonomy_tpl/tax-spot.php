<?php
/**
 * The template for displaying Category SPOT pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style( 'style-column', get_template_directory_uri() . '/css/column.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-column' );
get_header(); 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}
global $kimono;
$cate = $kimono['current_cate'];
$parent = $kimono['parent'];
$taxonomy = $kimono['taxonomy'];
$category_data = get_category_data($cate, $taxonomy);

?>
<div class="container clearfix">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>
	<div class="column-list-page clearfix hd-page-template hd-column-list content-column-page page-<?php echo $kimono['parent']->slug; ?>">
		<header>
			<div class="image">	
				<?php if(!empty($category_data['img_src'])):?>
				<img src="<?php echo $category_data['img_src'] ?>" alt="<?php echo $category_data['name']; ?>" />				
				<?php else:
				$img_src = get_cate_image_src('cate_img_src', $parent);
				?>
				<img src="<?php echo $img_src ?>" alt="<?php echo $category_data['name']; ?>" />				
				<?php endif;?>
			</div>
			<div class="group-title-desc">
				<h1 class="cate-name"><?php echo $category_data['cate_h1']?></h1>
			<div class="desc">
					<?php echo category_description(); ?>
				</div>
			</div>

		</header>
		<div class="wrap-con clearfix">

			<div class="content con-left">
				<section class="page-childs">
					<div class="list-item">
						<?php if (have_posts()) : ?>
							<?php
							/* Start the Loop */
							while (have_posts()) : the_post();
								?>
								<div class="h3-block page-item" data-date="<?php echo $post->post_date;?>">
									<h3 class="h3-title-bar">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> 
									</h3>
									<div class="imageleft">
										<?php if (has_post_thumbnail()): ?>
											<?php swe_the_post_thumbnail($post,'spot-thumb', array('alt' => strip_tags(get_the_title()))); ?>
										<?php endif; ?></div>
									<div class="excerpt"><?php the_excerpt(); ?></div>
									<p class="readmore"><a class="hd-btn page-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo Yii::t('wp_theme','続きを読む'); ?></a>
									</p>
								</div>
							<?php endwhile;
							?>	
						</div>
						<?php wp_pagenavi(); wp_reset_postdata();?>
					<?php else : ?>
						<?php get_template_part('content', 'none'); ?>
					<?php endif; ?>	
				</section>
				<?php addBannerInColumnPage();?>
			</div><!-- end con-left -->
			<div class="sidebar con-right">
				<?php get_sidebar('spot'); ?>
			</div><!-- end con-right -->
		</div>
	</div>
</div><!-- end container -->

<?php get_footer(); ?>