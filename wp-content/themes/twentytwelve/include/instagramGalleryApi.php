<?php
$isFrontPage = is_front_page();
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$template = isset($attr['template']) ? $attr['template'] : '';
?>

<?php if($template == 'gallery_v2'):?>
    <?php if($isSmartPhone):?>
        <style>
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery{
                margin: 0 0 20px 0;
            }
            .wrap-slider-gallery .slider-gallery{
                padding: 0 20px;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .gallery-ins-item .wrap-gallery-img{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .gallery-ins-item .wrap-gallery-img{
                height: 250px;
                width: 100%;
                border: 1px solid #ccc;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .wrap-gallery-img img{
                max-height: 100%;
                max-width: 100%;
            }
            .wrap-slider-gallery .slick-prev,
            .wrap-slider-gallery .slick-next {
                width: 30px;
                height: 30px;
            }
            .wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery .slick-next:before {
                border: none;
                color: #f29544;
                font-size: 24px;
                font-family: inherit;
                -webkit-transform: rotate(0);
                -ms-transform: rotate(0);
                transform: rotate(0);
            }
            .wrap-slider-gallery-dazaifu.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-dazaifu.wrap-slider-gallery .slick-next:before{
                color: #EA6374;
            }
            .wrap-slider-gallery-kamakura.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-kamakura.wrap-slider-gallery .slick-next:before{
                color: #c17954;
            }
            .wrap-slider-gallery-kanazawa.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-kanazawa.wrap-slider-gallery .slick-next:before{
                color: #958c12;
            }
            .wrap-slider-gallery-kurashiki.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-kurashiki.wrap-slider-gallery .slick-next:before{
                color: #336666;
            }
            .wrap-slider-gallery-shinjuku-station.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-shinjuku-station.wrap-slider-gallery .slick-next:before{
                color: #d84d96;
            }
            .wrap-slider-gallery .slick-prev:before {
                content: '\3008';
            }
            .wrap-slider-gallery  .slick-next:before {
                content: '\3009';
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .slick-prev{
                left: -20px;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .slick-next{
                right: -20px;
            }
        </style>
    <?php else:?>
        <style>
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery{
                margin-bottom: 30px;
                width: 100%;
            }
            .wrap-slider-gallery .slider-gallery {
                padding: 0 35px;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .gallery-ins-item{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                margin: 0 0 0 -10px;
                height: 420px;
                flex-direction: row;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .gallery-ins-item .wrap-gallery-img{
                width: calc(100% * 1/2 - 10px);
                height: 100%;
                margin-left: 10px;
                border: 1px solid #ccc;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .wrap-gallery-img img{
                display: block;
                max-height: 100%;
                max-width: 100%;
                -o-object-fit: contain;
                object-fit: contain;
            }
            .wrap-slider-gallery .slick-prev,
            .wrap-slider-gallery .slick-next {
                width: 40px;
                height: 40px;
            }
            .wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery .slick-next:before {
                border: none;
                color: #f29544;
                font-size: 35px;
                font-family: inherit;
                -webkit-transform: rotate(0);
                -ms-transform: rotate(0);
                transform: rotate(0);
                width: initial;
                height: initial;
            }
            .wrap-slider-gallery-dazaifu.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-dazaifu.wrap-slider-gallery .slick-next:before{
                color: #EA6374;
            }
            .wrap-slider-gallery-kamakura.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-kamakura.wrap-slider-gallery .slick-next:before{
                color: #c17954;
            }
            .wrap-slider-gallery-kanazawa.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-kanazawa.wrap-slider-gallery .slick-next:before{
                color: #958c12;
            }
            .wrap-slider-gallery-kurashiki.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-kurashiki.wrap-slider-gallery .slick-next:before{
                color: #336666;
            }
            .wrap-slider-gallery-shinjuku-station.wrap-slider-gallery .slick-prev:before,
            .wrap-slider-gallery-shinjuku-station.wrap-slider-gallery .slick-next:before{
                color: #d84d96;
            }
            .wrap-slider-gallery .slick-prev:before {
                content: '\3008';
            }
            .wrap-slider-gallery  .slick-next:before {
                content: '\3009';
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .slick-prev {
                left: -25px;
            }
            .wrap-gallery-shop-fm-v2 .wrap-slider-gallery .slick-next {
                right: -25px;
            }
        </style>
    <?php endif ?>
<?php elseif($template == 'gallery_v1'):?>
    <?php if($isSmartPhone):?>
        <style>
            .wrap-slider-gallery .slider-gallery {
                padding: 0 30px;
                margin-bottom: 20px;
            }
            .wrap-slider-gallery .gallery-ins-item {
                display: -webkit-box!important;
                display: -ms-flexbox!important;
                display: flex!important;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row!important;
                flex-direction: row!important;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin: 0 0 0 -10px;
            }
            .wrap-slider-gallery .gallery-ins-item .wrap-gallery-img {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                width: 100%;
                margin-left: 10px;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                height: 305px;
                border: 1px solid #ccc;
            }
            .wrap-slider-gallery .wrap-gallery-img img {
                -o-object-fit: contain;
                object-fit: contain;
                max-width: 100%;
                max-height: 100%;
            }
            .slider-gallery .slick-next:before,
            .slider-gallery .slick-prev:before {
                color: #000;
                content: '';
                border-width: 0 0 2px 2px;
                border-style: solid;
                width: 15px;
                height: 15px;
                display: inline-block;
            }
            .slider-gallery .slick-prev:before {
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
            }
            .slider-gallery .slick-next:before {
                -webkit-transform: rotate(-135deg);
                -ms-transform: rotate(-135deg);
                transform: rotate(-135deg);
            }
            .slider-gallery .slick-prev{
                left: 10px;
            }
            .slider-gallery .slick-next{
                right: 10px;
            }
        </style>
    <?php else:?>
        <style>
            .wrap-slider-gallery .slider-gallery{
                padding: 0 40px;
                margin-bottom: 30px;
            }
            .wrap-slider-gallery .gallery-ins-item {
                display: -webkit-box!important;
                display: -ms-flexbox!important;
                display: flex!important;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row!important;
                flex-direction: row!important;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin: 0 0 0 -10px;
            }
            .wrap-slider-gallery .gallery-ins-item .wrap-gallery-img {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                margin-left: 10px;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                width: calc(100% * 1/2 - 10px);
                height: 320px;
                border: 1px solid #ccc;
            }
            .wrap-slider-gallery .wrap-gallery-img img {
                -o-object-fit: contain;
                object-fit: contain;
                max-width: 100%;
                max-height: 100%;
            }
            .slider-gallery .slick-next:before,
            .slider-gallery .slick-prev:before {
                color: #000;
                content: '';
                border-width: 0 0 3px 3px;
                border-style: solid;
                width: 15px;
                height: 15px;
                display: inline-block;
            }
            .slider-gallery .slick-prev:before {
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
            }
            .slider-gallery .slick-next:before {
                -webkit-transform: rotate(-135deg);
                -ms-transform: rotate(-135deg);
                transform: rotate(-135deg);
            }
            .slider-gallery .slick-prev{
                left: 0;
            }
            .slider-gallery .slick-next{
                right: 0;
            }
        </style>
    <?php endif ?>
<?php elseif($template == 'gallery_v3'):?>
    <?php if($isSmartPhone):?>
        <style>
            .wrap-instagram-gallery{
                padding: 0 30px;
                margin-bottom: 30px;
            }
            .wrap-instagram-gallery .gallery-ins-item{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex !important;
                margin: 0 0 0 -10px;
            }
            .wrap-instagram-gallery .gallery-ins-item .wrap-gallery-img {
                width: calc(100% * 1/2 - 10px);
                height: 100%;
                margin-left: 10px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            .wrap-gallery-img .img{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                height: 150px;
                border: 1px solid #8f8f8f;
                margin-bottom: 10px;
                cursor: pointer;
            }
            .wrap-gallery-img .img img {
                display: block;
                max-height: 100%;
                max-width: 100%;
                -o-object-fit: contain;
                object-fit: contain;
            }
            .wrap-gallery-img .ins-info{
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .wrap-gallery-img .ins-info p{
                color: #8f8f8f;
                font-size: 12px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .wrap-gallery-img .ins-info p:not(:last-child){
                margin-right: 10px;
            }
            .wrap-gallery-img .ins-info p .icon{
                display: inline-block;
                width: 10px;
                margin-right: 3px;
            }
            .wrap-instagram-gallery .slick-prev:before,
            .wrap-instagram-gallery .slick-next:before {
                content: '';
                display: inline-block;
                border-style: solid;
                border-width: 1px 1px 0 0;
                border-color: #8f8f8f;
                width: 15px;
                height: 15px;
            }
            .wrap-instagram-gallery .slick-prev:before {
                -webkit-transform: rotate(-135deg) skew(7deg, 7deg);
                -ms-transform: rotate(-135deg) skew(7deg, 7deg);
                transform: rotate(-135deg) skew(7deg, 7deg);
            }
            .wrap-instagram-gallery .slick-next:before {
                -webkit-transform: rotate(45deg) skew(7deg, 7deg);
                -ms-transform: rotate(45deg) skew(7deg, 7deg);
                transform: rotate(45deg) skew(7deg, 7deg);
            }
            .gallery-overlay{
                position: fixed;
                top: 0;
                left: 0;
                z-index: 99999;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
            }
            .gallery-overlay .gallery-popup{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                height: 80%;
                width: 80%;
            }
            .gallery-popup img{
                display: block;
                max-height: 100%;
                max-width: 100%;
                -o-object-fit: contain;
                object-fit: contain;
            }
            .gallery-popup .close-popup{
                font-weight: bold;
                font-size: 24px;
                position: absolute;
                right: 10px;
                top: 10px;
                cursor: pointer;
            }
        </style>
    <?php else:?>
        <style>
            .wrap-instagram-gallery{
                padding: 0 50px;
                margin-bottom: 50px;
            }
            .wrap-instagram-gallery .gallery-ins-item{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex !important;
                margin: 0 0 0 -10px;
            }
            .wrap-instagram-gallery .gallery-ins-item .wrap-gallery-img {
                width: calc(100% * 1/3 - 10px);
                height: 100%;
                margin-left: 10px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            .wrap-gallery-img .img{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                height: 300px;
                border: 1px solid #8f8f8f;
                margin-bottom: 10px;
                cursor: pointer;
            }
            .wrap-gallery-img .img img {
                display: block;
                max-height: 100%;
                max-width: 100%;
                -o-object-fit: contain;
                object-fit: contain;
            }
            .wrap-gallery-img .ins-info{
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .wrap-gallery-img .ins-info p{
                color: #8f8f8f;
                font-size: 14px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .wrap-gallery-img .ins-info p:not(:last-child){
                margin-right: 15px;
            }
            .wrap-gallery-img .ins-info p .icon{
                display: inline-block;
                width: 15px;
                margin-right: 3px;
            }
            .wrap-instagram-gallery .slick-prev:before,
            .wrap-instagram-gallery .slick-next:before {
                content: '';
                display: inline-block;
                border-style: solid;
                border-width: 2px 2px 0 0;
                border-color: #8f8f8f;
                width: 20px;
                height: 20px;
            }
            .wrap-instagram-gallery .slick-prev:before {
                -webkit-transform: rotate(-135deg) skew(7deg, 7deg);
                -ms-transform: rotate(-135deg) skew(7deg, 7deg);
                transform: rotate(-135deg) skew(7deg, 7deg);
            }
            .wrap-instagram-gallery .slick-next:before {
                -webkit-transform: rotate(45deg) skew(7deg, 7deg);
                -ms-transform: rotate(45deg) skew(7deg, 7deg);
                transform: rotate(45deg) skew(7deg, 7deg);
            }
            .gallery-overlay{
                position: fixed;
                top: 0;
                left: 0;
                z-index: 99999;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
            }
            .gallery-overlay .gallery-popup{
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                height: 80%;
            }
            .gallery-popup img{
                display: block;
                max-height: 100%;
                max-width: 100%;
                -o-object-fit: contain;
                object-fit: contain;
            }
            .gallery-popup .close-popup{
                font-weight: bold;
                font-size: 30px;
                position: absolute;
                right: 20px;
                top: 20px;
                cursor: pointer;
            }
        </style>
    <?php endif ?>
<?php endif ?>

<?php
$InstagramKimono = new InstagramKimono();
$instagramData = array();
$arr = array();

    try {
        $instagramData = $InstagramKimono->getMedias(false);
        $count = 1;
        if ($template == 'gallery_v3') {
            echo '<div class="gallery-overlay" style="display: none"><div class="gallery-popup"><span class="close-popup">&times;</span></div></div>';
        }
        echo '<div class="slider-gallery" id="slider-gallery">';
        if ($template == 'gallery_v1' || $template == 'gallery_v2') {
            if($isSmartPhone){
                foreach ($instagramData as $row) {
                    $image_link = $row->media_url;
                    echo '<div class="gallery-ins-item">
                    <div class="wrap-gallery-img"><img data-lazy="' . $image_link . '"/></div>
                  </div>';
            }
        } else{
            foreach ($instagramData as $row){
                $image_link = $row->media_url;
                if ($count == 1) {
                    echo '<div class="gallery-ins-item">';
                }
                echo '<div class="wrap-gallery-img"><img data-lazy="' . $image_link . '"/></div>';

                if ($count == 2) {
                    echo '</div>';
                    $count = 0;
                }

                    $count++;
                }
            }
        } elseif ($template == 'gallery_v3') {
            if($isSmartPhone){
                foreach ($instagramData as $row){
                    $image_link = $row->media_url;
                    $comments = $row->comments_count;
                    $likes = $row->like_count;
                    if ($count == 1) {
                        echo '<div class="gallery-ins-item">';
                    }
                    echo '<div class="wrap-gallery-img">
                        <div class="img"><img data-lazy="' . $image_link . '"/></div>
                        <div class="ins-info flexbox">
                            <p>
                                <span class="icon">
                                    <img src=" '. WP_HOME . '/images/new-kimono-v3/icon-heart.svg">
                                </span> '. $comments . '
                            </p>
                            <p>
                                <span class="icon">
                                    <img src=" '. WP_HOME . '/images/new-kimono-v3/icon-comment.svg">
                                </span> '. $likes . '
                            </p>
                        </div>
                      </div>';

                    if ($count == 2) {
                        echo '</div>';
                        $count = 0;
                    }

                    $count++;
                }
            } else{
                foreach ($instagramData as $row){
                    $image_link = $row->media_url;
                    $comments = $row->comments_count;
                    $likes = $row->like_count;
                    if ($count == 1) {
                        echo '<div class="gallery-ins-item">';
                    }
                    echo '<div class="wrap-gallery-img">
                        <div class="img"><img data-lazy="' . $image_link . '"/></div>
                        <div class="ins-info flexbox">
                            <p>
                                <span class="icon">
                                    <img src=" '. WP_HOME . '/images/new-kimono-v3/icon-heart.svg?ver=20200429">
                                </span> '. $likes . '
                            </p>
                            <p>
                                <span class="icon">
                                    <img src=" '. WP_HOME . '/images/new-kimono-v3/icon-comment.svg?ver=20200429">
                                </span> '. $comments . '
                            </p>
                        </div>
                      </div>';

                    if ($count == 3) {
                        echo '</div>';
                        $count = 0;
                    }

                    $count++;
                }
            }
        }
        echo '</div>';
    } catch (Exception $ex) {
        $instagramData = array();
    }
    ?>
<script>
    $(document).ready(function(){
        $('.slider-gallery').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            lazyLoad: 'ondemand',
            draggable: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                      draggable: true
                    }
                }
            ]
        });



        <?php if($template == 'gallery_v3') : ?>
            // Handle click outside popup
            $(document).click(function(e){
                if (!$(e.target).closest('.gallery-popup img, .wrap-gallery-img .img').length) {
                    $('.gallery-popup .close-popup').triggerHandler('click');
                }
            });

            $('.wrap-gallery-img .img').on('click', '', function(){
                var imageUrl = $(this).find('img').attr('src');

                if ($('.gallery-overlay .gallery-popup img').length) {
                    $('.gallery-overlay .gallery-popup img').attr('src', imageUrl);
                } else {
                    $('.gallery-overlay .gallery-popup').append('<img src="' + imageUrl + '" >');
                }

                $('.gallery-overlay').fadeIn('fast');
                $('html, body').css('overflow', 'hidden');

                var topBtn = ($('.gallery-popup').height() -  $('.gallery-popup img').height()) / 2 + 10;
                $('.gallery-popup .close-popup').css('top', topBtn + 'px');
            });

            $('.gallery-popup .close-popup').on('click', function(){
                $('.gallery-overlay').fadeOut('fast');
                $('html, body').css('overflow', '');
            });

        <?php endif; ?>
    })
</script>
