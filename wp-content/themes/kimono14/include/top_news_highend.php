<?php
    global $post, $custom_post_type;
    $args = array (
        'post_status'       => 'publish',
        'posts_per_page'    => '2',
        'order'             => 'DESC',
        'orderby'           => 'date'
    );
    if(post_type_exists('news')){
        $args['post_type'] = $custom_post_type['news'];
    }else{
        $args['category_name'] = "news";
    }
    $the_query = new WP_Query( $args );
    if($the_query -> have_posts()){
        echo '<div class="wrap-news-formal">';
        echo '<h2 class="desc-news"><a href="https://www.wagokoro.co.jp/wagokoro_news/1107" target="_blank">'.Yii::t('new_formal', '「はれのひ」被害報道を受けての弊社対応のご報告').'</a></h2>';
        echo '<div class="wrap-list-news">';
        echo '<ul class="list-news">';
        while ($the_query -> have_posts()){
            $the_query -> the_post();
            echo '<li class="item-news">';
            echo '<p class="date-news">'.get_the_date('', $post->ID).'</p>';
            echo '<p class="brief-news">'.get_the_title().'</p>';
            echo '</li>';
        }
        echo '</ul>';
        echo '<p class="read-more"><a href="'.esc_url(home_url('news')).'">'.Yii::t('new_formal', 'and more... >').'</a></p>';
        echo '</div>';
        echo '</div>';
    }
    wp_reset_postdata();