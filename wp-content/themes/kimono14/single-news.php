<?php
/**
 * The Template for displaying SPOT category single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
//wp_register_style( 'style-column', get_template_directory_uri() . '/css/column.css', array('twentytwelve-style'));
//wp_enqueue_style( 'style-column' );
wp_register_style( 'style-news', get_template_directory_uri() . '/css/news.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-news' );
?>
<div class="container container-column-page clearfix">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>
	<div class="content-column-page content-course-page hd-page-template hd-column">
		<div class="box-news-top" style="padding-bottom: 10px;">
			<div class="block-title-top-page-title bg-top-page-title news">
				<h2><span class="en">News</span><span class="ja">
					<?php if(Yii::app()->language ==='ja'): ?>
					<?php echo Yii::t('wp_theme', 'お知らせ'); ?></span>
					<?php endif; ?>
					<span class="title"><?php the_title() ?></span>
				</h2>
			</div>
		</div>
		<?php if(Yii::app()->language ==='ja'): ?>
		<div class="news">
			<ul>
				<li>
					<div class="news-item">
							<div class="image"><?php 
							
							$thumbId = get_post_thumbnail_id($post->ID);
							if(empty($thumbId)) 
							{
								$url=WP_HOME.'/images/news-noimage.jpg';
								echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" alt="'.strip_tags(get_the_title()).'" />';
							}
							else
							{
								swe_the_post_thumbnail($post, $size = array(130,130), $icon = 1, $attr = array(
									'class' => 'attachment-'.implode('x', $size) . ' '.$thumbId,
//									'alt' => trim(strip_tags(get_post_meta($thumbId, '_wp_attachment_image_alt', true))),
									'alt' => strip_tags(get_the_title()),
								));
							}							
							
							?></div>
						<div class="news-box-content">
							<p>
								<span class="date"><?php the_date() ?></span>
							</p>
							<h2><?php the_title() ?></h2>
							<p><?php the_content(); ?></p>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<?php endif; ?>
	</div><!-- end content-column-page -->

</div><!-- end container -->

<?php get_footer(); ?>