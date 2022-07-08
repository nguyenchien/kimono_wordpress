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
wp_register_style('media-post', get_template_directory_uri() . '/css/media-post.css', array('twentytwelve-style'));
wp_enqueue_style('media-post');
redirect_canonical( null, esc_url(home_url('news')) );
get_header();
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}

global $post;
?>
<div class="container">
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>
    <section class="columns row">
		<div class="wrap-media">
	<?php 
		/* get category news */
		wp_reset_postdata();
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		// Get current queried object
		//$queried_obj = get_queried_object();
		// Get current queried object's taxonomies
		//$taxonomies = $queried_obj->taxonomies;
		//$taxonomies = !empty($taxonomies) ? $taxonomies : $queried_obj->taxonomy;
		// Check if taxonomy
		if (!empty($taxonomies)) {
			$limit = getTaxonomyField($taxonomies, 'category_limit');
		}else{
			$limit = 10;
		}
		if(empty($limit) || !is_numeric($limit) || $limit <= 0)
		{
			$limit = 10;
		}
		$args=array(
			'post_status'            => 'publish',
			'post_type'              => 'media',
			'pagination'		     => true,
			'paged'					 => $paged,
			'posts_per_page'         => $limit,
			'order'                  => 'DESC',
			'orderby'                => 'date',
		);
		$the_query  = new WP_Query($args);
		if(empty($the_query->max_num_pages))
		{
			wp_redirect(network_site_url( 'media'));
		}
		if ( $the_query->have_posts() ) { ?>

		<h2 class="title"><span class="en">Media</span><span class="ja">
			<?php if(Yii::app()->language ==='ja'): ?>
			<?php echo Yii::t('wp_theme', '雑誌・テレビ掲載情報'); ?></span>
			<?php endif; ?>
		</h2>
		
		<?php if(Yii::app()->language ==='ja'): ?>
		<div class="media-list">
			<ul>
				<?php while ($the_query->have_posts()) {
								$the_query->the_post();
								?>
				<li>
					<h3><?php the_title(); ?><span class="date"><?php the_date() ?></span></h3>
					<div class="info clearfix">
						<div class="left">
							<div class="image-feat">
								<?php
								$thumbId = get_post_thumbnail_id($post->ID);
								if(empty($thumbId))
								{
									$url=WP_HOME.'/images/no-image.png';
									echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
								}
								else
								{
									$html = swe_wp_get_attachment_image($thumbId, $size = array(186,263), $icon = 1, $attr = array(
										'class' => 'attachment-'.implode('x', $size) . ' '.$thumbId,
//									'alt' => trim(strip_tags(get_post_meta($thumbId, '_wp_attachment_image_alt', true))),
										'alt' => strip_tags(get_the_title()),
										'title' => strip_tags(get_the_title()),
									));
									if(empty($html))
									{
										$url=WP_HOME.'/images/no-image.png';
										echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
									}
									else{
										echo $html;
									}
								}
								?>
							</div>
							<p><?php echo $post->post_content; ?></p>
						</div>
						<div class="right">
							<div class="image-content">
							<?php
								$secondary_image = get_post_field('secondary_image', $post->ID);
								if (!empty($secondary_image)) {
									echo swe_wp_get_attachment_image($secondary_image, $size = array(370,263), $icon = 1, $attr = array(
										//	'src' => $src,
										'class' => 'attachment-'.implode('x', $size) . ' '.$secondary_image,
										'id' => '1_1_main',
										'alt' => strip_tags(get_the_title()),
										'title' => strip_tags(get_the_title()),
									));
								}else{
									$url=WP_HOME.'/images/no-image.png';
									echo '<img data-src="'.$url.'" width="121" height="114" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
								}
							?>
							</div>
						</div>
					</div>
				</li>
				<?php } // end of the loop. ?>
			</ul>
		</div>
		<div class="media-paging">
			<?php wp_pagenavi(array('query' => $the_query)); ?>
		</div>
		<?php else: ?>
		<div class="media-message">
			<p><?php echo Yii::t('wp_theme', '<p>This is somewhat embarrassing, isn’t it?</p><p>It seems we can’t find what you’re looking for.</p>') ?></p>
			<p><?php echo Yii::t('wp_theme', 'Sorry, this entry is only available in') ; ?> <a href="<?php echo network_site_url('media'); ?>"><?php echo Yii::t('wp_theme','日本語'); ?>.</a></p>
		  <?php //get_template_part(404); ?>
		</div>
		<?php endif; ?>

	<?php
	}
	/* end category media */
?>
		</div>
    </section>

</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>