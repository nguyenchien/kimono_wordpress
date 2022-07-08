<?php
/**
 * Template Name: Clear Cache WP Page
 */
wp_head();
if(isset($_GET['key'])){
	$key = $_GET['key'];
    if($key=='noindex'){
        set_blog_noindex(isset($_GET['debug']) ? true : false, isset($_GET['update']) ? true : false);
    }else{
        echo $key .'<br>';
        delete_transient($key);
        echo get_transient( $key ).'<br>';
        echo "đã xóa thành công";
    }
}
global $post;
the_content();

?>