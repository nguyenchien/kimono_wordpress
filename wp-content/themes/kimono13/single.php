<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); 

global $kimono, $post;
$is_blog = $kimono['is_blog'];
$terms = get_the_terms($post->ID, 'category');
$category_data = get_category_data($terms);//var_dump($category_data);die;
?>
<div class="container clearfix">
    
<?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>
	<section id="category-description" class="category-description-detail sixteen columns row">		
		<img src="<?php echo $category_data ['img_src'] ?>" alt="<?php echo $category_data['name']; ?>" />
		<h2 class="cate-name"><?php echo $category_data['name']; ?></h2>		
		<div><?php echo $category_data['description']; ?></div>
	</section>
    <div id="primary" class="site-content site-content-blog d-two-thirds d-column left">
        <div class="box-date-shop-name clearfix">
            <span class="date"><?php echo get_the_date(); ?></span>
            <span class="shop-name <?php echo $category_data['class']?>" href="<?php echo get_category_link($category_data['id']);?>" title="<?php echo $category_data['name']?>"><?php echo $category_data['shop']?></span>
        </div><!-- end box-date-shop-name -->

        <div id="content" class="cont-blog-detail" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                    
					<?php get_template_part( 'content', 'blog'); ?>
                    
					<nav class="nav-single nav-single-single clearfix">	
                            <!--next_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' );-->
                            <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<', 'Previous post link', 'twentytwelve' ) . '</span> '. _x( '前の記事へ', 'Previous post link', 'twentytwelve' ) ,true ); ?></span>
                            <span class="cate-link"><a href="<?php echo get_category_link($category_data['id']);?>" title="<?php echo $category_data['name']?>"><span class="shop-name <?php echo $category_data['class']?>"><?php _ex('記事一覧へ', 'back to list','twentytwelve'); ?></span></a></span>
                            <span class="nav-next"><?php next_post_link( '%link',  _x( '次の記事へ', 'Previous post link', 'twentytwelve' ) .' <span class="meta-nav">' . _x( '>', 'Next post link', 'twentytwelve' ) . '</span>',true ); ?></span>
                    </nav><!-- .nav-single -->
                    
					<?php // comments_template( '', true ); ?>
            <?php endwhile; // end of the loop. ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php if($is_blog): ?>
    <section id="sidebar-blog" class="d-one-third d-column flright">
        <?php get_sidebar('blog'); ?>
   </section>
<?php else: ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
    
</div><!-- end container -->

<?php get_footer(); ?>