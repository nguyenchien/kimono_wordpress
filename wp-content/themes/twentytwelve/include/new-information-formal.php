<?php
    global $post, $isSmartPhone;
?>
<?php if($isSmartPhone):?>
<div class="wrap-wg-fm-information">
    <h2 class="title-general text-center title-general-icon">
        <span class="icon-title-general icon icon-formal-search"></span>
        <?php if($post->post_name == 'formal'): ?>
            <span class="text-title-general"><?php echo Yii::t('new-formal','Content'); ?><var class="sub-descript-title-general"><?php echo Yii::t('new-formal','コンテンツ'); ?></var></span>
        <?php elseif($post->post_name == 'takuhai'): ?>
            <span class="text-title-general"><?php echo Yii::t('new-formal','New arrival'); ?><var class="sub-descript-title-general"><?php echo Yii::t('new-formal','新着コンテンツ'); ?></var></span>
        <?php endif; ?>
    </h2>
    <div class="content-new-info">
        <div class="item-info item-info-work">
            <h3 class="sub-title flexbox align-items-center justify-content-center">
                <span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span>
                <?php echo Yii::t('new-formal','新着コラム'); ?>
            </h3>
            <ul class="list-info">
                <li class="sub-item-info">
                    <a href="#">
                        <div class="image"><img src="<?php echo WP_HOME; ?>/images/formal-rental/img-blog-cat.jpg" alt=""></div>
                        <p class="date">2017-08-20</p>
                        <p class="name overflow-content">「浴衣レンタル始めま</p>
                        <div class="status-view">
                            <span class="text-view">特集</span>
                            <span class="num-view">29371 view</span>
                        </div>
                        <p class="link-to">記事を読む &gt;</p>
                    </a>
                </li>
                <li class="sub-item-info">
                    <a href="#">
                        <div class="image"><img src="<?php echo WP_HOME; ?>/images/formal-rental/img-blog-cat.jpg" alt=""></div>
                        <p class="date">2017-08-20</p>
                        <p class="name overflow-content">「浴衣レンタル始めま</p>
                        <div class="status-view">
                            <span class="text-view">特集</span>
                            <span class="num-view">29371 view</span>
                        </div>
                        <p class="link-to">記事を読む &gt;</p>
                    </a>
                </li>
            </ul>
            <p class="link-more"><a href="#">コラム一覧</a></p>
        </div>

        <div class="item-info item-info-column">
            <h3 class="sub-title flexbox align-items-center justify-content-center">
                <span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span>
                <?php echo Yii::t('new-formal','新作情報'); ?>
            </h3>
            <ul class="list-info">
                <li class="sub-item-info">
                    <a href="#">
                        <div class="wrap-image">
                            <div class="sub-wrap-image">
                                <div class="image">
                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/new-product-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="wrap-text">
                            <p class="title-sub-item overflow-content">振袖 ◯◯◯</p>
                            <p class="date">2018/02/02</p>
                            <p class="desc overflow-content">説明テキストテキス<br>トテキストテキス</p>
                            <p class="link-to"><span>訪問着</span></p>
                        </div>
                    </a>
                </li>
                <li class="sub-item-info">
                    <a href="#">
                        <div class="wrap-image">
                            <div class="sub-wrap-image">
                                <div class="image">
                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/new-product-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="wrap-text">
                            <p class="title-sub-item overflow-content">振袖 ◯◯◯</p>
                            <p class="date">2018/02/02</p>
                            <p class="desc overflow-content">説明テキストテキス<br>トテキストテキス</p>
                            <p class="link-to"><span>訪問着</span></p>
                        </div>
                    </a>
                </li>
                <li class="sub-item-info">
                    <a href="#">
                        <div class="wrap-image">
                            <div class="sub-wrap-image">
                                <div class="image">
                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/new-product-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="wrap-text">
                            <p class="title-sub-item overflow-content">振袖 ◯◯◯</p>
                            <p class="date">2018/02/02</p>
                            <p class="desc overflow-content">説明テキストテキス<br>トテキストテキス</p>
                            <p class="link-to"><span>訪問着</span></p>
                        </div>
                    </a>
                </li>
                <li class="sub-item-info">
                    <a href="#">
                        <div class="wrap-image">
                            <div class="sub-wrap-image">
                                <div class="image">
                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/new-product-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="wrap-text">
                            <p class="title-sub-item overflow-content">振袖 ◯◯◯</p>
                            <p class="date">2018/02/02</p>
                            <p class="desc overflow-content">説明テキストテキス<br>トテキストテキス</p>
                            <p class="link-to"><span>訪問着</span></p>
                        </div>
                    </a>
                </li>
            </ul>
            <p class="link-more"><a href="#">新作情報一覧</a></p>
        </div>
    </div>
</div>
<?php endif; ?>