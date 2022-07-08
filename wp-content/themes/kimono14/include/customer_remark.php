<ul>
    <?php
    global $post;
        if( $query->have_posts() ) :
            while( $query->have_posts() ) :
                $query->the_post();
                $shortDescr = get_field("short_description");
    ?>
        <li class="clearfix">
            <?php
                $noImg = false;
                if (has_post_thumbnail()){
                    $noImg = true;
                    echo "<div class='image'>";
                        swe_the_post_thumbnail($post);
                    echo "</div>";
                }
            ?>
            <div class="info <?php echo ($noImg)?'have-img':'no-img'; ?>">
                <h3><?= the_title(); ?></h3>
                <p class="desc"><?php echo $shortDescr; ?></p>
                <p class="link"><a href="<?php the_permalink(); ?>">&gt;&gt;もっと見る</a></p>
            </div>
        </li>
    <?php endwhile; endif; ?>
</ul>