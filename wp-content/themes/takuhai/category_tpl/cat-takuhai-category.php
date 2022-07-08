<?php
/**
 * The template for displaying Category SPOT pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
$cate = get_queried_object();
$category_data = get_category_data($cate);
$page = get_page_by_path('takuhai');
?>
<div class="container clearfix">
	<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns" style="overflow-x: auto;">
      <span prefix="v: http://rdf.data-vocabulary.org/#" style="width: 261px;">
         <span typeof="v:Breadcrumb" class="item"><a href="<?php echo esc_url(home_url());?>" rel="v:url" property="v:title">TOP</a></span>
         <span class="separator"> &gt; </span>
         <span typeof="v:Breadcrumb" class="item"><a href="<?php echo esc_url(home_url('takuhai'));?>" rel="v:url" property="v:title"><?php echo $page->post_name; ?></a></span>
         <span class="separator"> &gt; </span>
         <span typeof="v:Breadcrumb" class="item"><span class="breadcrumb_last" property="v:title"><?php echo $category_data['name'];?></span></span>
      </span>
	</div>
	<?php
//	if (function_exists('yoast_breadcrumb')) {
//		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
//	}
	?>
	<?php
//var_dump($category_data);
	?>
	<div id="category-info" class="clearfix">
		<div class="show-pic-scene">
			<img src="<?php echo $category_data['img_src']; ?>" style="max-height: 300px;" />
		</div>
		<div class="show-info-scene">
			<h1><?php echo html_entity_decode($category_data['name']); ?></h1>
			<p><?php echo $category_data['description'] ?></p>
		</div>
	</div>
</div>