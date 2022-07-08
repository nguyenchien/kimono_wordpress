<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post;
$taxonomies = get_post_taxonomies();
$taxonomy = $taxonomies[0];
$terms = wp_get_post_terms($post->ID, $taxonomy ); 
$cate = $terms[0];
$cat_tpl = get_field('cat_tpl', $cate);

$parents = get_ancestors($cate->term_id,$taxonomy);
if(!empty($parents) && empty($cat_tpl)){
	$cate = get_term(end($parents), $taxonomy);
	$cat_tpl = get_field('cat_tpl', $cate);
}

get_template_part('single_tpl/single',!empty($cat_tpl) ? $cat_tpl : 'blog' );
