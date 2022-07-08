<?php
/**
 * Template Name: Access Page
 */
wp_register_style('access-style', get_template_directory_uri() . '/css/access.css', array('twentytwelve-style'));
wp_enqueue_style('access-style');
get_header();
global $post;
?>
<style>
    
</style>
<div class="container clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
    <div class="column-list-page access-page clearfix hd-page-template hd-column-list content-column-page">
        <header>
            <h1><?php the_title(); ?></h1>

            <div class="image">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail(array(960,378));
                }
                ?>
            </div>
	        <div class="desc">
		        <?php the_excerpt(); ?>
	        </div>
        </header>
        <div class="child-page clearfix">    
            <?php
            // Restore original Post Data
            wp_reset_postdata();
            // WP_Query arguments	
            $args = array(
                'post_parent' => $post->ID,
                'post_type' => 'page',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'menu_order',
            );

            // The Query
            $my_query = new WP_Query($args);

            // The Loop	
            if ($my_query->have_posts()) { $i=1;
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    ?>
                    <div class="page-item <?php echo $i%4==0 ? 'last': "" ?>">
                        <h2>
                            <!--<a href="<?php // echo get_the_permalink(); ?>" title="<?php // echo get_the_title(); ?>"><?php the_title(); ?></a>--> 
                            <?php the_title(); ?>
                        </h2>                        
                        <?php
							$listGalery = getGaleryFromPost($post);
							if(!empty($listGalery)):
							foreach ($listGalery as $galery) {
								$galery = $galery['ids'];
								if (!empty($galery) && count($galery) != 0) {
									$attachment_id = $galery[0];
									$ok = wp_get_attachment_image($attachment_id);
								?>
							<div class="featured-post">
								<a href="<?php echo get_the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php	
									if (!empty($ok)) {
										echo swe_wp_get_attachment_image($attachment_id, $size = array(266, 150), $icon = 1, $attr = array(
											//	'src' => $src,
											'class' => 'attachment-'.implode('x', $size) . ' '.$attachment_id,
											'id' => '1_1_main',
											'alt' => trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))),
										));
									}
									?>
								</a>
							</div>
							<?php
								}
							} 
							endif;
							?>
                        <div class="shop-detail shop-detail-1">                            
                            <?php echo do_shortcode(get_field('shop_detail')); ?>
                        </div>
                    </div>
                <?php
                $i++; }
            } else {                
                get_template_part( 'content', 'none' );
            }
            // Restore original Post Data
            wp_reset_postdata();
            ?>
        </div><!-- end of access-child-page-->
        
        <div class="google_map" style="margin-bottom: 10px;margin-top: 10px;">
            <p id="access-map" style="width: 960px; height: 600px;" ></p>
        </div>

    </div>		
</div>
</div><!-- end container -->
<?php get_footer(); ?>