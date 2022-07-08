<?php
$postName = $post->post_name;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
?>

<?php if ( !empty($my_query) ) : ?>
    <?php if($postName == 'homongi' || 'ubugi') : ?>
        <ul class="list-topics-knowledge">
            <?php foreach($my_query as $post) : ?>
                <?php
                if ($isSmartPhone) {
                    $imageSize = array('224','227');
                } else {
                    $imageSize = array('140','142');
                }
                $img = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, $imageSize ) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.$post->post_title.'">';
                ?>
                <li class="item-topics-knowledge item-topics-<?= $post->ID; ?> item-topics-<?= $post->post_name; ?> flexbox">
                    <a title="<?= $post->post_title; ?>" href="<?php the_permalink($post->ID); ?>">
                        <div class="img-topics-knowledge">
                            <?php echo $img; ?>
                        </div>
                    </a>
                    <div class="content-topics-knowledge flexbox">
                        <div class="text-topics-knowledge"><?= $post->post_title; ?></div>
                        <div class="readmore-topics-knowledge">
                            <p class="arrow-column sp"></p>
                            <p class="text-right">
                                <a title="<?= $post->post_title; ?>" href="<?php the_permalink($post->ID); ?>">もっと読む</a>
                            </p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <ul class="list-topics-knowledge">
            <?php foreach($my_query as $post) : ?>
                <?php
                if ($isSmartPhone) {
                    $imageSize = array('224','227');
                } else {
                    $imageSize = array('140','142');
                }
                $img = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, $imageSize, array('alt'=>$post->post_title)) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.$post->post_title.'">';
                ?>
                <li class="item-topics-knowledge flexbox">
                    <div class="img-topics-knowledge"><a href="<?php the_permalink($post->ID); ?>"><?php echo $img; ?></a></div>
                    <div class="content-topics-knowledge flexbox">
                        <div class="text-topics-knowledge"><a href="<?php the_permalink($post->ID); ?>"><?= $post->post_title; ?></a></div>
                        <div class="readmore-topics-knowledge">
                            <a title="<?= $post->post_title; ?>" href="<?php the_permalink($post->ID); ?>">READ MORE</a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>
