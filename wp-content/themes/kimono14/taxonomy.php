<?php
$taxonomy = get_query_var('taxonomy');	
$term = term_exists(get_query_var('term'), $taxonomy);	
$cate = get_term($term['term_id'], $taxonomy);

// kiem tra cat_tpl hien tai
$cat_tpl = get_field('cat_tpl', $cate);
$parents = get_ancestors($cate->term_id,$taxonomy);
if($parents && empty($cat_tpl)){			
	$cat = end($parents);	
	$cate = get_term($cat, $taxonomy);
	// su dung cat_tpl cua cha cap cao nhat
	$cat_tpl = get_field('cat_tpl',$cate);
}

get_template_part('taxonomy_tpl/tax',empty($cat_tpl) ? 'blog-main' : $cat_tpl);