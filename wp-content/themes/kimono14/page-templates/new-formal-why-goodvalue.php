<?php
/**
 * Template Name: New Formal Why GoodValue
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
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-why-goodvalue-style', get_template_directory_uri() . '/css/new-formal-why-goodvalue.css', array('twentytwelve-style'), '20180234');
wp_enqueue_style('new-formal-why-goodvalue-style');
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
?>
    <div class="container-box clearfix">
        <?php
        if($post->post_name != "formal"){
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
            }
        }
        ?>

        <div class="wrap-highend-v2">
            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>
        </div><!-- end wrap-highend-v2 -->

    </div><!-- end container -->
<?php get_footer('formal') ;?>
<script>

//    $(document).ready(function(){
//        $('.btn-show-list').click(function(e){
//            e.preventDefault();
//            $('#wrap-popup-list-pro').addClass('overlay-popup');
//            $('.wrap-popup-list-pro').fadeIn();
//            $('html').addClass('modal-open');
//        });
//        $('.closed-popup').on('click', function(){
//            $('#wrap-popup-list-pro').removeClass('overlay-popup');
//            $('.wrap-popup-list-pro').hide();
//            $('html').removeClass('modal-open');
//        });
        $(document).click(function(e){
            if($(e.target).closest('.box-popup-list, .btn-show-list').length != '1') {
                $('.wrap-popup-list-pro').hide();
                $('html').removeClass('modal-open');
                $('#wrap-popup-list-pro').removeClass('overlay-popup');
            }
        })
    });
</script>
