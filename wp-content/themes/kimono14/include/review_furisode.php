<?php
global $post;
$args = array (
    'post_status'            => 'publish',
    'posts_per_page'         => '3',
    'order'                  => 'DESC',
    'orderby'                => 'date',
);
if(post_type_exists('review-furisode')){
    $args['post_type'] = 'review-furisode';
}
$the_query = new WP_Query( $args );
if($the_query -> have_posts()):
    echo '<div class="box-review-furisode">';
    echo '<h2 class="title-furisode">'.Yii::t('wp_theme', 'お客様の声').'</h2>';
    echo '<ul>';
    while ($the_query -> have_posts()){
        $the_query -> the_post();
        echo '<li>';
        echo '<p class="date">'.get_the_date('', $post->ID).'</p>';
        echo '<p class="title">';
        the_title();
        echo '</p>';
        echo '<p class="desc">'.$post->post_content.'</p>';
        echo '</li>';
    }
    echo '</ul>';
    //echo '<p><a class="top-block-news-readmove kimono" href="'. WP_HOME .'/news" title="'.Yii::t('wp_theme','これまでのニュースを一覧を見る').'"> '.Yii::t('wp_theme','これまでのニュースを一覧を見る').'</a></p>';
    echo '<p class="more"><a href="'. esc_url(home_url('/seijin/review')) .'" title="もっと見る">もっと見る</a></p>';
    echo '</div>';
endif;
wp_reset_postdata();
?>

<style type="text/css">
    .box-review-furisode{
        margin-bottom: 20px;
    }
    .box-review-furisode ul{
        padding: 0 7px;
        box-sizing: border-box;
    }
    .box-review-furisode ul li{
        margin-bottom: 10px;;
    }
    .box-review-furisode ul li .date{
        color: #c7c7c7;
        font-size: 16px;
        font-weight: normal;
        text-align: left !important;
    }
    .box-review-furisode ul li .title{
        font-size: 18px;
        font-weight: bold;
        color: #000;
    }
    .box-review-furisode ul li .desc{
        color: #000;
        font-size: 14px;
    }
    .box-review-furisode .more{
        text-align: center;
        padding-bottom: 10px;
        margin-bottom: 10px;
        border-bottom: solid 1px #ebebeb;
    }
    .box-review-furisode .more a{
        color: #646464;
        text-align: center;
        font-size: 18px;
        display: block;
    }

    @media (min-width: 750px) {
        .box-review-furisode h2{
            padding: 0 13px;
        }
        .box-review-furisode h2 span{
            font-size: 30px;
        }
        .box-review-furisode ul li .title{
            font-size: 20px;
        }
    }
</style>
