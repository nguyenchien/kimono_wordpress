<?php
/**
 * Template Name: Muslim Friendly Page
 * Links: /muslim-friendly
 */

wp_register_style('muslim-friendly', get_template_directory_uri() . '/css/muslim-friendly.css', array('twentytwelve-style'));
wp_enqueue_style('muslim-friendly');
global $post;
get_header();
if(is_page('contactwp') || is_page('reserve')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $plugin ='contact-form-7/wp-contact-form-7.php';
    if(is_plugin_active($plugin)){
        wp_enqueue_style( 'contact-form-7',wpcf7_plugin_url( 'includes/css/styles.css' ), array(), WPCF7_VERSION, 'all' );
    }
}
?>
    <div class="container clearfix">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
        } ?>
                <div class="box-overview-page-howto-faq clearfix">
                    <div class="section-top">
                        <div><?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?></div>
                            <div class="text-h1">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                                <?php if (!empty($post->post_excerpt)): ?>
                                    <?php the_excerpt(); ?>
                                <?php endif; ?>
                            </div>
                    </div>
                </div><!-- end box-overview-page-howto-faq -->

                    <div class="cont-page-lef cont-friendly-page">
                        <?php the_content(); ?>
                    </div><!-- end cont-page-left -->
    </div><!-- end container -->
<?php get_footer(); ?>