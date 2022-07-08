<?php
/**
 * Template Name: Yukata News
 * Links: /yukata/news 
 */
wp_register_style('news', get_template_directory_uri() . '/css/news.css', array('twentytwelve-style'));
wp_enqueue_style('news');
global $post, $language;
$language = Yii::app()->language;
get_header('new-kimono');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}
?><div class="container-box clearfix">
<?php
if (function_exists('yoast_breadcrumb')) {
	yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
}
?>
	<div class="wrap-highend-v2">
		<div class="wrap-content-v2">
			<div class="container-box">
				<div class="wrap-column-content flexbox">
					<div class="left-column-content">
						<div class="wrap-boths-column flexbox">
							<div class="left-column hidden-sidebar">
								<?php get_sidebar('top-page-left') ?>
							</div>
							<div class="right-column">
								<div class="container content-only clearfix">
                                    <section id="TopNews" class="columns wrap-new-kimono-news">
									<?php
									wp_reset_postdata();
									$paged = get_query_var('paged') ? get_query_var('paged') : 1;
									$limit = get_post_field('category_limit', get_the_ID());
									if(empty($limit) || !is_numeric($limit) || $limit <= 0)
									{
										$limit = 10;
									}
									$args=array(
										'post_status'			=> 'publish',
										'post_type'			  => 'news',
										'pagination'			 => true,
										'paged'					 => $paged,
										'posts_per_page'		 => $limit,
										'order'				  => 'DESC',
										'orderby'				=> 'date',
										'meta_key'				 => 'for_yukata',
										'meta_value'			 => true
									);
									$the_query  = new WP_Query($args);
									if(empty($the_query->max_num_pages))
									{
										wp_redirect(WP_HOME.'/yukata/news');
									}
									if($the_query -> have_posts()): ?>
										<div class="box-news-top yukata-new" style="padding-bottom: 10px;">
                                            <div class="title-general title-list text-center flexbox margin-bt20">
                                                <span class="icon-title-general icon-formal-news"></span>
                                                <h1 class="sub-title-list">News<var class="sub-title"><?php echo Yii::t('wp_theme', 'お知らせ'); ?></var></h1>
                                            </div>
											<?php if(Yii::app()->language ==='ja'): ?>
                                                <div class="news-box news-content">
                                                    <ul class="news-list">
														<?php while ($the_query -> have_posts()){
															$the_query -> the_post(); ?>
                                                            <li class="news-item">
                                                                <div class="news-image">
                                                                    <?php $thumbId = get_post_thumbnail_id($post->ID);
                                                                    if(empty($thumbId)) {
                                                                        $url=WP_HOME.'/images/news-noimage.jpg';
                                                                        echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
                                                                    } else {
                                                                        swe_the_post_thumbnail($post, $size = array(130,130), $attr = array(
                                                                            'class' => 'attachment-'.implode('x', $size) . ' '.$thumbId,
                                                                            'alt' => strip_tags(get_the_title()),
                                                                            'title' => strip_tags(get_the_title()),
                                                                        ));
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <p class="news-date"><?php the_date(); ?></p>
                                                                <h2 class="news-title"><?php the_title(); ?></h2>
                                                                <p class="news-content"><?php echo $post->post_content; ?></p>
                                                            </li>
														<?php		} ?>
													</ul>
												</div>
                                                <div class="news-box news-link-top"><a href="#TopNews">TOPに戻る</a></div>
                                                <div class="wrap-common-paging news-box news-paging">
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
                                    </section>
                                    <div class="intro-top-general intro-top-general-news pc">
                                        <h3 class="title-intro-top"><?php echo Yii::t('new-kimono-intro-news', 'キモノで観光 きものレンタル wargo プチのご紹介') ?></h3>
                                        <div class="content-intro-top">
                                            <p class="intro-text"><?php echo Yii::t('new-kimono-intro-news', '京都で最安値の「京都きものレンタル wargo」の着物レンタルプチプラン！着物、巾着、下駄、帯、 かんざしが全てセットでなんとたったの2,900円。当店の着付け師がしっかり着付けてくれるので、思いっきり着物を楽しめます。プチ店のみでの学割も新登場！着物はレギュラー店と同じく人気の着物を多数ご用意しております！プチ祇園四条店、プチ京都駅前店どちらも人気観光地へのアクセスは抜群！お手軽に京都を着物で楽しみましょう♪') ?></p>
                                        </div>
                                    </div>
								</div><!-- end container.kimono-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->

<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>