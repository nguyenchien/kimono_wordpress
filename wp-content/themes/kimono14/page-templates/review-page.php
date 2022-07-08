<?php
/**
 * Template Name: Review Page
 * Links: /access/kyotostation/kyotostation-review, '/access/gion-shijo/gionshijo-review', '/access/shinkyogoku/shinkyogoku-review'
 * '/access/kinkakuji/kinkakuji-review', '/access/kiyomizuzaka/kiyomizuzaka-review',
 * '/osaka/osaka-access/osaka-shinsaibashi/shinsaibashi-review',
 * '/access/kamakura/kamakura-review', '/asakusa/asakusa-access/asakusa/asakusa-review'
 */

wp_register_style('review-page', get_template_directory_uri() . '/css/review-page.css', array('twentytwelve-style'));
wp_enqueue_style('review-page');

global $post;
get_header();

?>
<div class="container clearfix">
    
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>

    <?php while ( have_posts() ) : the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php is_page(FAQ) ?  post_class( 'page-faqs') : post_class(); ?>>

				<div class="box-overview-page-howto-faq clearfix">
                  <div class="section-top">
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
                  </div>
				</div><!-- end box-overview-page-howto-faq -->

				<div class="box-content-page cont-page-review clearfix">
					<div class="cont-page-left">
						<?php
						the_content(); ?>
					</div><!-- end cont-page-left -->

					<div class="cont-page-right">
						<?php get_sidebar('review-page');?>
					</div><!-- end cont-page-right -->

					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .box-content-page -->

				<div class="entry-meta sixteen columns">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->

			</article><!-- #post -->            
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>