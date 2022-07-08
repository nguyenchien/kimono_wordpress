<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
status_header(404);
nocache_headers();
global $language;
$language = Yii::app()->language;
get_header('new-kimono'); ?>
<?php
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/error-404.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
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
									<?php get_sidebar('top-page-left') ?>
								</div>
								<div class="right-column">
									<div class="container clearfix">
										<div id="primary" class="site-content">
											<div id="content" role="main">
                                                <div class="wrap-error-404">
                                                    <div class="wrap-title-error">
                                                        <h1 class="lg-tile-error">404 File not found.</h1>
                                                        <div class="sm-title-error">申し訳ございません。お探しのページは見つかりませんでした</div>
                                                    </div>
                                                    <ul class="wrap-list-error">
                                                        <li class="wrap-item-error">
                                                            <div class="text-des-error"><span class="icon-dot-error">■</span>観光お着物をお探しのお客様はこちら</div>
                                                            <a href="https://kyotokimono-rental.com/kimono"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-error.png" alt="かんざし・ヘアセットも付いて"></a>
                                                        </li>
                                                        <li class="wrap-item-error">
                                                            <div class="text-des-error"><span class="icon-dot-error">■</span>冠婚葬祭用のお着物をお探しのお客様はこちら</div>
                                                            <a href="https://kyotokimono-rental.com/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png" alt="フォーマル・冠婚葬祭用 着物レンタルプラン"></a>
                                                        </li>
                                                        <li class="wrap-item-error">
                                                            <div class="text-des-error"><span class="icon-dot-error">■</span>宅配レンタルでお着物をお探しのお客様はこちら</div>
                                                            <a href="https://kyotokimono-rental.com/takuhai"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-ship-error.png" alt="かんざし・ヘアセットも付いて"></a>
                                                        </li>
                                                    </ul>
                                                </div>
											</div><!-- #content -->
										</div><!-- #primary -->
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