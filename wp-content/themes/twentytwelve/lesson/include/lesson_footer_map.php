<?php
global $isSmartPhone;
if($isSmartPhone){ ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.sonar.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/google-map.js"></script>
<?php } ?>

<div class="footer-taking">
    <div class="container-padding">
        <h2 class="title-taking">和心流着付け教室は東京・大阪・京都の4店舗!<br />駅から徒歩5分以内!! 駅近楽チンご来店♪</h2>
        <div class="wrap-map-top" id="highend-kyoto-map">Map</div>
        <div class="wrap-area clearfix">
            <div class="area-f kyoto">
                <div class="area-info clearfix">
                    <div class="area-icon"><span class="fa-icon icon-icon-kyoto"></span></div>
                    <div class="info">
                        <h3>京都駅前京都タワー店</h3>
                        <h5>京都駅徒歩2分!! 京都タワービル3F</h5>
                        <p class="text">京都市下京区烏丸通七条下ル東側東塩小路町721-1
                            京都タワービル3F</p>
                    </div>
                    <div class="info-bottom">
                        <p class="top-text"><span class="fa-icon icon-dot-f"></span><span class="text">お店への行き方</span></p>
                        <p class="bottom-text">京都駅より徒歩2分。烏丸中央口を出て正面の京都タワービル3Fにございます。</p>
                    </div>
                </div>
            </div><!--end area-f-->
            <div class="area-f gionshijo">
                <div class="area-info">
                    <div class="area-icon"><span class="fa-icon icon-icon-gionshijo icon-fa-gionshijo-01"></span></div>
                    <div class="info">
                        <h3>祇園四条店</h3>
                        <h5>京阪祇園四条駅徒歩１分! 八坂神社より徒歩5分!!</h5>
                        <p class="text">京都市東山区四条大和大路下る西側大和町7
                            祇園四条十彩ビル3F</p>
                    </div>
                    <div class="info-bottom">
                        <p class="top-text"><span class="fa-icon icon-dot-f"></span><span class="text">お店への行き方</span></p>
                        <p class="bottom-text">京阪祇園四条駅6番出口を東へ約60m。
                            四条大和大路通を右（南）へ曲がり、右側（西側）のビルの3Fです。</p>
                    </div>
                </div>
            </div><!--end area-f-->
        </div><!--end wrap-area-->
        <div class="wrap-area clearfix">
            <div class="area-f osaka clearfix wrap-cont map-google map-asakusa">
                <div class="map-area" id="map-google-osaka">Map Osaka</div>
                <div class="area-info">
                    <div class="area-icon"><span class="fa-icon icon-icon-shinsaibashi-06"></span></div>
                    <div class="info">
                        <h3>大阪大丸心斎橋店</h3>
                        <h5>心斎橋駅直結!! 大丸心斎橋店南館2F</h5>
                        <p class="text">大阪府大阪市中央区心斎橋筋1−7−1大丸心斎橋南館2階</p>
                    </div>
                    <div class="info-bottom">
                        <p class="top-text"><span class="fa-icon icon-dot-f"></span><span class="text">お店への行き方</span></p>
                        <p class="bottom-text">地下鉄心斎橋駅から心斎橋大丸へ地下道で直結。
                            御堂筋からお越しの場合は御堂筋大丸前交差点を目印にお越しください。</p>
                    </div>
                </div>
            </div><!--end area-f-->
        </div><!--end wrap-area-->
        <div class="wrap-area clearfix">
            <div class="area-f asakusa clearfix">
                <div class="map-area" id="map-google-tokyo">Map Osaka</div>
                <div class="area-info">
                    <div class="area-icon"><span class="fa-icon icon-shop-08"></span></div>
                    <div class="info">
                        <h3>浅草店</h3>
                        <h5>浅草駅徒歩2分</h5>
                        <p class="text">東京都台東区浅草1-41-8 アトリエビル</p>
                    </div>
                    <div class="info-bottom">
                        <p class="top-text"><span class="fa-icon icon-dot-f"></span><span class="text">お店への行き方</span></p>
                        <p class="bottom-text">地下鉄・東武浅草駅空、雷門方向へ進み、雷門をくぐって新仲見世を直進。
                            伝法院通りの交差点を左へ曲がり、五差路まで直進。六区通りに入りすぐ左側。</p>
                    </div>
                </div>
            </div><!--end area-f-->
        </div><!--end wrap-area-->
    </div>
</div><!--end footer-taking-->