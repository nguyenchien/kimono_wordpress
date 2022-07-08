<?php
    global $post, $custom_post_type, $is_yukata;
    $linkNews = "news";
    $args = array (
        'post_status'       => 'publish',
        'posts_per_page'    => '3',
        'order'             => 'DESC',
        'orderby'           => 'date'
    );
    if($is_yukata){
        $args = array (
            'post_status'            => 'publish',
            'posts_per_page'         => '3',
            'order'                  => 'DESC',
            'orderby'                => 'date',
            'meta_key'				 => 'for_yukata',
            'meta_value'             => true
        );
        $linkNews = "yukata/news";
    }

    if(post_type_exists('news')){
        $args['post_type'] = $custom_post_type['news'];
    }else{
        $args['category_name'] = "news";
    }
    $the_query = new WP_Query( $args );

    if($the_query -> have_posts()){
        echo '<ul class="list-news">';
        while ($the_query -> have_posts()){
            $the_query -> the_post();
            echo '<li>';
            echo '<a style="display: flex" href="'.get_permalink().'">';
            echo '<p class="date-news">'.get_the_date('m.d.Y', $post->ID).'</p>';
            echo '<p class="brief-news">'.get_the_title().'</p>';
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo '<p class="read-more"><a href="'.esc_url(home_url($linkNews)).'">'.Yii::t('new_formal', 'see more...').'</a></p>';

    }
    wp_reset_postdata();
?>
