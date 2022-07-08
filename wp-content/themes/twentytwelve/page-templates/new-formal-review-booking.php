<?php
/**
 * Template Name: New Formal Review Booking
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
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('ctm-voice-top-100-widget-style', get_template_directory_uri() . '/css/ctm-voice-top-100-widget.css', array('twentytwelve-style'));
wp_enqueue_style('ctm-voice-top-100-widget-style');
wp_register_style('ctm-voice-full-widget-style', get_template_directory_uri() . '/css/ctm-voice-full.css', array('twentytwelve-style'));
wp_enqueue_style('ctm-voice-full-widget-style');
wp_register_style('new-formal-review-booking-style', get_template_directory_uri() . '/css/new-formal-review-booking.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-review-booking-style');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-formal-new-booking-script', get_template_directory_uri() . '/js/new-formal-review-booking.js');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
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

<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
	'id' => 'formal-preview-popup',
	'htmlOptions' => array(
		'style' => 'display: none'
	),
))
?>

<?php if(defined('ENABLE_FORMAL_PREVIEW_POPUP') && ENABLE_FORMAL_PREVIEW_POPUP === true):?>
    <?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
        'id' => 'formal-preview-popup',
        'htmlOptions' => array(
            'style' => 'display: none'
        ),
    )) ?>
<?php endif?>

<script>
    $(document).ready(function () {
        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        });

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
    })
</script>
