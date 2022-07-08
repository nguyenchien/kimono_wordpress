<?php
/**
 * Template Name: Access Child Page 
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style('access-style', get_template_directory_uri() . '/css/access.css', array('twentytwelve-style'));
wp_enqueue_style('access-style');
get_header();
global $post;
?>

<div class="container clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
    <div class="access-child-page hd-access">
        <h1 class="page-title"><?php the_field('page_h1'); ?></h1>
        <div class="page-excerpt"><?php the_excerpt(); ?></div>
        <div class="shop-list clearfix">
            <div class="slide-images left">                
				<?php
				$galery = getGaleryFromPost($post);
				if (!empty($galery) && count($galery) != 0) {						
					$galery = $galery[0]['ids'];  
					$attachment_id = $galery[0];
					?>
					<div class="main-image">
						<a href='<?php the_permalink(); ?>' title="<?php the_title(); ?>">
							<?php
							$ok = wp_get_attachment_image($attachment_id);
							if (!empty($ok)) {
								echo swe_wp_get_attachment_image($attachment_id, 'full', $icon = 1, $attr = array(
									//	'src' => $src,
//									'class' => "attachment-$size $attachment_id",
									'id' => '1_1_main',
									'alt' => trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))),
								));
							}
							?>
						</a>
					</div><!-- end main-image -->
					<div class="list-image">
						<ul class="clearfix">
							<?php foreach ($galery as $attachment_id): ?>
								<?php
								$ok = wp_get_attachment_image($attachment_id);
								if (!empty($ok)) {									
									$image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
									$thumb = swe_wp_get_attachment_image_src($attachment_id, array(124, 88));
									?>
									<li>
										<img onmouseover="document.getElementById('1_1_main').src = '<?php echo $image[0]; ?>';"src="<?php echo $thumb[0]; ?>" />
									</li>
								<?php } ?>
							<?php endforeach; ?>
						</ul>
					</div><!-- end list-image -->
				<?php } ?>
            </div><!-- end slide-images -->            
            <div class="shop-detail right">            
                <?php echo do_shortcode(get_field('shop_detail'));the_field('shop_detail_2'); ?>
            </div>
        </div><!-- end shop-list -->

        <h2><?php echo Yii::t('wp_theme', 'アクセスマップ'); ?></h2>
        <div class="shop-instruction clearfix">
            <div class="map left" >
                <!--<img src="<?php // echo get_template_directory_uri()     ?>/images/map-shop-detail.png"/>-->
                <?php the_field('google_map'); ?>
            </div>
            <div class="instruction right">
                <?php the_field('shop_instruction'); ?>
            </div>
        </div>
        <div class="image clearfix">            
            <?php
            $image = get_field('image_1');
            if (!empty($image)):
                ?>
                <figure class="image-1 left">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" >
                    <figcaption><?php echo $image['alt']; ?></figcaption>
                </figure>
            <?php endif; ?>
            <?php
            $image = get_field('image_2');

            if (!empty($image)):
                ?>
                <figure class="image-2 left">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    <figcaption><?php echo $image['alt']; ?></figcaption>
                </figure>
            <?php endif; ?>

        </div>
        <?php if (get_field('link_youtube') || get_field('link_youtube2')): ?>
            <h3><?php echo Yii::t('wp_theme', 'お店までの道順'); ?></h3>
            <div class="youtube clearfix">
               <?php if (get_field('link_youtube')): ?>
                <div class="youtube-1 left">
                    <?php the_field('link_youtube'); ?>
                </div>            
				<?php endif;?>
				<?php if (get_field('link_youtube2')): ?>
                <div class="youtube-2 left">
                    <?php the_field('link_youtube_2'); ?>
                </div>            
				<?php endif;?>         
            </div>   
        <?php endif; ?>
        <?php if (get_field('google_map_see_inside')): ?>
            <h2><?php echo Yii::t('wp_theme', '店内の様子(Googleお店フォト)'); ?></h2>
            <div class="google_map_see_inside map images clearfix">            
                <?php the_field('google_map_see_inside'); ?>
            </div>
        <?php endif; ?>
        <?php
        if (get_field('shop_blog')):
            $data = get_category_data(get_category_by_slug(get_field('shop_blog')));
            ?>
            <h2><?php echo $data['cate_h1']; ?></h2>
            <div class="blog-shop clearfix">
                <?php
                // Restore original Post Data
                wp_reset_postdata();
                // WP_Query arguments	
                $args = array(
                    'category_name' => get_field('shop_blog'),
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'order' => 'ASC',
                    'orderby' => 'date',
                );

                // The Query
                $my_query = new WP_Query($args);

                // The Loop	
                if ($my_query->have_posts()) {
                    $i = 1;
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                        <div class="post-item <?php echo $i == 3 ? 'last' : "" ?>">
                            <div class="featured-post">
                                <?php if (get_post_thumbnail_id()): ?>
                                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                        <?php echo get_the_post_thumbnail(get_the_ID(), array(307, 219)); ?>
                                    </a>
                                <?php endif; ?>     
                            </div>
                            <p>
                                <a class="shop_name" href="<?php echo get_category_link($data['id']) ?>"><span ><?php echo $data['shop']; ?></span></a>
                                <span class="blog-date"><?php echo get_the_date(); ?></span>
                            </p>
                            <h3>
                                <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a> 
                            </h3>                        
                            <div class="shop-detail">                            
                                <?php get_the_excerpt() ?>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                } else {
                    // no posts found
                }
                // Restore original Post Data
                wp_reset_postdata();
                ?>
            </div>
        <?php endif; ?>
    </div><!-- end content-column-page -->

</div><!-- end container -->

<?php get_footer(); ?>