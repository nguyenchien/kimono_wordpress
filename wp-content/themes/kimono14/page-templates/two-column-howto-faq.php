<?php
/**
 * Template Name: Two column page howto, faq
 * Links: /howto, /faq, /faq/book, /faq/dressing, /faq/hairset, /faq/henkyaku, /faq/contactwp
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
                  <div class="section-top clearfix">
					  <?php if(is_page('1day')): ?>
						  <div class="full-image"><?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?></div>
					  <?php else: ?>
						  <?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
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

				<div class="box-content-page <?php echo is_page('howto') ? "cont-page-howto" : "" ?><?php echo is_page('faq') ? "cont-page-faq" : "" ?> <?php echo ($post->post_name=='1day')?'one-day':$post->post_name;?> clearfix">
					<div class="cont-page-left">
						<?php
						the_content(); ?>
					</div><!-- end cont-page-left -->

					<div class="cont-page-right">
						<?php if(is_page('1day') || is_page('reserve')): ?>
							<?php get_sidebar('1day');?>
						<?php //elseif(is_page('howto')): ?>		

						<?php else : ?>
							<?php get_sidebar('howto-faqs');?>
						<?php endif;?>
					</div><!-- end cont-page-right -->

					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .box-content-page -->

				<div class="button-reserve">
					<a href="<?php echo esc_attr(home_url('reserve'))?>" class="link-reserve bg-F9A523"><?= Yii::t('wp_theme','着物レンタルのご予約はこちら'); ?></a>
				</div>

				<div class="entry-meta sixteen columns">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->

			</article><!-- #post -->            
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>