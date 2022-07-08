<?php
    /*
     * Template Name: Lesson Reserve
     */
    wp_register_style('style-highend-furisode', get_template_directory_uri() . '/css/highend-furisode.css', array('twentytwelve-style'));
    wp_enqueue_style('style-highend-furisode');
    wp_register_style('style-lesson-group', get_template_directory_uri() . '/lesson/css/lesson-group.css', array('twentytwelve-style'));
    wp_enqueue_style('style-lesson-group');
    wp_register_style('style-lesson-reserve', get_template_directory_uri() . '/lesson/css/lesson-reserve.css', array('twentytwelve-style'));
    wp_enqueue_style('style-lesson-reserve');
    get_header();
    global $post;
?>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/booking.js"></script>
<?php
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
?>
<script>
    $(function(){
        <?php if ($isSmartPhone) {?>
            $('.form-input-pc').remove();
        <?php } else { ?>
            $('.form-input-sp').remove();
        <?php } ?>
    });
</script>
<div class="lesson-group-layout">
    <div class="container">
        <div class="lesson-reserve-contact">
            <h1 class="banner clearfix">
                <?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
            </h1>
            <div class="description container-padding">
                <?php
                if (get_field('sub-title-page') && get_field('sub-title-page') != 'null') {
                    echo '<h2>' . get_field('sub-title-page') . '</h2>';
                }
                ?>
                <div class="brief"><?php the_excerpt(); ?></div>
            </div>
            <div class="wrap-reserve-contact">
                <?php while ( have_posts() ) : the_post();
                    the_content();
                endwhile; ?>
            </div>
            <?php include ("include/lesson_footer_map.php"); ?>
        </div>
    </div>
    <?php include ("include/lesson_footer_link.php"); ?>
</div><!-- end .lesson-group-layout -->
