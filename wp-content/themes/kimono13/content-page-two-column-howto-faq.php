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
    // Template for page howto, faq (new)
-->

<article id="post-<?php the_ID(); ?>" <?php is_page(FAQ) ?  post_class( 'page-faqs') : post_class(); ?>>
            
    <div class="box-overview-page-howto-faq clearfix">
        <div class="info">
            <div class="wrap">
	            <?php if(get_field('sub-title-page')){
		            echo '<h2>'.get_field('sub-title-page').'</h2>';
	            }?>
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
                    <?php the_excerpt(); ?>
                <?php endif;?>
            </div><!-- end wrap -->
        </div><!-- end info -->
        
        <div class="image">
            <?php the_post_thumbnail('full'); ?>
        </div><!-- end image -->
    </div><!-- end box-overview-page-howto-faq -->

    <div class="box-content-page <?php echo is_page('howto') ? "cont-page-howto" : "" ?><?php echo is_page('faqdraft') ? "cont-page-faq" : "" ?> <?php echo ($post->post_name=='1day')?'one-day':$post->post_name;?> clearfix">
        <div class="cont-page-left">
            <?php
            the_content(); ?>
        </div><!-- end cont-page-left -->
        
        <div class="cont-page-right">
            <?php if(is_page('1day') || is_page('reserve')): ?>
                <?php get_sidebar('1day');?>
				
            <?php else : ?>
                <?php get_sidebar('howto-faqs');?>
            <?php endif;?>
        </div><!-- end cont-page-right -->
        
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
    </div><!-- .box-content-page -->

    <div class="entry-meta sixteen columns">
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-meta -->
        
</article><!-- #post -->

<?php Yii::app()->controller->widget('application.components.widgets.EventTrackingContactForm'); ?>