<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); 
global $kimono, $category_data;
$is_blog = $kimono['is_blog'];
$blog = $kimono['blog'];
$cate = $kimono['current_cate'];
$category_data = get_category_data($cate);

?>
<div class="container clearfix">
    
	<?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
        } ?>
    
			<?php // if($is_blog): ?>
				<section id="category-description" class="sixteen columns row">
					<img src="<?php echo $category_data['img_src'] ?>" alt="<?php echo $category_data['name']; ?>" />
                    <h1 class="cate-name"><?php echo $category_data['cate_h1']?></h1>
                    <div>
					    <?php echo $category_data['description']; ?>
                    </div>
				</section>
			<?php // endif; ?>
			<section id="primary" class="site-content site-content-blog d-two-thirds d-column left <?php // echo $is_blog ? 'two-thirds column right' : ""; ?>">
				<div id="content" role="main" class="tn-blog-cat">
					<!--<h2><?php //if ($is_blog) _e('最近の記事', 'twentytwelve') ?></h2>-->
				<?php if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/* Include the post format-specific template for the content. If you want to
						 * this in a child theme then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */

						get_template_part( 'content', 'cate-blog' );

					endwhile;

					twentytwelve_content_nav( 'nav-below' );
					?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

				</div><!-- #content -->
			</section><!-- #primary -->
            <?php if($is_blog): ?>
			<section id="sidebar-blog" class="d-one-third d-column right">
			   <?php get_sidebar('blog'); ?>
		    </section>
<?php // else: ?>
	<?php //  get_sidebar(); ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>