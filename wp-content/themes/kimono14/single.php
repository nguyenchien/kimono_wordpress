<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post;
$data = getTermData();
$taxonomy = $data['taxonomy'];
$cate = $data['current_cate'];
$cat_tpl = get_field('cat_tpl', $cate);

$parents = get_ancestors($cate->term_id,$taxonomy);
if(!empty($parents) && empty($cat_tpl)){
    $cate = get_term(end($parents), $taxonomy);
    $cat_tpl = get_field('cat_tpl', $cate);
}
if ('lesson-news' == $post->post_type) {
	get_template_part('lesson/single', 'news' );
	return;
}
get_template_part('single_tpl/single',!empty($cat_tpl) ? $cat_tpl : 'blog' );
