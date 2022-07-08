<?php
/**
 * Template Name: How To Flow template.
 * Links: /rickshaw
 */

wp_register_style('howto-faq', get_template_directory_uri() . '/css/howto-faq.css', array('twentytwelve-style'));
wp_enqueue_style('howto-faq');

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

    <?php while ( have_posts() ) : the_post(); ?>
            <?php // get_template_part( 'content', 'page-two-column-howto-faq' ); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php is_page(FAQ) ?  post_class( 'page-faqs') : post_class(); ?>>

				<div class="box-overview-page-howto-faq clearfix">
                  <div class="section-top richshaw-page clearfix">
					  <?php if(is_page('1day')): ?>
						  <div class="full-image"><?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?></div>
					  <?php else: ?>
						  <?php if(is_page('rickshaw') && Yii::app()->language !='ja'): ?>
							  <img src="<?php echo WP_HOME.'/images/rickshaw/rickshaw-'.Yii::app()->language.'.png'?>" alt="<?php echo strip_tags(get_the_title()); ?>" />
						  <?php else:?>
							  <?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
						  <?php endif;?>
						  <h1>
							  <?php
							  if (wp_nonce_field('page_h1')) {
								  the_title();
							  } else {
								  the_field('page_h1');
							  }
							  ?>
						  </h1>
						  <?php if (get_field('sub-title-page') && get_field('sub-title-page') != 'null') {
							  echo '<h2>' . get_field('sub-title-page') . '</h2>';
						  }?>
						  <?php if (!empty($post->post_excerpt)): ?>
							  <?php the_excerpt(); ?>
						  <?php endif; ?>
					  <?php endif; ?>
                  </div>
				</div><!-- end box-overview-page-howto-faq -->

				<div class="box-content-page cont-page-howto rickshaw clearfix">
					<div class="cont-page-left">
						<?php
						the_content(); ?>
					</div><!-- end cont-page-left -->

					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .box-content-page -->

				<div class="entry-meta sixteen columns">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->

			</article><!-- #post -->            
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>