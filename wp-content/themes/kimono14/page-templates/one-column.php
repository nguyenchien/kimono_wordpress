<?php
/**
 * Template Name: One column Page, No Sidebar
 * links: /policy, /notation
 */
global $post;

wp_register_style('howto-faq', get_template_directory_uri() . '/css/howto-faq.css', array('twentytwelve-style'));
wp_enqueue_style('howto-faq');
get_header(); 
?>
<div class="container clearfix">
    
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>

    <?php while ( have_posts() ) : the_post(); ?>
			 <?php //get_template_part( 'content', 'page-one-column' ); ?>
            <article id="post-<?php the_ID(); ?>" <?php is_page('policy') ?  post_class('policy') : post_class(); ?>>
    
				<div class="content-page-first clearfix">	        
					<div class="main-image-page-template">			            
						<div class="image">
							<?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
						</div>

						<h1>
							<?php
							if(wp_nonce_field('page_h1')){
								the_title();
							}else{
								the_field('page_h1');
							}
							?>
						</h1>

						<?php if(!empty($post->post_excerpt)):?>
							<div class="desc-banner">
								<?php the_excerpt(); ?>
							</div>
						<?php endif;?>
					</div><!-- end main-image-page-template -->
				</div><!-- end content-page-first -->

				<?php if(is_page('policy')):?>
				 <h3 class="reserve-960x100 pc page-policy">
					<a href="<?php echo esc_url( home_url( '/' ).'reserve' ); ?>"><img src="<?php echo WP_HOME; ?>/images/reserve_2_960x100_<?php echo Yii::app()->language;?>.jpg" alt="<?php echo Yii::t('wp_theme','Making a reservation is here !')?>" /></a>
				</h3>

				<h3 class="reserve-960x100 sp page-policy"><a href="<?php echo esc_url( home_url( '/' ).'reserve' ); ?>"><img alt="ご予約はこちらから" data-src="<?php echo WP_HOME; ?>/images/banner-image-reserve-320x85.png" src="<?php echo WP_HOME; ?>/images/banner-image-reserve-320x85.png" class="lazy-loaded"></a></h3>

				<?php endif;?>

				<div class="entry-content <?php echo (is_page('notation') || is_page('notation_kobutsu')) ? "content-page-notation ".$post->post_name : ""?>">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->

				<div class="entry-meta sixteen columns">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->

			</article><!-- #post -->
            <?php // comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>