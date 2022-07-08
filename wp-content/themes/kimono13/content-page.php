<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="title-page">			
        <?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
            <div class="sixteen columns">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <h1 class="entry-title sixteen columns">
			<?php the_title(); ?>
		</h1>
    </div><!-- end title-page -->

    <h3 class="reserve-960x100 page-policy page-policy-pc">
        <a href="<?php echo esc_url( home_url( '/' ).'reserve' ); ?>"><img src="<?php echo WP_HOME; ?>/images/reserve_2_960x100_<?php echo Yii::app()->language;?>.jpg" alt="" /></a>
    </h3>
	<h3 class="reserve-960x100 page-policy-sp"><a href="<?php echo esc_url( home_url( '/' ).'reserve' ); ?>"><img alt="ご予約はこちらから" data-src="<?php echo WP_HOME; ?>/images/banner-image-reserve-320x85.png" src="<?php echo WP_HOME; ?>/images/banner-image-reserve-320x85.png" class="lazy-loaded lazy-hidden"></a></h3>

    <div class="entry-content" style="">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->

    <div class="entry-meta sixteen columns">
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-meta -->
        
</article><!-- #post -->