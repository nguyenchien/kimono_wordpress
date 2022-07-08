<?php
/**
 * Template Name: Column List Page (/spot, /column, /course)
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
global $post, $column_slugs;
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
	<div class="column-list-page clearfix hd-page-template hd-column-list content-column-page">
		<header>
			<h1><?php the_title(); ?></h1>

			<div class="image">		
				<?php
				if($checkpage['slug'] == SPOT){
					echo get_the_post_thumbnail(get_page_by_path(SPOT)->ID, 'full');
				}else{
					if (has_post_thumbnail()) {
						the_post_thumbnail('full');
					}	
				}
				
				?>
			</div>
			<div class="desc">
				<?php the_excerpt(); ?>
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
						if(is_page('spot') || is_page('restaurant')){
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
									<?php echo get_the_post_thumbnail(get_the_ID(), 'spot-thumb') ?>
								<?php endif; ?></div>
							<p class="excerpt"><?php echo get_the_excerpt(); ?></p>
							<p class="readmore"><a class="hd-btn page-link" href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php _e('続きを読む', 'twentytwelve'); ?></a>
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
			</div><!-- end con-left -->
			<div class="sidebar con-right">
                            <?php get_sidebar('column'); ?>
                            
			</div><!-- end con-right -->

		</div>
		
	</div>
</div><!-- end container -->

<?php get_footer(); ?>