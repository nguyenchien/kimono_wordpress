<?php
    $isFrontPage = is_front_page();
    $detect = Yii::app()->mobileDetect;
    $isSmartPhone = $detect->isSmartPhone();
    $page_template_current = get_page_template();
    $page_template_name = basename($page_template_current, '.php');
?>

<?php
    $InstagramKimono = new InstagramKimono();
    $instagramData = array();
    $arr = array();

    try {
        $instagramData = $InstagramKimono->getMedias(false);
        $count = 1;
        echo '<div class="slider-gallery" id="slider-gallery">';
        if($isSmartPhone){
            foreach ($instagramData as $row) {
                $image_link = $row->media_url;
                echo '<div class="gallery-ins-item">
                    <div class="wrap-gallery-img"><img data-src="' . $image_link . '"/></div>
                  </div>';
            }
        } else{
            if($page_template_name == 'new-access-child-page-v3-ginza' || $page_template_name == 'new-access-child-page-v3'){
                foreach ($instagramData as $row){
                    $image_link = $row->media_url;
                    if ($count == 1) {
                        echo '<div class="gallery-ins-item">';
                    }
                    echo '<div class="wrap-gallery-img"><img data-src="' . $image_link . '"/></div>';

                    if ($count == 4) {
                        echo '</div>';
                        $count = 0;
                    }

                    $count++;
                }
            } else{
                foreach ($instagramData as $row){
                    $image_link = $row->media_url;
                    if ($count == 1) {
                        echo '<div class="gallery-ins-item">';
                    }
                    echo '<div class="wrap-gallery-img"><img data-src="' . $image_link . '"/></div>';

                    if ($count == 2) {
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

