<?php
/**
 * The template for displaying Search staff blog pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('new-formal-blog-script', get_template_directory_uri() . '/js/new-formal-blog.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-blog-style', get_template_directory_uri() . '/css/new-formal-blog.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-blog-style');
get_header('new-kimono');
global $post, $blog_links;
$tax = get_query_var('taxonomy');
$shop = get_query_var($tax);
$uri = $_SERVER['REQUEST_URI'];
$blog_link = '';
foreach($blog_links as $v){
 if(strpos($uri, $v) !== false){
     $blog_link = $v;
     break;
 }
}
?>
<style>
    @media (min-width: 750px){
        .paging-style{
            margin-top: 20px;
        }
    }
</style>
	<div class="container-box clearfix">
		<div class="wrap-highend-v2">
			<div class="wrap-content-v2">
				<div class="container-box">
					<div class="wrap-column-content flexbox">
						<div class="left-column-content">
							<div class="wrap-boths-column flexbox">
								<div class="right-column">
									<div class="section-new-formal wrap-formal-blog">
										<?php
                                        $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                                        $checkPaging = strpos($url,'/page/');
                                        if($checkPaging === false){
                                            if (function_exists('yoast_breadcrumb')) {
                                                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                                            }
                                        }

										?>
										<div class="wrap-banner-formal blog-banner <?= $checkPaging !== false ? 'paging-style' : ''?>">
											<div class="row">
												<img class="pc" src="<?php echo WP_HOMES; ?>/images/formal-rental/blog-banner-pc.jpg" alt="">
												<img class="sp" src="<?php echo WP_HOMES; ?>/images/formal-rental/blog-banner-sp.jpg" alt="">
											</div>
										</div>
										<div class="wrap-title-tabs">
											<ul class="tab-link">
												<li class="tab-item active"><a href="#news-article">新着</a></li>
												<li class="tab-item"><a href="#ranking-article">人気の記事</a></li>
											</ul>
											<div class="menu-toggle"><span id="toggle-sidebar" class="icon icon-formal-menu-toggle-open"></span> </div>
										</div>
										<div class="wrap-formal-content flexbox">
											<div class="wrap-blog-left-content">
												<div class="wrap-list-col-cate active" id="news-article">
                                                    <header class="page-header">
                                                        <h1 class="page-title"><?php echo Yii::t('wp_theme.blog',$shop).'_'.Yii::t('wp_theme.blog',$blog_link);?></h1>
                                                    </header>
													<?php if (have_posts()) : ?>
                                                        <ul class="list-col-cate list-col-cate-blog list-col-cate-column flexbox active">
															<?php while (have_posts()) : the_post();
																get_template_part( 'content', 'blog' );
															endwhile;
															wp_reset_postdata();
															?>
														</ul>
														<?php wp_pagenavi(array('options' => array(
															'prev_text' => '<span class="paging-nav prev"></span>',
															'next_text' => '<span class="paging-nav next"></span>'))); ?>
													<?php else : ?>
														<?php echo Yii::t('wp_theme', 'No posts found.'); ?>
													<?php endif; ?>
												</div>
												<div class="wrap-list-col-cate" id="ranking-article">
													<?php get_template_part('include/blog_ranking');?>
												</div>
                                                <?php get_sidebar('blog-bottom'); ?>
                                                <?php if(!empty($blog_link)):?>
                                                <div class="about-blog">
                                                    <p class="about-blog-title"><?php echo Yii::t('wp_theme.blog',$shop).'_'.Yii::t('wp_theme.blog',$blog_link);?></p>
                                                    <p><?php echo Yii::t('wp_theme.blog',$shop.'_'.$blog_link.'_desc')?></p>
                                                </div>
                                                <?php endif; ?>
											</div>
											<div class="wrap-sidebar-overlay">
												<div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
													<?php get_sidebar('blog'); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer('formal'); ?>