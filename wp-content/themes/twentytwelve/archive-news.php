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
wp_register_style('news', get_template_directory_uri() . '/css/news.css', array('twentytwelve-style'), '202004061150');
wp_enqueue_style('news');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
$plugin = 'wp-pagenavi/wp-pagenavi.php';
if(is_plugin_active($plugin)){
	$css_file = plugins_url( 'pagenavi-css.css', $plugin );
	wp_enqueue_style( 'wp-pagenavi', $css_file, false, '2.70' );
}

global $post, $language;
$language = Yii::app()->language;
$langNoNews = array('ms', 'hi');
$lang = Yii::app()->language;
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
?>
<div class="container-box clearfix">
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
								<?php get_sidebar('top-page-left-v3') ?>
							</div>
							<div class="right-column">
								<div class="container">
									<section id="TopNews" class="columns wrap-new-kimono-news">
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
											'post_status'			=> 'publish',
											'post_type'			  => 'news',
											'pagination'			 => true,
											'paged'					 => $paged,
											'posts_per_page'		 => $limit,
											'order'				  => 'DESC',
											'orderby'				=> 'date',
										);
										$the_query  = new WP_Query($args);
										if(empty($the_query->max_num_pages))
										{
											wp_redirect(network_site_url( 'news'));
										}
										if ( $the_query->have_posts() ) { ?>
                                            <div class="title-general title-list text-center flexbox margin-bt20">
                                                <span class="icon-title-general icon-formal-news"></span>
                                                <h1 class="sub-title-list"><?php echo Yii::t('kimono-news', 'ニュース/お知らせ一覧｜きものレンタルwargo'); ?></h1>
                                            </div>
											<?php if(!in_array($lang, $langNoNews)): ?>
												<div class="news-box news-content">
                                                    <p class="news-list-description"><?php echo Yii::t('kimono-news', 'きものレンタルwargoの各種お知らせ・お得なキャンペーン情報をご紹介いたします。その他、和装が映える旬な行事やお祭りも特集！観光やイベントの参加に着物、浴衣のレンタルを是非ご 活用ください。'); ?></p>
													<ul class="news-list">
														<?php while ($the_query->have_posts()) {
														    $the_query->the_post(); ?>
															<li class="news-item">
                                                                <div class="news-image">
                                                                    <a href="<?php the_permalink(); ?>">
                                                                    <?php $thumbId = get_post_thumbnail_id($post->ID);
                                                                    if(empty($thumbId)) {
                                                                        $url=WP_HOME.'/images/news-noimage.jpg';
                                                                        echo '<img data-src="'.$url.'" width="180" height="180" class="attachment-block-top-blog wp-post-image" title="'.strip_tags(get_the_title()).'" alt="'.strip_tags(get_the_title()).'" />';
                                                                    } else {
                                                                        swe_the_post_thumbnail($post, $size = array(180,180), $attr = array(
                                                                            'class' => 'attachment-'.implode('x', $size) . ' '.$thumbId,
                                                                            'alt' => strip_tags(get_the_title()),
                                                                            'title' => strip_tags(get_the_title()),
                                                                        ));
                                                                    }
                                                                    ?>
                                                                    </a>
                                                                </div>
                                                                <h2 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                                <p class="news-date"><?php the_date('m.d.Y'); ?></p>
															</li>
														<?php } // end of the loop. ?>
													</ul>
												</div>
                                                <div class="news-box news-link-top"><a href="<?= home_url(); ?>">TOPに戻る</a></div>
												<div class="wrap-common-paging news-box news-paging">
													<?php wp_pagenavi(array('query' => $the_query)); ?>
												</div>
											<?php else: ?>
												<div class="news-message">
													<p><?php echo Yii::t('wp_theme', '<p>This is somewhat embarrassing, isn’t it?</p><p>It seems we can’t find what you’re looking for.</p>') ?></p>
													<p><?php echo Yii::t('wp_theme', 'Sorry, this entry is only available in') ; ?> <a href="<?php echo network_site_url('news'); ?>"><?php echo Yii::t('wp_theme','日本語'); ?>.</a></p>
													<?php //get_template_part(404); ?>
												</div>
											<?php endif; ?>

											<?php
										}
										/* end category news */
										?>
									</section>
                                    <div class="intro-top-general intro-top-general-news pc">
                                        <h3 class="title-intro-top"><?php echo Yii::t('kimono-news', 'キモノで観光 きものレンタル wargo のご紹介') ?></h3>
                                        <div class="content-intro-top">
                                            <p class="intro-text"><?php echo Yii::t('kimono-news', '着物、浴衣のレンタルが安いきものレンタルwargoは、東京・京都・大阪をはじめとする着物、浴衣の和服姿が似合う全国の人気観光地に２０店舗展開しております。観光のお客様はもとより地元の祭事、冠婚葬祭にフォーマル着物をご希望のお客様にも多数ご愛用いただいている、全国最大級!!の着物・浴衣のレンタル店です。') ?></p>
                                        </div>
                                    </div>
								</div>
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
