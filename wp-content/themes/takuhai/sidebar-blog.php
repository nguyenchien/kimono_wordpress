<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post, $custom_post_type, $custom_taxonomies;
?>

<div class="box-sb-blog">
    <h2 class="tn-title-cat-blog"><?php echo Yii::t('wp_theme', '最近の記事')?></h2>
    <ul class="swe_latest_blog" id="swe_latest_blog">
        <?php

		$args = array(
			'post__not_in' => array($post->ID)
		);
		if(post_type_exists($custom_post_type['blog']) && taxonomy_exists($custom_taxonomies['blog'])){
			$args['post_type'] = $custom_post_type['blog'];
			$args[$custom_taxonomies['blog']] = 'takuhai-blog';
		}
        // The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			echo '<ul>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
            echo '<li>'
				. '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' 
						. get_the_title() 
                    . '</a> </li> ';
        }
			echo '</ul>';
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata();
       
        ?>
    </ul>
</div>
<div class="banner-square-blog">
	<?php getToppageTopics('square-banner-toppage');?>
</div><!-- end banner-square-blog -->