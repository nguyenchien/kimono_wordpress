<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post;
?>

<!--
    // Template for page howto
-->

<article id="post-<?php the_ID(); ?>" <?php is_page(FAQ) ?  post_class( 'page-faqs') : post_class(); ?>>
    
    <div class="content-page-first clearfix">	        
        <div class="main-image-page-template">			            
            <div class="image">
                <?php if ( qtrans_getLanguage() == 'ja') :
			the_post_thumbnail('full'); 
		else : ?>
		<?php	
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                    
                    $image = preg_replace('/\.(jpg|png)/', '_wide.$1', $image[0]); 
                ?>
                <img width="960" height="378" src="<?php echo $image ?>" class="attachment-full wp-post-image" alt="">
                <?php endif; ?>
                
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
    
    <?php if(!is_page(NOTATION) && !is_page(MAMECHIYO)):?>
    <h3 class="reserve-960x100 reserve-960x100-pc page-template">
        <a href="<?php echo esc_url( home_url( '/' ).'reserve' ); ?>"><img src="<?php echo WP_HOME; ?>/images/reserve_2_960x100_<?php echo Yii::app()->language;?>.jpg" alt="" /></a>
    </h3>
	<h3 class="reserve-960x100 reserve-960x100-sp"><a href="<?php echo esc_url( home_url( '/' ).'reserve' ); ?>"><img alt="ご予約はこちらから" data-src="<?php echo WP_HOME; ?>/images/banner-image-reserve-320x85.png" src="<?php echo WP_HOME; ?>/images/banner-image-reserve-320x85.png" class="lazy-loaded lazy-hidden"></a></h3>
	<?php endif;?>

    <div class="entry-content <?php echo is_page('notation') ? "content-page-notation" : ""?>">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->

    <div class="entry-meta sixteen columns">
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-meta -->
        
</article><!-- #post -->
