<?php
/**
 * The Template for displaying SPOT category single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $language, $post;
$language = Yii::app()->language;
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
//wp_register_style( 'style-column', get_template_directory_uri() . '/css/column.css', array('twentytwelve-style'));
//wp_enqueue_style( 'style-column' );
wp_register_style( 'style-news', get_template_directory_uri() . '/css/news.css', array('twentytwelve-style'), '202004061150');
wp_enqueue_style( 'style-news' );
$langNoNews = array('ms', 'hi');
$lang = Yii::app()->language;
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
								<div class="left-column hidden-sidebar"><?php get_sidebar('top-page-left-v3') ?></div>
								<div class="right-column">
									<div class="container container-column-page clearfix">
										<div class="content-column-page content-course-page hd-page-template hd-column wrap-new-kimono-news">
											<?php if(!in_array($lang, $langNoNews)): ?>
                                                <div class="wrap-single-news-intro">
                                                    <?php
                                                        $image = has_post_thumbnail($post->ID) ? get_the_post_thumbnail($post->ID, 'full', array('alt' => get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                                                    ?>
                                                    <div class="single-news-image">
                                                        <?php echo $image; ?>
                                                        <div class="overlay-img"></div>
                                                    </div>
                                                    <div class="single-news-intro">
                                                        <h1 class="single-news-title"><?php the_title() ?></h1>
                                                        <div class="single-news-date">NEWS | <?php the_date('m.d.Y'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="wrap-single-news-content">
                                                    <?php the_content(); ?>
                                                </div>
                                                <div class="box-content-fixed-news">
                                                    <h2 class="title-box"><?php echo Yii::t('kimono-news', 'きものレンタルwargoのご紹介'); ?></h2>
                                                    <p class="content-box"><?php echo Yii::t('kimono-news', 'きものレンタルwargoは、京都・大阪・東京・金沢に全国19店舗を展開する、日本最 大級の着物レンタルサービスです。着物の総在庫数は9,120着(2018年3月1日現在)、お客様に着物のレンタルを楽しんで頂けるよう、作家物、ブランド品、アンティーク など、豊富な種類のお着物をご用意しております。店舗でお着付けする着物レンタル の他、宅配での着物レンタルも取り扱っております。'); ?></p>
                                                </div>
                                                <div class="back-to-news">
                                                    <a href="<?= home_url(); ?>/news"><?php echo Yii::t('kimono-news', 'NEWS一覧へ戻る 〉'); ?></a>
                                                </div>
											<?php endif; ?>
										</div><!-- end content-column-page -->
									</div><!-- end container -->
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