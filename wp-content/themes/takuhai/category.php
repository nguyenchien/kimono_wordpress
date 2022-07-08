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
$cat = get_query_var('cat');
$cate = get_category($cat);
// kiem tra cat_tpl hien tai
$cat_tpl = get_field('cat_tpl', $cate);

$parents = get_ancestors($cat,'category');
if(!empty($parents) && empty($cat_tpl)){		
	$cat = end($parents);	
	$cate = get_category($cat);
	// su dung cat_tpl cua cha cap cao nhat
	$cat_tpl = get_field('cat_tpl', $cate);
}

get_template_part('category_tpl/cat',empty($cat_tpl) ? 'yukata-column' : $cat_tpl);
