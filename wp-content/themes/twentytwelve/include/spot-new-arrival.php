<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/26/2018
 * Time: 9:01 AM
 */

global $language;
$language = Yii::app()->language;
?>
<?php if ($posts) : ?>
    <div class="wrap-new-arrival wrap-new-arrival-column">
        <div class="title-general text-center">
            <span class="text-title-general"><?php echo Yii::t('wp_theme','New arrival');?></span>
            <h3 class="sub-text-title"><?php echo Yii::t('wp_theme','着物レンタル<br>新着コラム');?></h3>
        </div>
        <div class="new-arrival" id="new-arrival">
            <?php
            $css_special = array('first', 'second', 'third');
            $numb_ranking = 0;
            ?>
            <?php foreach ($posts as $post): ?>
                <?php
                $numb_ranking ++;
                $img = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, 'thumbnail', array('class'=>'lazy-loaded')) : '<img data-src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                ?>
                <div class="arrival-item" style="min-height: 150px;">
                    <a href="<?php echo get_permalink($post->ID); ?>" class="arrival-wrap-item">
                        <div class="new-arrival-wrap-img">
                            <div class="new-arrival-ranking <?php if ($numb_ranking <= 3) { echo $css_special[$numb_ranking-1];}?>">
                                <div class="numb-ranking"><?php echo $numb_ranking;?></div>
                            </div>
                            <?php echo $img; ?>
                        </div>
                        <div class="new-arrival-desc">
                            <div class="new-arrival-name"><?php echo get_the_title($post->ID); ?></div>
                            <?php
                                $arrival_brief = get_page($post->ID);
                                if ($arrival_brief) {
                            ?>
                            <?php if($language == 'ja' || $language == 'tw' || $language == 'cn' || $language == 'th'): ?>
                                <div class="new-arrival-brief new-arrival-brief-custom"><?php echo wp_trim_words( $arrival_brief->post_content, 37, ' ...' ); ?></div>
                            <?php else: ?>
                                <div class="new-arrival-brief new-arrival-brief-custom"><?php echo wp_trim_words( $arrival_brief->post_content, 20, ' ...' ); ?></div>
                            <?php endif; ?>
                            <?php } ?>
<!--                            <div class="new-arrival-info">-->
<!--                                <span class="feature">特集</span>-->
<!--                                <span class="customer-views">--><?php //echo $args['show_post_views'] ? number_format_i18n(pvc_get_post_views($post->ID)) : '' ?><!-- view</span>-->
<!--                            </div>-->
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="new-arrival-show-more"><a href="<?php echo home_url(); ?>/spot">and more... ></a></div>
<!--        <div class="new-arrival-nav"></div>-->
    </div>
<?php else: ?>
    <p style="margin-bottom: 20px;text-align: center;font-size: 17px;"><?= Yii::t('wp_theme','申し訳ありません、現在準備中です', array(), null);?></p>
<?php endif; ?>
