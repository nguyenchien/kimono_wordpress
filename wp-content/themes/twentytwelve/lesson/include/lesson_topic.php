<div class="lesson-topic clearfix">
    <h2 class="title-lesson-group title-lesson-group-topic">
        <span class="en"><?= $attr_shortcode['title']; ?></span>
        <?php
            if($attr_shortcode['sub_title']){
             echo '<span class="ja">'.$attr_shortcode['sub_title'].'</span>';
            }
        ?>
    </h2>
    <div class="wrap-content-lesson-topic"><?= $content; ?></div>
    <div class="wrap-button-lesson"><a class="link-more bg-F9A523" href="/lesson/reserve">着付け教室の見学・<br/>お申し込みはこちら</a></div>
</div>