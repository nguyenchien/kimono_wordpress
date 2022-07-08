<?php
/**
 * Template Name: Yukata News
 * Links: /yukata/news 
 */
wp_register_style('news', get_template_directory_uri() . '/css/news.css', array('twentytwelve-style'));
wp_enqueue_style('news');
global $post;
get_header(); 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}
?>
<div class="container">
	<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
	?>
</div>
<div class="container content-only clearfix">
	<?php
		wp_reset_postdata();
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;	
		$limit = get_post_field('category_limit', get_the_ID());
		if(empty($limit) || !is_numeric($limit) || $limit <= 0)
		{
			$limit = 10;
		}
		$args=array(
			'post_status'            => 'publish',
			'post_type'              => 'news',
			'pagination'		     => true,
			'paged'					 => $paged,
			'posts_per_page'         => $limit,
			'order'                  => 'DESC',
			'orderby'                => 'date',
			'meta_key'				 => 'for_yukata',
			'meta_value'             => true
		);
		$the_query  = new WP_Query($args);
		if(empty($the_query->max_num_pages))
		{
			wp_redirect(WP_HOME.'/yukata/news');
		}
		if($the_query -> have_posts()): ?>
			<div class="box-news-top yukata-new" style="padding-bottom: 10px;">
					<div class="block-title-top-page-title bg-top-page-title news">
					<h2><span clas="en">News</span><span class="ja"><?php echo Yii::t('wp_theme', 'お知らせ'); ?></span></h2>
					</div>
				<?php if(Yii::app()->language ==='ja'): ?>
					<div class="topp-box-news news">
					<ul>
					<?php while ($the_query -> have_posts()){
							$the_query -> the_post(); ?>
							<li class="clearfix">
								<div class="news-item">
									<div class="image"><?php 
									$thumbId = get_post_thumbnail_id($post->ID);
									if(empty($thumbId)) 
									{
										$url=WP_HOME.'/images/news-noimage.jpg';
										echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
									}
									else
									{
										$html = swe_wp_get_attachment_image($thumbId, $size = array(130,130), $icon = 1, $attr = array(
											'class' => 'attachment-'.implode('x', $size) . ' '.$thumbId,
//											'alt' => trim(strip_tags(get_post_meta($thumbId, '_wp_attachment_image_alt', true))),
											'alt' => strip_tags(get_the_title()),
											'title' => strip_tags(get_the_title()),
										));
										if(empty($html))
										{
											$url=WP_HOME.'/images/news-noimage.jpg';
											echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
										}
										else{
											echo $html;
										}
									}							

									?></div>
									<div class="news-box-content">
										<p>
											<span class="date"><?php the_date() ?></span>
										</p>
										<h2><?php the_title(); ?></h2>
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
							</li>
			<?php		} ?>
			</ul>
					  </div>
				<div class="news-paging">
					<?php wp_pagenavi(array('query' => $the_query)); ?>
				</div>
				<?php else: ?>
				<div class="news-message">
					<p><?php echo Yii::t('wp_theme', '<p>This is somewhat embarrassing, isn’t it?</p><p>It seems we can’t find what you’re looking for.</p>') ?></p>
					<p><?php echo Yii::t('wp_theme', 'Sorry, this entry is only available in') ; ?> <a href="<?php echo WP_HOME.'/yukata/news' ?>"><?php echo Yii::t('wp_theme','日本語'); ?>.</a></p>
				  <?php //get_template_part(404); ?>
				</div>
				<?php endif; ?>
			</div>
		<?php endif;
	?>
</div><!-- end container.kimono-group -->
<?php get_footer(); ?>