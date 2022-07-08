<?php
    /*
     * Template Name: Lesson Group
     */
    global $post;
    wp_register_style('style-highend-furisode', get_template_directory_uri() . '/css/highend-furisode.css', array('twentytwelve-style'));
    wp_enqueue_style('style-highend-furisode');
    wp_register_style('style-lesson-group', get_template_directory_uri() . '/lesson/css/lesson-group.css', array('twentytwelve-style'));
    wp_enqueue_style('style-lesson-group');
    get_header();
?>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/booking.js"></script>
<div class="lesson-group-layout">
    <div class="container">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>
            <?php the_content(); ?>
            <?php include ("include/lesson_footer_map.php"); ?>
    </div>
    <?php include ("include/lesson_footer_link.php"); ?>
</div><!-- end .lesson-group-layout -->
