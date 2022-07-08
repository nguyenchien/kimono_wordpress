<?php
/**
 * Template Name: New Formal HairStyle List
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
global $language;

wp_register_style('new-formal-hairstyle-style', get_template_directory_uri() . '/css/new-formal-hairstyle.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-hairstyle-style');

if($language == "ja"){
    wp_register_style('kimono-letter-spacing-style', get_template_directory_uri() . '/css/kimono-letter-spacing-ja.css', array('twentytwelve-style'));
    wp_enqueue_style('kimono-letter-spacing-style');
}
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;

$pagePath = get_page_by_path('formal/furisode/hairstyle/detail');
$pageID = $pagePath->ID;

// Get children page
$args = array(
    'post_type' => 'page',
    'post_parent' => $post->ID,
    'post__not_in' => array($pageID),
    'posts_per_page' => -1,
    'order' => 'DESC',
    'orderby' => 'date',
);
$hairstyle_query = new WP_Query( $args );
?>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay-filter">
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar toggle-filter-list-sidebar">
                <div class="box-filter-list-sidebar">
                    <div class="toggle-filter-sidebar sp">
                        <?php echo do_shortcode('[FormalSidebarFilter]'); ?>
                    </div>
                </div>
            </div>
            <div class="close-sidebar sp">
                <span class="closed-filter"></span>
            </div>
        </div>
    </div>
<?php endif;?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal">', '</div>');
    }
    ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCode(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCode(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                    }else if($postName == 'list'){
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>
                            <div class="right-column right-column-list right-column-hairstyle">
                                <div class="wrap-furisode-hairstyle">
                                    <h1 class="main-title-list">人気な振袖髪型カタログ30選</h1>
                                    <h2 class="sub-title-list">振袖の髪型特集</h2>
                                    <div class="wrap-list-furisode-hairstyle">
                                        <?php if ( $hairstyle_query->have_posts() ) : $i = 0; ?>
                                            <ul class="list-furisode-hairstyle">
                                                <?php while ( $hairstyle_query->have_posts() ) : $hairstyle_query->the_post(); $i++; ?>
                                                    <li class="item-hairstyle item-hairstyle-<?= $i; ?>">
                                                        <h2 class="title-item"><?php the_title(); ?></h2>
                                                        <div class="image-item">
                                                            <a href="<?= WP_HOME; ?>/formal/furisode/hairstyle/detail#<?= $i < 10 ? '0'.$i : $i; ?>"><img src="<?= WP_HOME; ?>/images/hairstyle/hairstyle-main-<?= $i; ?>.jpg"/></a>
                                                        </div>
                                                        <?php
                                                            $list_tags = get_field('hair_style_tags', get_the_ID());
                                                            echo $list_tags;
                                                        ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                            <?php wp_reset_postdata(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="wrap-grid-booking wrap-grid-booking-access">
                                    <div class="wrap-btn-change flexbox">
                                        <a href="https://kyotokimono-rental.com/formal/furisode" class="btn-formal btn-formal-access btn-new-rs btn-color-pink main-btn btn-link">振袖レンタルTOPに戻る</a>
                                    </div>
                                </div>
                            </div><!--end right-column-->

                        </div><!--end wrap-boths-column-->
                    </div><!--end left-column-content-->
                </div><!--end wrap-column-content-->
            </div>
        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->
</div><!-- end container -->
<?php get_footer('formal'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php
        if($isSmartPhone):
        ?>
        var num_scroll = $(".closed-filter").outerHeight();
        $(window).on("scroll", function(){
            if($(this).scrollTop() > num_scroll){
                $(".closed-filter").addClass("fixed-icon-filter");
                $(".wrap-header").hide();
            }else{
                $(".closed-filter").removeClass("fixed-icon-filter");
                $(".wrap-header").show();
            }
        });
        var numHeight = $(".num-height").outerHeight();
        $(".icon-toggle-filter-sidebar").on('click', function () {
            $(".toggle-filter-list-sidebar").addClass("active").css("top", + numHeight);
            $("body, .wrap-overlay-filter").addClass("fixed-scroll overlay-toggle-filter");
            $(".closed-filter").addClass("icon-formal-check-ok");
        });
        $(".close-sidebar .closed-filter").on("click", function(){
            $("body, .toggle-filter-list-sidebar, .wrap-overlay-filter, .closed-filter").removeClass("active fixed-scroll overlay-toggle-filter icon-formal-check-ok");
        });

        var calendarWidth = $(window).width();
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').width(calendarWidth - 10);

        var calendarLeftPos = $('.item-nav-top-search').width() - 3;
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').css('left', "-" + calendarLeftPos + 'px');

        <?php endif?>
    })
</script>
