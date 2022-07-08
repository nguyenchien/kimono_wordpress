<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h2>スタッフブログ /blog/</h2>
<div class="content clearfix">
    <?php
    $ifqueryloop = array(
                            'category__in'      => array(7, 8, 9, 10),
                            'posts_per_page'    => 3
                        );
    $the_query = new WP_Query($ifqueryloop);
    $i=1;
    while ($the_query -> have_posts()){
        $the_query -> the_post();
        if($i == 1){$addClass = 'alpha';}
        elseif($i == 3){ $addClass = 'omega'; }
        else{ $addClass = ''; }
    ?>
    <div class="one-third column <?=$addClass?>">
        <div class="image">
            <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?></a>
        </div>
        <div class="text">
            <p class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
            <p class="date"><?php echo get_the_date('', $post->ID); ?></p>
        </div>
    </div><!-- end item -->
    <?php $i++; } ?>
   
</div><!-- end content -->