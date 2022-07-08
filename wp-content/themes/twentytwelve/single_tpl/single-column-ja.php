<?php
/**
 * The Template for displaying SPOT category single posts
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
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if ($isSmartPhone) {
    wp_register_style('new-column-sp-v2-style', get_template_directory_uri() . '/css/new-column-sp-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-column-sp-v2-style');
} else {
    wp_register_style('new-column-pc-v2-style', get_template_directory_uri() . '/css/new-column-pc-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-column-pc-v2-style');
}
get_header('formal');
global $post, $custom_taxonomies, $kimono;

$current_cate = $kimono['current_cate'];
$taxonomy = $kimono['taxonomy'];
$parent = $kimono['parent'];
$parent_data = get_category_data($parent);
$post_categories = $post->post_category;
$post_categories_slug = array();
if (!empty($post_categories)) {
    foreach ($post_categories as $post_category) {
        $post_category_obj = get_category($post_category);
        if (!empty($post_category_obj)) {
            $post_categories_slug[] = $post_category_obj->slug;
        }
    }
}
$banner_list = array(
    'column'    => array(

    ),
    'column_yukata'    => array(
        'link'  => home_url().'/takuhai/yukata',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_yukata.jpg',
        'alt' => '浴衣レンタルの宅配ネット通販',
    ),
    'furisode-column'  => array(
        'link'  => home_url().'/formal/furisode',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_furisode.jpg',
        'alt' => '振袖レンタル【結婚式・成人式】',
    ),
    'column_hakama'    => array(
        'link'  => home_url().'/formal/hakama',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_hakama.jpg',
        'alt' => '卒業式の袴・二尺袖レンタル',
    ),
    'ubugi-column'     => array(
        'link'  => home_url().'/formal/ubugi',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_ubugi.jpg',
        'alt' => 'お宮参りの産着・祝着・初着レンタル',
    ),
    'homongi-column'   => array(
        'link'  => home_url().'/formal/homongi',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_homongi.jpg',
        'alt' => '訪問着レンタル【結婚式・卒業式】',
    ),
    'kurotomesode-column' => array(
        'link'  => home_url().'/formal/kurotomesode',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_tomesode.jpg?ver=20200210',
        'alt' => '黒留袖のレンタルはこちら',
    ),
    'irotomesode-column' => array(
        'link'  => home_url().'/formal/irotomesode',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_irotomesode.jpg?ver=20200210',
        'alt' => '色留袖のレンタルはこちら',
    ),
    'mofuku-column' => array(

    ),
    'shichigosan-column' => array(
        'link'  => home_url().'/formal/shichigosan',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_shichigosan.jpg',
        'alt' => '七五三レンタル',
    ),
    'kekkonshiki-column' => array(
        'link'  => home_url().'/formal/wedding',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_wedding.jpg',
        'alt' => '結婚式・結納の着物レンタル【振袖・留袖・訪問着】',
    ),
    'seijin-column' => array(
        'link'  => home_url().'/formal/seijinshiki',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_coming_of_age.jpg',
        'alt' => '成人式の着物レンタル【振袖】',
    ),
    'sotsugyou-column'    => array(
        'link'  => home_url().'/formal/sotsugyoushiki',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_graduation.jpg',
        'alt' => '卒業式の着物レンタル',
    ),
    'nyugakushiki-column'    => array(
        'link'  => home_url().'/formal/nyugakushiki',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_enter_school.jpg',
        'alt' => '入学式に母親が着る着物(訪問着)',
    ),
    'omiyamairi-column'     => array(
        'link'  => home_url().'/formal/omiyamairi',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_shrine_visit_for_birth.jpg',
        'alt' => 'お宮参りの着物(産着・掛け着)',
    ),
    'dressing-column'     => array(

    ),
    'hairdressing'  => array(

    ),
    'planx_collaboration'   => array(

    ),
    'obi-column' => array(

    ),
    'komono-column' => array(

    ),
    'dansei-column' => array(

    ),
);

// Get obj tax from post id
$obj_tax_column = get_the_terms($post->ID, 'category');
$hasOmiyamairi = false;
$hasShichigosan = false;
$hasSeijin = false;
$hasHakama= false;

foreach ($obj_tax_column as $index => $tax_column) {

	if ($tax_column->slug == 'omiyamairi-column') {
        $hasOmiyamairi = true;
	} else if ($tax_column->slug == 'shichigosan-column') {
        $hasShichigosan = true;
	} else if ($tax_column->slug == 'seijin-column') {
        $hasSeijin = true;
	} else if ($tax_column->slug == 'column_hakama') {
        $hasHakama = true;
    }

}

?>
    <div class="container-box clearfix">
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="right-column">
                                    <div class="section-new-formal wrap-formal-blog">
                                        <?php if($hasOmiyamairi):?>
											<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">
												<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>">
															<span class="text-breadcrumbs" itemprop="name">TOP</span>
														</a>
														<meta itemprop="position" content="0">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/formal/ubugi">
															<span class="text-breadcrumbs" itemprop="name">お宮参り</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/column/shrine-visit-for-birth">
															<span class="text-breadcrumbs" itemprop="name">お宮参り関連コラム</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs last-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<span class="text-breadcrumbs" itemprop="name"><?php echo get_the_title($post); ?></span>
														<meta itemprop="position" content="2">
													</li>
												</ol>
											</div>
                                        <?php elseif($hasShichigosan) :?>
											<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">
												<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>">
															<span class="text-breadcrumbs" itemprop="name">TOP</span>
														</a>
														<meta itemprop="position" content="0">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/formal/shichigosan">
															<span class="text-breadcrumbs" itemprop="name">七五三</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/shichigosan-column">
															<span class="text-breadcrumbs" itemprop="name">七五三関連コラム</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs last-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<span class="text-breadcrumbs" itemprop="name"><?php echo get_the_title($post); ?></span>
														<meta itemprop="position" content="2">
													</li>
												</ol>
											</div>
                                        <?php elseif($hasSeijin) :?>
											<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">
												<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>">
															<span class="text-breadcrumbs" itemprop="name">TOP</span>
														</a>
														<meta itemprop="position" content="0">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/formal/furisode">
															<span class="text-breadcrumbs" itemprop="name">成人式・振袖</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/column/coming-of-age">
															<span class="text-breadcrumbs" itemprop="name">成人式・振袖関連コラム</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs last-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<span class="text-breadcrumbs" itemprop="name"><?php echo get_the_title($post); ?></span>
														<meta itemprop="position" content="2">
													</li>
												</ol>
											</div>
                                        <?php elseif($hasHakama) :?>
											<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">
												<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>">
															<span class="text-breadcrumbs" itemprop="name">TOP</span>
														</a>
														<meta itemprop="position" content="0">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/formal/hakama">
															<span class="text-breadcrumbs" itemprop="name">袴・二尺袖</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<a class="link-breadcrumbs" itemprop="item" href="<?= WP_HOME; ?>/column/hakama">
															<span class="text-breadcrumbs" itemprop="name">袴・二尺袖関連コラム</span>
														</a>
														<meta itemprop="position" content="1">
													</li>
													<span class="separator"> &gt; </span>
													<li class="item-breadcrumbs last-breadcrumbs" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
														<span class="text-breadcrumbs" itemprop="name"><?php echo get_the_title($post); ?></span>
														<meta itemprop="position" content="2">
													</li>
												</ol>
											</div>
                                        <?php else :?>
                                            <?php
                                            if (function_exists('yoast_breadcrumb')) {
                                                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                                            }
                                            ?>
										<?php endif; ?>


                                        <div class="wrap-formal-content formal-blog-detail ">
                                            <div class="wrap-blog-left-contentfull-width">
                                                <?php if (have_posts()) :
                                                    while (have_posts()) : the_post();
                                                        $title = get_the_title();
                                                        $img = has_post_thumbnail() ? swe_get_the_post_thumbnail($post) : "<img src='".WP_HOME."/images/no-image.png'>";
                                                        $date = get_the_date();
                                                        $view_count = do_shortcode('[post-views]');
                                                        $excerpt = get_the_excerpt();
                                                        $cate_link = get_category_link($current_cate);

                                                    endwhile;
                                                endif; ?>
                                                <div class="wrap-general-pd-intro flexbox">
                                                <div class="wrap-pd-intro">
                                                    <div class="wrap-pd-img">
                                                        <style>
                                                            .wrap-pd-img{
                                                                position: relative;
                                                            }
                                                            .wrap-pd-img img{
                                                                position: absolute;
                                                                top: 0;
                                                                left: 0;
                                                                opacity: 0;
                                                                visibility: hidden;
                                                            }
                                                            .wrap-pd-img::after {
                                                                display: block;
                                                                content: '';
                                                                background: url('../../../../../images/loading.gif') no-repeat center center #eee;
                                                                padding-bottom: 74.8%
                                                            }
                                                            .wrap-pd-img.imagesLoaded img{
                                                                position: static;
                                                                opacity: 1;
                                                                visibility: visible;
                                                            }
                                                            .wrap-pd-img.imagesLoaded:after{
                                                                background: unset;
                                                                padding-bottom: 0;
                                                            }
                                                            .wrap-pd-img.imagesLoaded .overlay-img{
                                                                display: block !important;
                                                            }
                                                        </style>
                                                        <?php $wpblog_fetrdimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                           <a href="<?= $wpblog_fetrdimg; ?>" rel="lightbox[<?= $title ?>]">
                                                                <?php echo $img; ?>
                                                           <div class="overlay-img" style="display: none;"></div></a>
                                                        </div>
                                                        <div class="wrap-pd-content">
                                                            <h1 class="wrap-pd-title"> <?php echo $title; ?> </h1>
                                                            <div class="wrap-pd-info">
                                                                <div class="wrap-feature">特集</div>
                                                                <div class="post-date"><?php echo $date; ?></div>
                                                                <div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="wrap-pd-details wrap-pd-details-column">
                                                    <?php the_content(); ?>
                                                </div>
                                                <div class="wrap-reserve-bottom" style="display: none">
                                                    <div class="reserve-list"><a href="<?php echo $cate_link;?>" class="main-btn">記事掲載アイテム一覧</a></div>
                                                    <div class="social-widget">
                                                        <?php
                                                        if (function_exists('wp_social_bookmarking_light_output_e')) {
                                                            wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));
                                                        }
                                                        ?></div>
                                                </div>
                                                <div class="wrap-pd-intro bottom" style="display: none">
                                                    <div class="wrap-pd-img"><?php echo $img; ?>
                                                        <div class="overlay-img"></div>
                                                    </div>
                                                    <div class="wrap-pd-content">
                                                        <h2 class="wrap-pd-title"> <?php echo $title;?> </h2>
                                                        <div class="wrap-pd-info">
                                                            <div class="wrap-feature">特集</div>
                                                            <div class="post-date"><?php echo $date; ?></div>
                                                            <div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-cate-by-article detail">
                                                    <?php
                                                    if ($obj_tax_column) {
                                                        ?>
                                                        <ul class="list-cate-by-article flexbox">
                                                            <?php foreach ($obj_tax_column as $tax_column) { ?>
                                                                <li class="cate-by-article"><a href="<?= get_term_link($tax_column->term_id); ?>"><?= $tax_column->name; ?></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>

                                                <?php
                                                    // Show only banner column omiyamairi when select ubugi-column and omiyamairi-column
                                                    $hasUbugi = false;
                                                    $hasOmiyamairi = false;
                                                    foreach ($obj_tax_column as $index => $tax_column) {
                                                        $hasUbugi = $tax_column->slug == 'ubugi-column' ? $index : $hasUbugi;
                                                        $hasOmiyamairi = $tax_column->slug == 'omiyamairi-column' ? true : false;
                                                        if ( ($hasUbugi && $hasOmiyamairi) || ($hasOmiyamairi && $hasUbugi==0) ) {
                                                            unset($obj_tax_column[$hasUbugi]);
                                                        }
                                                    }
                                                ?>

                                                <?php foreach ($obj_tax_column as $tax_column) : ?>
                                                    <?php if ( array_key_exists($tax_column->slug, $banner_list) && !empty($banner_list[$tax_column->slug]) ) : ?>
                                                        <div class="wrap-banner-cate-article">
                                                            <ul class="list-banner">
                                                                <li class="item-banner">
                                                                    <a href="<?= $banner_list[$tax_column->slug]['link'] ?>">
                                                                        <div class="image-banner">
                                                                            <img alt="<?= $banner_list[$tax_column->slug]['alt'] ?>" src="<?= $banner_list[$tax_column->slug]['img'] ?>"/>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                                <div class="wrap-banners-column-cate detail">
                                                    <h3 class="title-banner-cate">着物の種類で探す</h3>
                                                    <ul class="list-banners-column-cate flexbox">
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/homongi"><img src="<?= WP_HOME; ?>/images/column/banner-column-homongi.jpg" alt="訪問着"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/tomesode"><img src="<?= WP_HOME; ?>/images/column/banner-column-tomesode.jpg" alt="留袖"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/furisode"><img src="<?= WP_HOME; ?>/images/column/banner-column-furisode.jpg" alt="振袖"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/hakama"><img src="<?= WP_HOME; ?>/images/column/banner-column-hakama.jpg" alt="袴"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/ubugi"><img src="<?= WP_HOME; ?>/images/column/banner-column-ubugi.jpg" alt="産着"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/yukata"><img src="<?= WP_HOME; ?>/images/column/banner-column-yukata.jpg" alt="浴衣"></a>
                                                        </li>
                                                        <li class="banner-column-cate banner-column-cate-full">
                                                            <a href="<?= WP_HOME; ?>/column/mofuku"><img src="<?= WP_HOME; ?>/images/column/banner-column-mofuku.jpg" alt="その他の種類の着物"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wrap-banners-column-cate detail">
                                                    <h3 class="title-banner-cate">冠婚葬祭シーンから探す</h3>
                                                    <ul class="list-banners-column-cate flexbox">
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/wedding"><img src="<?= WP_HOME; ?>/images/column/banner-column-wedding.jpg" alt="結婚式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/coming-of-age"><img src="<?= WP_HOME; ?>/images/column/banner-column-coming-of-age.jpg" alt="成人式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/graduation"><img src="<?= WP_HOME; ?>/images/column/banner-column-graduation.jpg" alt="卒業式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/enter-school"><img src="<?= WP_HOME; ?>/images/column/banner-column-enter-school.jpg" alt="入学式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/753"><img src="<?= WP_HOME; ?>/images/column/banner-column-753.jpg" alt="七五三"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/shrine-visit-for-birth"><img src="<?= WP_HOME; ?>/images/column/banner-column-shrine-visit-for-birth.jpg" alt="お宮参り"></a>
                                                        </li>
                                                        <li class="banner-column-cate banner-column-cate-full">
                                                            <a href="<?= WP_HOME; ?>/column/other"><img src="<?= WP_HOME; ?>/images/column/banner-column-other.jpg" alt="その他のイベント・シーン"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <?php
                                                if ($obj_tax_column) {
                                                    $i = 0;
                                                    foreach ($obj_tax_column as $tax_column) {
                                                        $i++;
                                                        ?>
                                                        <div class="wrap-articles-column detail wrap-articles-column-<?= $i; ?>">
                                                            <?php if ($i == 1) { ?>
                                                                <h3 class="title-cate-column"><?= $tax_column->name; ?>に関する人気記事</h3>
                                                            <?php } elseif ($i == 2) { ?>
                                                                <h3 class="title-cate-column"><?= $tax_column->name; ?>に関する関連記事</h3>
                                                            <?php } elseif ($i == 3) { ?>
                                                                <h3 class="title-cate-column"><?= $tax_column->name; ?>の人気記事</h3>
                                                            <?php } elseif ($i == 4) { ?>
                                                                <h3 class="title-cate-column"><?= $tax_column->name; ?>に関する関連記事</h3>
                                                            <?php } else { ?>
                                                                <h3 class="title-cate-column"><?= $tax_column->name; ?>に関する新着記事</h3>
                                                            <?php } ?>
                                                            <ul class="list-articles-column">
                                                                <?php
                                                                $args = array();
                                                                $defaults = array(
                                                                    'number_of_posts' => 4,
                                                                    'post_type' => array('post'),
                                                                    'order' => 'desc',
                                                                    'thumbnail_size' => 'thumbnail',
                                                                    'show_post_views' => true,
                                                                    'show_post_thumbnail' => false,
                                                                    'show_post_excerpt' => false,
                                                                    'no_posts_message' => __('No Posts', 'post-views-counter'),
                                                                    'item_before' => '',
                                                                    'item_after' => ''
                                                                );
                                                                $args = apply_filters('pvc_most_viewed_posts_args', wp_parse_args($args, $defaults));

                                                                $posts = pvc_get_most_viewed_posts(
                                                                    array(
                                                                        'posts_per_page' => (isset($args['number_of_posts']) ? (int)$args['number_of_posts'] : $defaults['number_of_posts']),
                                                                        'tax_query' => array(
                                                                            array(
                                                                                'taxonomy' => 'category',
                                                                                'field' => 'slug',
                                                                                'terms' => $tax_column->slug,
                                                                            )
                                                                        ),
                                                                    )
                                                                );
                                                                ?>
                                                                <?php
                                                                if ($posts) {
                                                                    foreach ($posts as $post) {
                                                                        $img_post = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, 'large', array('alt'=>get_the_title())) : '<img src="' . WP_HOME . '/images/no-image.png" alt="' . get_the_title() . '">';
                                                                        ?>
                                                                        <li class="article-column flexbox">
                                                                            <div class="image-article-column"><a href="<?php echo get_permalink($post->ID); ?>"><?= $img_post; ?></a>
                                                                            </div>
                                                                            <div class="info-article-column">
                                                                                <!--<p class="customer-views">--><?php //echo $args['show_post_views'] ? number_format_i18n(pvc_get_post_views($post->ID)) : '' ?><!--view</p>-->
                                                                                <a href="<?php echo get_permalink($post->ID); ?>">
                                                                                    <h4 class="title-article-column"><?php echo get_the_title($post->ID); ?></h4>
                                                                                    <p class="desc-article-column"><?php echo wp_trim_words($post->post_content, 40, '...'); ?></p>
                                                                                </a>
                                                                                <?php
                                                                                $obj_tax_column = get_the_terms($post->ID, 'category');
                                                                                if ($obj_tax_column) {
                                                                                    ?>
                                                                                    <ul class="list-cate-by-article flexbox">
                                                                                        <?php foreach ($obj_tax_column as $tax_column) { ?>
                                                                                            <li class="cate-by-article"><a href="<?= get_term_link($tax_column->term_id); ?>"><?= $tax_column->name; ?></a></li>
                                                                                        <?php } ?>
                                                                                    </ul>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </ul>
                                                            <?php wp_reset_postdata(); ?>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </div>
                                            <?php if ($isSmartPhone) : ?>
                                                <div class="wrap-sidebar-overlay">
                                                    <div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
                                                        <?php if (is_active_sidebar('sidebar-1')) : ?>
                                                            <?php dynamic_sidebar('sidebar-1'); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> <!--end right-column-->
                            </div><!--end wrap-boths-column-->
                        </div><!--end left-column-content-->
                    </div><!--end wrap-column-content-->
                </div>
            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->
    </div>
    <style type="text/css">
        .wp_rp_wrap{
            display: none;
        }
    </style>
    <script>
        $( document ).ready(function() {
            //       $(".wrap-new-banner-collumn").show();
            //       $(".wrap-new-banner-collumn").insertBefore($(".wp_rp_wrap"));/* Begin: Custom content detail column */
            var warp_toc = $("<div class='wrap-toc'></div>");
            <?php $wpblog_fetrdimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            var main_img = '"<a href="<?= $wpblog_fetrdimg; ?>" rel="lightbox[<?= $title ?>]"><?= $img; ?></a>';
            main_img = $("<div class='main-image'></div>").append(main_img);
            // var toc_container = $("#toc_container");
            // $(".wrap-pd-details-column").prepend($(warp_toc).append(main_img,toc_container));
            $(".wrap-general-pd-intro").append($("#toc_container"));
            /* End: Custom content detail column */
            $("#wrap-second-show-hide").hide();
            $("#show-hide-button-ykt-ht").click(function(e){
                e.preventDefault();
                $('#wrap-second-show-hide').show();
                $("#show-hide-button-ykt-ht").hide();
            });

            // Hide second image
            $("img[src$='<?= $wpblog_fetrdimg; ?>']").hide();

            setTimeout(function() {
                if($('.wrap-pd-img').length){
                    $('.wrap-pd-img').addClass('imagesLoaded');
                }
            }, 1000);

        });
    </script>
<?php get_footer('new-kimono'); ?>
