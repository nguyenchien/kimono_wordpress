<?php
/**
 * Footer Luggage Service
 * Author: Dai Huynh
 * Date: 1/19/2018
 * Time: 1:26 PM
 */
?>
<?php
global $isSmartPhone, $isTablet, $language;
if ($isSmartPhone) {
    wp_register_style('style-footer-luggage-service-sp', get_template_directory_uri() . '/css/footer-luggage-service-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('style-footer-luggage-service-sp');
}
else{
    wp_register_style('style-footer-luggage-service-pc', get_template_directory_uri() . '/css/footer-luggage-service-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('style-footer-luggage-service-pc');
}
?>

<footer class="footer">
    <div class="container-box">
        <div class="row">
            <div class="ft-wrap">
                <div class="list-footer">
                    <h4>サイトマップ</h4>
                    <ul>
                        <li><a href="https://wagokoro.co.jp/" target="_blank">ホーム</a></li>
                        <li><a href="https://wagokoro.co.jp/philosophy" target="_blank">経営理念</a></li>
                        <li><a href="https://wagokoro.co.jp/company" target="_blank">会社概要</a></li>
                        <li><a href="https://wagokoro.co.jp/business" target="_blank">事業内容</a></li>
                        <li><a href="https://recruit.wagokoro.co.jp/" target="_blank">採用情報</a></li>
                        <li><a href="https://wagokoro.co.jp/news" target="_blank">お知らせ</a></li>
                        <li><a href="https://wagokoro.co.jp/contact" target="_blank">お問い合わせ</a></li>
                    </ul>
                </div>
                <div class="list-footer">
                    <h4>店舗運営<br>
                        ブランドサイト</h4>
                    <ul>
                        <li><a href="http://kasuh.jp/" target="_blank">かすう工房</a></li>
                        <li><a href="http://kanzashiya.com/" target="_blank">かんざし屋wargo</a></li>
                        <li><a href="http://www.hokusai-graphic.com/" target="_blank">北斎グラフィック</a></li>
                        <li><a href="http://www.obidomeya-wargo.com/" target="_blank">おびどめ屋wargo</a></li>
                        <li><a href="http://yukataya-hiyori.com/" target="_blank">ゆかた屋hiyori</a></li>
                        <li><a href="http://mansaku1848.com/" target="_blank">箸や万作</a></li>
                    </ul>
                </div>
                <div class="list-footer">
                    <h4>運営店舗</h4>
                    <ul>
                        <li class="clear noborder"><a href="http://www.wargo.jp/" target="_blank" title="The Ichi"><strong>【The Ichi】</strong></a>（<a href="http://kasuh.jp/" target="_blank" title="かすう工房">かすう工房</a>・<a href="http://kanzashiya.com/" target="_blank" title="かんざし屋wargo">かんざし屋wargo</a>・<a href="http://www.hokusai-graphic.com/" target="_blank" title="北斎グラフィック">北斎グラフィック</a>・<a href="http://www.obidomeya-wargo.com/" target="_blank" title="おびどめ屋wargo取扱店">おびどめ屋wargo取扱店</a>）</li>
                        <li class="shop-kawasaki clear"><a href="http://shop-list.wargo.jp/wargo/kawasaki" target="_blank" title="川崎The&nbsp;Ichi">川崎The&nbsp;Ichi</a></li>
                        <li class="shop-shinjuku"><a href="http://shop-list.wargo.jp/wargo/shinjuku" target="_blank" title="新宿The&nbsp;Ichi">新宿The&nbsp;Ichi</a></li>
                        <li class="shop-akarenga-wargo"><a href="http://shop-list.wargo.jp/wargo/akarenga-wargo" target="_blank" title="赤レンガThe&nbsp;Ichi">赤レンガThe&nbsp;Ichi</a></li>
                        <li class="shop-osu"><a href="http://shop-list.wargo.jp/wargo/osu" target="_blank" title="名古屋大須The&nbsp;Ichi">名古屋大須The&nbsp;Ichi</a></li>
                        <li class="clear noborder"><a href="http://kanzashiya.com/" target="_blank" title="かんざし屋wargo"><strong>【かんざし屋wargo】</strong></a></li>
                        <li class="shop-harajuku clear"><a href="http://shop-list.wargo.jp/kanzashiya/harajuku" target="_blank" title="原宿">原宿</a></li>
                        <li class="shop-skytree"><a href="http://shop-list.wargo.jp/kanzashiya/skytree" target="_blank" title="東京スカイツリータウンソラマチ">東京スカイツリータウンソラマチ</a></li>
                        <li class="shop-kiyomizuzaka"><a href="http://shop-list.wargo.jp/kanzashiya/kiyomizuzaka" target="_blank" title="清水坂">清水坂</a></li>
                        <li class="shop-ninenzaka"><a href="http://shop-list.wargo.jp/kanzashiya/ninenzaka" target="_blank" title="二年坂">二年坂</a></li>
                        <li class="shop-fukuoka"><a href="http://shop-list.wargo.jp/kanzashiya/fukuoka" target="_blank" title="福岡天神PARCO">福岡天神PARCO</a></li>
                        <li class="shop-shinkyogoku"><a href="http://shop-list.wargo.jp/kanzashiya/shinkyogoku" target="_blank" title="新京極">新京極</a></li>
                        <li class="shop-okinawa"><a href="http://shop-list.wargo.jp/kanzashiya/okinawa" target="_blank" title="那覇国際通">那覇国際通</a></li>
                        <li class="shop-shizuoka-parco"><a href="http://shop-list.wargo.jp/kanzashiya/shizuoka-parco" target="_blank" title="静岡PARCO">静岡PARCO</a></li>
                        <li class="shop-asakusa"><a href="http://shop-list.wargo.jp/kanzashiya/asakusa" target="_blank" title="浅草新仲見世">浅草新仲見世</a></li>
                        <li class="shop-shimokitazawa"><a href="http://shop-list.wargo.jp/kanzashiya/shimokitazawa" target="_blank" title="下北沢">下北沢</a></li>
                        <li class="shop-kumamoto-parco"><a href="http://shop-list.wargo.jp/kanzashiya/kumamoto-parco" target="_blank" title="熊本PARCO">熊本PARCO</a></li>
                        <li class="shop-oita"><a href="http://shop-list.wargo.jp/kanzashiya/oita" target="_blank" title="大分アミュプラザ">大分アミュプラザ</a></li>
                        <li class="shop-kamakura-komachi"><a href="http://shop-list.wargo.jp/kanzashiya/kamakura-komachi" target="_blank" title="鎌倉小町">鎌倉小町</a></li>
                        <li class="shop-kagoshima"><a href="http://shop-list.wargo.jp/kanzashiya/kagoshima" target="_blank" title="鹿児島アミュプラザ">鹿児島アミュプラザ</a></li>
                        <li class="shop-nagoya"><a href="http://shop-list.wargo.jp/kanzashiya/nagoya" target="_blank" title="名古屋PARCO">名古屋PARCO</a></li>
                        <li class="shop-kyoto-arashiyama"><a href="http://shop-list.wargo.jp/kanzashiya/kyoto-arashiyama" target="_blank" title="京都嵐山">京都嵐山</a></li>
                        <li class="shop-narita-kokusai-kukou"><a href="http://shop-list.wargo.jp/kanzashiya/narita-kokusai-kukou" target="_blank" title="成田国際空港">成田国際空港</a></li>
                        <li class="shop-hakata-canal"><a href="http://shop-list.wargo.jp/kanzashiya/hakata-canal" target="_blank" title="博多キャナル">博多キャナル</a></li>
                        <li class="shop-okinawa-opa"><a href="http://shop-list.wargo.jp/kanzashiya/okinawa-opa" target="_blank" title="那覇OPA">那覇OPA</a></li>
                    </ul>
                    <ul>
                        <li class="clear noborder"><a href="https://kyotokimono-rental.com/" target="_blank"><strong>【きものレンタルwargo】</strong></a></li>
                        <li class="clear"><a href="https://kyotokimono-rental.com/access/kyoto-area/kiyomizu-area/kiyomizuzaka" target="_blank">清水坂</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kyoto-area/station-area/kyotostation" target="_blank">京都駅前 京都タワー</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kyoto-area/gion-area/gion-shijo" target="_blank">祇園四条</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/osaka-area/osaka-shinsaibashi" target="_blank">大阪大丸心斎橋</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/asakusa-area/asakusa" target="_blank">東京浅草</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kamakura-area/kamakura" target="_blank">鎌倉小町</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kanazawa-area/kanazawa" target="_blank">金沢香林坊</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kyoto-area/arashiyama-area/arashiyama" target="_blank">嵐山駅前</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kyoto-area/gion-area/petitgionshijo" target="_blank">プチ祇園四条</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kyoto-area/station-area/petitkyotostation" target="_blank">プチ京都駅前</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kyoto-area/station-area/formal-kyototower" target="_blank">フォーマル 京都タワー</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/asakusa-area/tokyoskytree" target="_blank">東京スカイツリータウンソラマチ</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo" target="_blank">嵐山渡月橋</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/fukuoka-area/dazaifu" target="_blank">太宰府</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/access/sapporo-area/sapporo-susukinostation" target="_blank">札幌すすきの駅前</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/access/tohoku-area/sendai-parco2" target="_blank">仙台PARCO2</a></li>
                    </ul>
                    <ul>
                        <li class="clear noborder"><a href="http://www.hokusai-graphic.com/" target="_blank" title="北斎グラフィック"><strong>【北斎グラフィック】</strong></a></li>
                        <li class="shop-ninenzaka clear"><a href="http://shop-list.wargo.jp/hokusai-graphic/ninenzaka" target="_blank" title="二年坂">二年坂</a></li>
                        <li class="shop-okinawa-kokusai"><a href="http://shop-list.wargo.jp/hokusai-graphic/okinawa-kokusai" target="_blank" title="那覇国際通り">那覇国際通り</a></li>
                        <li class="shop-gokohmachi"><a href="http://shop-list.wargo.jp/hokusai-graphic/gokohmachi" target="_blank" title="御幸町">御幸町</a></li>
                        <li class="shop-asakusashinnakamise"><a href="http://shop-list.wargo.jp/hokusai-graphic/asakusashinnakamise" target="_blank" title="浅草新仲見世">浅草新仲見世</a></li>
                        <li class="shop-oita"><a href="http://shop-list.wargo.jp/hokusai-graphic/oita" target="_blank" title="大分アミュプラザ">大分アミュプラザ</a></li>
                        <li class="shop-kamakura-komachi"><a href="http://shop-list.wargo.jp/hokusai-graphic/kamakura-komachi" target="_blank" title="鎌倉小町">鎌倉小町</a></li>
                        <li class="shop-kagoshima"><a href="http://shop-list.wargo.jp/hokusai-graphic/kagoshima" target="_blank" title="鹿児島アミュプラザ">鹿児島アミュプラザ</a></li>
                        <li class="shop-shinkyogoku"><a href="http://shop-list.wargo.jp/hokusai-graphic/shinkyogoku" target="_blank" title="新京極">新京極</a></li>
                        <li class="shop-shizuoka"><a href="http://shop-list.wargo.jp/hokusai-graphic/shizuoka" target="_blank" title="静岡PARCO">静岡PARCO</a></li>
                        <li class="shop-nagoya-makerspier"><a href="http://shop-list.wargo.jp/hokusai-graphic/nagoya-makerspier" target="_blank" title="名古屋メイカーズピア">名古屋メイカーズピア</a></li>
                        <li class="shop-nagoya-sakae"><a href="http://shop-list.wargo.jp/hokusai-graphic/nagoya-sakae" target="_blank" title="名古屋PARCO">名古屋PARCO</a></li>
                        <li class="shop-nagoya-osu"><a href="http://shop-list.wargo.jp/hokusai-graphic/nagoya-osu" target="_blank" title="名古屋大須">名古屋大須</a></li>
                        <li class="shop-shinjuku-marui"><a href="http://shop-list.wargo.jp/hokusai-graphic/shinjuku-marui" target="_blank" title="新宿マルイ">新宿マルイ</a></li>
                        <li class="shop-kichijoji-marui"><a href="http://shop-list.wargo.jp/hokusai-graphic/kichijoji-marui" target="_blank" title="吉祥寺マルイ">吉祥寺マルイ</a></li>
                        <li class="shop-kyoto-heian-12"><a href="http://shop-list.wargo.jp/hokusai-graphic/kyoto-heian-12" target="_blank" title="京都平安十二十二">京都平安十二十二</a></li>
                        <li class="shop-narita-kokusai-kukou"><a href="http://shop-list.wargo.jp/hokusai-graphic/narita-kokusai-kukou" target="_blank" title="成田国際空港">成田国際空港</a></li>
                        <li class="shop-hakata-canal"><a href="http://shop-list.wargo.jp/hokusai-graphic/hakata-canal" target="_blank" title="博多キャナル">博多キャナル</a></li>
                        <li class="shop-akarenga"><a href="http://shop-list.wargo.jp/hokusai-graphic/akarenga" target="_blank" title="赤レンガ">赤レンガ</a></li>
                        <li class="shop-okinawa-opa"><a href="http://shop-list.wargo.jp/hokusai-graphic/okinawa-opa" target="_blank" title="那覇OPA">那覇OPA</a></li>
                        <li class="shop-kyoto-gion"><a href="http://shop-list.wargo.jp/hokusai-graphic/kyoto-gion" target="_blank" title="京都祇園">京都祇園</a></li>
                        <li class="shop-konpira-sando"><a href="http://shop-list.wargo.jp/hokusai-graphic/konpira-sando" target="_blank" title="こんぴら参道">こんぴら参道</a></li>
                        <li class="shop-mizuki-rodo"><a href="http://shop-list.wargo.jp/hokusai-graphic/mizuki-rodo" target="_blank" title="水木ロード">水木ロード</a></li>
                        <li class="shop-kyoto-chawanzaka"><a href="http://shop-list.wargo.jp/hokusai-graphic/kyoto-chawanzaka" target="_blank" title="京都茶わん坂">京都茶わん坂</a></li>
                        <li class="shop-kumamoto-parco"><a href="http://shop-list.wargo.jp/hokusai-graphic/kumamoto-parco" target="_blank" title="熊本PARCO">熊本PARCO</a></li>
                        <li class="shop-himeji-castle-otemae"><a href="http://shop-list.wargo.jp/hokusai-graphic/himeji-castle-otemae" target="_blank" title="姫路城大手前">姫路城大手前</a></li>
                        <li class="shop-sapporo"><a href="http://shop-list.wargo.jp/hokusai-graphic/sapporo" target="_blank" title="札幌PARCO">札幌PARCO</a></li>
                        <li class="shop-dazaifu-tenmangu"><a href="http://shop-list.wargo.jp/hokusai-graphic/dazaifu-tenmangu" target="_blank" title="太宰府天満宮">太宰府天満宮</a></li>
                        <li class="shop-kurashiki"><a href="http://shop-list.wargo.jp/hokusai-graphic/kurashiki" target="_blank" title="倉敷美観地区">倉敷美観地区</a></li>
                        <li class="shop-okinawa-naha"><a href="http://shop-list.wargo.jp/hokusai-graphic/okinawa-naha" target="_blank" title="沖縄那覇">沖縄那覇</a></li>
                        <li class="shop-arashiyama-togetsu-kyo-bridge"><a href="http://shop-list.wargo.jp/hokusai-graphic/arashiyama-togetsu-kyo-bridge" target="_blank" title="京都 嵐山">京都 嵐山</a></li>
                        <li class="shop-kyoshin"><a href="http://shop-list.wargo.jp/hokusai-graphic/kyoshin" target="_blank" title="京錦">京錦</a></li>
                        <li class="shop-sendai-ekimae"><a href="http://shop-list.wargo.jp/hokusai-graphic/sendai-ekimae" target="_blank" title="仙台駅前">仙台駅前</a></li>
                        <li class="shop-namba-marui"><a href="http://shop-list.wargo.jp/hokusai-graphic/namba-marui" target="_blank" title="なんばマルイ">なんばマルイ</a></li>
                        <li class="clear noborder"><a href="http://shop-list.wargo.jp/hashi-mansaku" target="_blank" title="箸や万作"><strong>【箸や万作】</strong></a></li>
                        <li class="shop-kyoshin-headshop clear"><a href="http://shop-list.wargo.jp/hashi-mansaku/kyoshin-headshop" target="_blank" title="京錦本店">京錦本店</a></li>
                        <li class="shop-namba-marui"><a href="http://shop-list.wargo.jp/hashi-mansaku/namba-marui" target="_blank" title="なんばマルイ">なんばマルイ</a></li>
                        <li class="shop-asakusashinnakamise"><a href="http://shop-list.wargo.jp/hashi-mansaku/asakusashinnakamise" target="_blank" title="浅草新仲見世">浅草新仲見世</a></li>
                        <li class="shop-shinjuku-marui"><a href="http://shop-list.wargo.jp/hashi-mansaku/shinjuku-marui" target="_blank" title="新宿マルイ">新宿マルイ</a></li>
                        <li class="shop-kichijoji-marui"><a href="http://shop-list.wargo.jp/hashi-mansaku/kichijoji-marui" target="_blank" title="吉祥寺マルイ">吉祥寺マルイ</a></li>
                        <li class="shop-kyoto-heian-12"><a href="http://shop-list.wargo.jp/hashi-mansaku/kyoto-heian-12" target="_blank" title="京都平安十二十二">京都平安十二十二</a></li>
                        <li class="shop-harajuku"><a href="http://shop-list.wargo.jp/hashi-mansaku/harajuku" target="_blank" title="原宿">原宿</a></li>
                        <li class="shop-hakata-canal"><a href="http://shop-list.wargo.jp/hashi-mansaku/hakata-canal" target="_blank" title="博多キャナル">博多キャナル</a></li>
                        <li class="shop-kyoto-tower"><a href="http://shop-list.wargo.jp/hashi-mansaku/kyoto-tower" target="_blank" title="京都タワー">京都タワー</a></li>
                        <li class="shop-okinawa-opa"><a href="http://shop-list.wargo.jp/hashi-mansaku/okinawa-opa" target="_blank" title="那覇OPA">那覇OPA</a></li>
                        <li class="shop-himeji-castle-otemae-mansaku-gallery"><a href="http://shop-list.wargo.jp/hashi-mansaku/himeji-castle-otemae-mansaku-gallery" target="_blank" title="姫路城大手前 MANSAKU">姫路城大手前 MANSAKU</a></li>
                        <li class="shop-konpira-sando"><a href="http://shop-list.wargo.jp/hashi-mansaku/konpira-sando" target="_blank" title="こんぴら参道">こんぴら参道</a></li>
                        <li class="shop-kyoshin-mansaku-gallery"><a href="http://shop-list.wargo.jp/hashi-mansaku/kyoshin-mansaku-gallery" target="_blank" title="京錦MANSAKU">京錦MANSAKU</a></li>
                    </ul>
                </div>
                <div class="list-footer">
                    <h4>着物レンタル事業</h4>
                    <ul>
                        <li class="clear noborder"><strong>【観光着物レンタル】</strong><strong><a href="https://kyotokimono-rental.com/yukata" target="_blank">【観光浴衣レンタル】</a></strong></li>
                        <li class="clear"><a href="https://kyotokimono-rental.com/" target="_blank">京都観光着物レンタル</a></li>
                        <li class="noborder"><a href="https://kyotokimono-rental.com/access/kyoto-area/station-area" target="_blank">京都駅エリア</a></li>
                        <li class="noborder"><a href="https://kyotokimono-rental.com/access/kyoto-area/gion-area" target="_blank">祇園・河原町エリア</a></li>
                        <li class="noborder"><a href="https://kyotokimono-rental.com/access/kyoto-area/kiyomizu-area" target="_blank">清水・東山エリア</a></li>
                        <li class="noborder"><a href="https://kyotokimono-rental.com/access/kyoto-area/arashiyama-area" target="_blank">嵐山エリア</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/asakusa-area" target="_blank">浅草観光着物レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kamakura-area" target="_blank">鎌倉観光着物レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/kanazawa-area" target="_blank">金沢観光着物レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/osaka-area" target="_blank">大阪観光着物レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/access/fukuoka-area" target="_blank">福岡エリア</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/access/sapporo-area" target="_blank">札幌エリア</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/access/tohoku-area" target="_blank">東北エリア</a></li>
                        <li class="clear noborder"><a href="https://kyotokimono-rental.com/formal" target="_blank"><strong>【イベント着物レンタル】</strong></a></li>
                        <li class="clear"><a href="https://kyotokimono-rental.com/formal/homongi" target="_blank">訪問着レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/kurotomesode" target="_blank">黒留袖レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/irotomesode" target="_blank">色留袖レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/furisode" target="_blank">振袖レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/hakama" target="_blank">卒業式袴レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/shichigosan" target="_blank">七五三レンタル</a></li>
                        <li><a href="https://kyotokimono-rental.com/formal/mofuku" target="_blank">喪服レンタル</a></li>
                        <li class="clear noborder"><a href="https://kyotokimono-rental.com/takuhai" target="_blank">※宅配での着物レンタルも承っております。</a></li>
                    </ul>
                </div>
                <div class="list-footer">
                    <h4>運営ECサイト</h4>
                    <ul>
                        <li class="clear noborder"><a href="http://www.wargo.jp/" target="_blank"><strong>【The Ichi】</strong></a></li>
                        <li class="clear"><a href="http://www.wargo.jp/products/list86.html" target="_blank">かんざし屋wargo通販</a></li>
                        <li><a href="http://www.wargo.jp/products/list718.html" target="_blank">浴衣屋hiyori通販</a></li>
                        <li><a href="http://www.wargo.jp/products/list626.html" target="_blank">和傘屋北斎グラフィック通販</a></li>
                        <li><a href="http://www.wargo.jp/products/list633.html" target="_blank">おびどめ屋wargo通販</a></li>
                        <li><a href="http://www.wargo.jp/products/list85.html" target="_blank">かすう工房通販</a></li>
                        <li><a href="https://www.wargo.jp/products/list939.html" target="_blank">箸や万作通販</a></li>
                        <li class="clear noborder"><a href="http://www.animic.jp/" target="_blank"><strong>【アニミックスタイル】</strong></a></li>
                    </ul>
                </div>
                <div class="list-footer">
                    <h4>OEM事業</h4>
                    <ul>
                        <li><a href="http://www.silver-oem.com/" target="_blank">シルバーアクセサリーOEM生産工場</a></li>
                        <li><a href="http://kanzashi-oem.com/" target="_blank">かんざしOEM生産工場</a></li>
                        <li><a href="http://jewelrybox-oem.com/" target="_blank">ジュエリーボックスOEM生産工場</a></li>
                        <li><a href="http://stonebracelet-oem.com/" target="_blank">天然石ブレスレットOEM生産工場</a></li>
                        <li><a href="http://original-sunglass.com/" target="_blank">オリジナルサングラス工房和心</a></li>
                        <li><a href="http://beltbuckle-oem.com/" target="_blank">ベルトバックル製造工場 和心金属工業</a></li>
                        <li><a href="http://hat-oem.net/" target="_blank">帽子屋和心 OEM製作工場</a></li>
                        <li><a href="http://jewelrygold-oem.net/" target="_blank">wagokoroジュエリー貴金属製造工場</a></li>
                        <li><a href="http://company-badge.net/" target="_blank">徽章・ピンバッチ製造　和心金属加工工場</a></li>
                        <li><a title="傘専門OEM" href="http://umbrella-oem.com/" target="_blank">傘専門OEM</a></li>
                        <li><a title="レザー製品のOEM" href="http://leather-oem.com/" target="_blank">レザー製品のOEM</a></li>
                        <li><a title="箸専門OEM" href="http://chopsticks-oem.com/" target="_blank">箸専門OEM</a></li>
                        <li><a title="シルバー鋳造・研磨" href="https://silveraccessory-oem.net/" target="_blank">シルバー鋳造・研磨</a></li>
                    </ul>
                </div>
                <div class="list-footer">
                    <h4>SNSリンク</h4>
                    <ul>
                        <li class="clear noborder float_none_sp"><strong>Facebook</strong></li>
                        <li class="snsFb"><a href="https://www.facebook.com/wagokoro.co.jp/" target="_blank">株式会社和心</a></li>
                        <li class="snsFb"><a href="https://www.facebook.com/kanzashiya/?ref=hl" target="_blank">かんざし屋wargo</a></li>
                        <li class="snsFb"><a href="https://www.facebook.com/wargo.japan/" target="_blank">かすう工房</a></li>
                        <li class="snsFb"><a href="https://www.facebook.com/kyotokimonorental/" target="_blank">京都きものレンタル wargo</a></li>
                        <li class="clear noborder float_none_sp"><strong>Twitter</strong></li>
                        <li class="snsTw"><a href="https://twitter.com/the_ichi_jp" target="_blank">The Ichi</a></li>
                        <li class="snsTw"><a href="https://twitter.com/kasuh_osu?lang=ja" target="_blank">名古屋大須かすう工房</a></li>
                        <li class="snsTw"><a href="https://twitter.com/wagokoro_japan?lang=ja" target="_blank">かすう工房 販売スタッフ</a></li>
                        <li class="snsTw"><a href="https://twitter.com/kyotokimonorent" target="_blank">京都きものレンタルwargo</a></li>
                        <li class="clear noborder float_none_sp"><strong>Blog</strong></li>
                        <li class="blogbnr"><a href="http://www.wargo.jp/hiua7m3l1y.html" target="_blank">The Ichi 販売スタッフブログ</a></li>
                    </ul>
                </div>
                <a href="https://www.wagokoro.co.jp/contact" class="ft-contact">
                    <img src="<?php echo WP_HOME; ?>/images/luggage-service/contact-icon.png" alt="">お問い合わせ
                </a>
                <p class="copyright">Copyright &copy; Wagokoro Co.,Ltd.All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<?php
//$clientScript = Yii::app()->clientScript;
//if ($clientScript->isScriptRegistered('jquery') == false) {
//    wp_enqueue_script('jquery', WP_HOME . '/js/jquery.min.js');
//}
?>
<?php
$clientScript = Yii::app()->clientScript;
$baseUrl = Yii::app()->baseUrl;
$clientScript->registerScriptFile($baseUrl.'/js/jquery.lazyloadxt.js', CClientScript::POS_END);
?>
<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<script>
    $(document).ready(function(){
        //Toggle sidebar
        $('.toggle-menu').click(function(){
            $('#side-nav').addClass('open');
            //$('.wrap-overlay').show();
            $('html').addClass('fixed-body');
            console.log(1);
        });

        $('.side-nav .closed, .item a').click(function(){
            $('#side-nav').removeClass('open');
            //$('.wrap-overlay').hide();
            $('html').removeClass('fixed-body');
        });

        $(document).click(function(e){
            if(!$(e.target).closest('.side-nav, .toggle-menu').length){
                $('#side-nav').removeClass('open');
                $('.wrap-overlay').hide();
                $('html').removeClass('fixed-body');
            }
        });

        //Fixed header
        $(window).scroll(function(){
            if($(this).scrollTop() > 100){
                $('.wrap-nav').addClass('fixed-header');
            } else{
                $('.wrap-nav').removeClass('fixed-header');
            }
        });
    })
</script>
<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('luggage-service',$js, CClientScript::POS_END);
?>
<?php wp_footer(); ?>
</body>
</html>


