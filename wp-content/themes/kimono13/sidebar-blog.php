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
global $kimono;
$blog = $kimono['blog'];
$current_cate = $kimono['current_cate'];
if($current_cate->parent !=0){
	$parent = $current_cate->parent;
}else{
	$parent = $current_cate->term_id;
}
?>
<div class="box-sb-blog">
    <h2 class="tn-title-cat-blog"><?php echo Yii::t( 'wp_theme', '店舗一覧') ?></h2>
    <?php
    $categories_child = getCategoriesInParent($parent);
    ?>

    <ul id="blog-childs">
        <?php
        if (count($categories_child) > 0) {
            foreach ($categories_child as $child) {
                $class = '';
                if(is_single() && in_category($child->slug)){
                    $class = 'active';
                }elseif(is_category() && $child->term_id == $current_cate->term_id){
                    $class = 'active';
                }

                echo '<li class="'.$class.' '.$child->slug.' ">'
                        . '<a class="'.$child->slug.'" href="' . get_category_link($child->term_id) . '" title="' . get_cat_name($child->term_id) . '"> ' . get_cat_name($child->term_id)
                        . '</a> </li> ';
            }
        }
        ?>
    </ul>
</div>
<div class="box-sb-blog">
    <h2 class="tn-title-cat-blog"><?php echo Yii::t('wp_theme', '最近の記事')?></h2>
    <ul class="swe_latest_blog" id="swe_latest_blog">
        <?php
        $recent_posts = getNewPostList($blog->term_id);
        foreach ($recent_posts as $recent) {
            echo '<li>'
            . '<a href="' . get_permalink($recent->ID) . '" title="' . get_the_title($recent->ID) . '">' . get_the_title($recent->ID) . ''
                    . '</a> </li> ';
        }
        ?>
    </ul>
</div>