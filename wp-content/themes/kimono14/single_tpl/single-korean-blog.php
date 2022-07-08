<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style( 'style-blog', get_template_directory_uri() . '/css/blog.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-blog' );
get_header(); 
global $post, $kimono;
$taxonomy = $kimono['taxonomy'];
$cat_item = $kimono['current_cate'];

?>
<div class="container clearfix">    
	<?php
	if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
	}
	?>	

    <div id="primary" class="site-content site-content-blog d-two-thirds d-column left">
        <div class="box-date-shop-name clearfix">
            <span class="date"><?php echo get_the_date(); ?></span>            
        </div><!-- end box-date-shop-name -->

        <div id="content" class="cont-blog-detail" role="main">
            <?php while ( have_posts() ) : the_post(); ?>			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">

					<h1 class="entry-title title-post"><?php the_title(); ?></h1>

					<div class="image-featured">
						<?php if(has_post_thumbnail()){swe_the_post_thumbnail($post, 'post-thumbnail', array('alt' => strip_tags(get_the_title())));}?>
					</div><!-- end image -->

					<div class="entry-content content-post">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

				</header><!-- .entry-header -->
			</article><!-- #post -->
			<?php endwhile; // end of the loop.   ?>
			<nav class="nav-single nav-single-single clearfix">
				<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<', 'Previous post link', 'twentytwelve' ) . '</span> '. _x( '前の記事へ', 'Previous post link', 'twentytwelve' ) ,true ); ?></span>
				<span class="cate-link"><a href="<?php echo get_term_link($cat_item->term_id, $taxonomy); ?>" title="<?php echo $cat_item->name; ?>"><span class="shop-name"><?php echo Yii::t('wp_theme', '記事一覧へ'); ?></span></a></span>
				<span class="nav-next"><?php next_post_link( '%link',  _x( '次の記事へ', 'Previous post link', 'twentytwelve' ) .' <span class="meta-nav">' . _x( '>', 'Next post link', 'twentytwelve' ) . '</span>',true ); ?></span>
			</nav><!-- .nav-single -->
			
        </div><!-- #content -->
    </div><!-- #primary -->	
	<section id="sidebar-blog" class="d-one-third d-column flright">
		<?php get_sidebar('korean-blog'); ?>
	</section>    
</div><!-- end container -->

<?php get_footer(); ?>