<ul>
<?php
    if( $query->have_posts() ) :
        while( $query->have_posts() ) :
            $query->the_post();
?>
    <li class="clearfix">
	    <p class="date"><?= get_the_date(); ?></p>
        <p class="title"><span><?php the_title(); ?></span></p>
        <div class="desc"><?php the_content(); ?></div>
    </li>
<?php endwhile; endif; ?>
</ul>