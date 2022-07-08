<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h3>News</h3>
<ul>
    <?php
    $the_query = new WP_Query( 'cat=11&showposts=3' );
    
    while ($the_query -> have_posts()){
        $the_query -> the_post(); ?>
        <li>
            <?php //echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            <?php echo get_the_date('', $post->ID); ?>	
            <?php //the_excerpt(__('(more…)')); ?>
        </li>
        
    <?php }?>
</ul>