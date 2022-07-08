<?php
/**
 * Template Name: Column List Page 
 * Links: /course, /restaurant
 */
wp_register_style( 'style-column', get_template_directory_uri() . '/css/column.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-column' );
get_header();
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false );
}
global $post;
$current_page_id = $post->ID;
$checkpage = checkColumnPage();	
$parent = $checkpage['parent'];

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
//var_dump(get_query_var('paged'));
?>
<div class="container clearfix">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>
	<div class="column-list-page clearfix hd-page-template hd-column-list content-column-page page-<?php echo $checkpage['slug'];?>">
		<header>
			<div class="image">
				<?php swe_the_post_thumbnail($post, 'full',array('alt' => strip_tags(get_the_title()))); ?>
			</div>
			<div class="group-title-desc">
				<h1><?php the_title(); ?></h1>
			<div class="desc">
				<?php the_excerpt(); ?>
			</div>
			</div>
		</header>
		<div class="wrap-con clearfix">
			<div class="content con-left">
				<?php if ($paged == 1): ?>
					<section class="page-content">
						<?php the_content(); ?>
					</section>
				<?php endif; ?>
				<section class="page-childs">
					<div class="list-item">
						<?php
						// Restore original Post Data
						wp_reset_postdata();
						// WP_Query arguments	
						$args = array(
							
							'post_type' => 'page',
							'post_status' => 'publish',
							'pagination' => true,
							'paged' => $paged,
							'posts_per_page' => get_option('posts_per_page'),
							'order' => 'DESC',
							'orderby' => 'date',
						);
						if(is_page('restaurant')){
							$arr = array($parent);
							$pages = getChildPages($current_page_id);
							if(count($pages) > 0 ){
								foreach($pages as $p){
									$arr[] = $p->ID;
								}								
							}
							$args['post_parent__in']= $arr;
							$args['post__not_in'] = $arr;
						}else{
							$args['post_parent'] = $parent;
						}
						
						// The Query
						$my_query = new WP_Query($args);

						// The Loop	
						if ($my_query->have_posts()) {
							while ($my_query->have_posts()) {
								$my_query->the_post();
								
								?>
						<div class="h3-block page-item">
							<h3 class="h3-title-bar">
								<a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a> 
							</h3>
							<div class="imageleft">
								<?php if (get_post_thumbnail_id()): ?>
									<?php echo get_the_post_thumbnail(get_the_ID(), 'spot-thumb', array('alt' => strip_tags(get_the_title()))) ?>
								<?php endif; ?></div>
							<p class="excerpt"><?php echo get_the_excerpt(); ?></p>
							<p class="readmore"><a class="hd-btn page-link" href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo Yii::t('wp_theme','続きを読む'); ?></a>
							</p>
						</div>
								<?php }
							?>
						</div>

						<?php wp_pagenavi(array('query' => $my_query)); ?>
						<?php
					} else {
						get_template_part( 'content', 'none' );
					}

					// Restore original Post Data
					wp_reset_postdata();
					?>


				</section>
				<?php addBannerInColumnPage();?>
			</div><!-- end con-left -->
			<div class="sidebar con-right">
                            <?php get_sidebar('column'); ?>
                            
			</div><!-- end con-right -->

		</div>
		
	</div>
</div><!-- end container -->

<?php get_footer(); ?>
