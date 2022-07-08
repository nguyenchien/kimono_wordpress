/**
 * Created by TuDh on 12/04/2017
 */
jQuery(function () {
    // Kyoto shop
    var listLatLong = [
        {latitude: 35.713089, longitude: 139.7941001, service_type: 'A', icon: '/images/icons/map_icon.png'}, //きものレンタルwargo東京浅草店x
        {latitude: 35.712177, longitude: 139.7967027, service_type: 'M', icon: '/images/tourist-spots/icon-maker-shopping.svg'}, //浅草仲見世かんざし屋wargox
        {latitude: 35.711982, longitude: 139.79585700, service_type: 'K', icon: '/images/tourist-spots/icon-maker-shopping.svg'}, //浅草新仲見世 北斎グラフィックx
        {latitude: 35.711892, longitude: 139.79618700, service_type: 'L', icon: '/images/tourist-spots/icon-maker-shopping.svg'}, //箸や万作 浅草新仲見世
        {latitude: 35.7127887, longitude: 139.795689, service_type: 'E', icon: '/images/tourist-spots/icon-maker-flag.svg'}, //カリカチュア浅草x
        {latitude: 35.7117084, longitude: 139.7964511, service_type: 'I', icon: '/images/tourist-spots/icon-maker-shopping.svg'}, //ドン・キ・ホーテ
        {latitude: 35.7132219, longitude: 139.7952129, service_type: 'B', icon: '/images/tourist-spots/icon-maker-photo.svg'}, //雷門x
        {latitude: 35.7110084, longitude: 139.7964511, service_type: 'D', icon: '/images/tourist-spots/icon-maker-photo.svg'}, //仲見世通りx
        {latitude: 35.7153859, longitude: 139.7939862, service_type: 'G', icon: '/images/tourist-spots/icon-maker-flag.svg'}, //花やしきx

        {latitude: 35.71145211, longitude: 139.7962411, service_type: 'N', icon: '/images/tourist-spots/icon-maker-restaurant.svg'}, //浅草シルクプリン
        {latitude: 35.71459099, longitude: 139.7951862, service_type: 'J', icon: '/images/tourist-spots/icon-maker-restaurant.svg'}, //花月堂


        {latitude: 35.71405999, longitude: 139.7963862, service_type: 'C', icon: '/images/tourist-spots/icon-maker-photo.svg'}, //フォトスポット・雷門前・ファイル名：kaminarimon
    ];

    // shop kanazawa
    var kanazawaLatLongList = [
        {latitude: 36.5623666, longitude: 136.6532900, service_type: 'A', icon: '/images/icons/map_icon.png'}, //きものレンタル金沢 36.5623666,136.6510038
        {latitude: 36.5608715, longitude: 136.658469, service_type: 'B', icon: '/images/tourist-spots/icon-maker-flag.svg'}, //金沢21世紀美術館 36.5608715,136.656069
        {latitude: 36.5623663, longitude: 136.6628855, service_type: 'C', icon: '/images/tourist-spots/icon-maker-flag.svg'}, // 兼六園 36.5621663,136.6598083
        {latitude: 36.5659914, longitude: 136.6599402, service_type: 'D', icon: '/images/tourist-spots/icon-maker-flag.svg'}, //金沢城 36.5640414,136.6520402
        {latitude: 36.5726107, longitude: 136.6665075, service_type: 'E', icon: '/images/tourist-spots/icon-maker-shopping.svg'}, //ひがし茶屋街 36.5727107,136.6660875
        {latitude: 36.5641154, longitude: 136.6504972, service_type: 'F', icon: '/images/tourist-spots/icon-maker-photo.svg'}, //長町武家屋敷跡//36.5641154,136.6478972
        //{latitude: 36.5625666, longitude: 136.6542000, service_type: 'G', icon: '/images/tourist-spots/icon-maker-restaurant.svg'}, //きものレンタル金沢 36.5623666,136.6510038
        {latitude: 36.5614925, longitude: 136.6547053, service_type: 'H', icon: '/images/tourist-spots/icon-maker-restaurant.svg'}, //蛇之目寿司本店 36.5596965,136.6494278
        //{latitude: 36.5596965, longitude: 136.6514978, service_type: 'I', icon: '/images/tourist-spots/icon-maker-restaurant.svg'}, //金澤おでん赤玉本店　担当北村様　OK
        {latitude: 36.5792529, longitude: 136.649990, service_type: 'J', icon: '/images/tourist-spots/icon-maker-shopping.svg'}, //金沢北斎グラフィック 36.5795529,136.6476798
        // {latitude: 36.5617743, longitude: 136.6562903, service_type: 'F', icon: '/images/tourist-spots/icon-maker-flag.svg'}, //漆の実 // 36.5617743,136.6555903
        {latitude: 36.5618331, longitude: 136.6559758, service_type: 'K', icon: '/images/tourist-spots/icon-maker-restaurant.svg'}, //漆の実 36.5618331, 136.6559758
    ];

    var mapList = [
        {
            longLats: listLatLong,
            elementId: 'tourist-map',
            options: {info: false, mapTypeControlOptions: {}},
        },
        {
            longLats: kanazawaLatLongList,
            elementId: 'tourist-map-kanazawa',
            options:{info: false, maxZoom: 15, draggable: true, zoomControl: true, scrollwheel: true, mapTypeControlOptions:{}},
        }
    ];

    lazyLoadMap.init(mapList);
});
// API load map
var lazyLoadMap = {
    mapList: [],
    isSDKLoaded:false,
    init: function (mapList) {
        var listTmp = []
        //Filter element exist
        $.each(mapList, function (i, v) {
            if ($('#' + v.elementId).length > 0) {
                listTmp.push(v);
            }
        });

        if (listTmp.length === 0) return;
        this.mapList = listTmp;

        if (typeof language !== 'undefined' && language === 'tw') { // taiwan
            language = 'zh'; // Chinese
        }

        // load one url google api
        this.drawMap();
        //this.loadMapSDK()
    },
    loadMapSDK: function (){
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "https://maps.googleapis.com/maps/api/js?v=3.exp&region=ES&language=" + language + "";
        $('head').append(script);
        lazyLoadMap.isSDKLoaded = true;
    },
    // draw map
    drawMap: function () {
        $.each(this.mapList, function (i, v) {
            var callback = function () {
                if (lazyLoadMap.isSDKLoaded === false) {
                    lazyLoadMap.loadMapSDK();
                }

                LazyLoad.executeOnDependAvailable('google', function () {
                    var mapOb = $('#' + v.elementId);

                    if (mapOb.length && typeof mapOb !== 'undefined') {
                        mapOb.on(v.elementId, function () {
                            googleMap.loadMultiple(v.longLats, v.elementId, v.options);
                        });
                        mapOb.trigger(v.elementId);
                    }
                },false);
            };

            var node = {node: document.getElementById(v.elementId), callbackfunc: callback};

            if (typeof LazyLoad.addNode !== 'undefined') {
                LazyLoad.addNode(node);
            }
        });
        LazyLoad.init();
    }
}
// Google map
var googleMap = {
    loadMultiple: function (listLatLong, id, options) {
        jQuery('#' + id).css({height: '750px'});

        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDoubleClickZoom: true,
            draggable: true,
            zoomControl: true,
            scrollwheel: true,
            keyboardShortcuts: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.BOTTOM_LEFT
            }
        };

        if (typeof options !== 'undefined' && !$.isEmptyObject(options)) {
            mapOptions = jQuery.extend(mapOptions, options);
        }

        var map = new google.maps.Map(document.getElementById(id), mapOptions);
        var bounds = new google.maps.LatLngBounds();
        var Popup = function(position, content) {
            this.position = position;
            content.classList.add('popup-bubble-content');
            var pixelOffset = document.createElement('div');
            pixelOffset.classList.add('popup-bubble-anchor');
            pixelOffset.appendChild(content);

            this.anchor = document.createElement('div');
            this.anchor.classList.add('popup-tip-anchor');
            this.anchor.appendChild(pixelOffset);
        };
        // NOTE: google.maps.OverlayView is only defined once the Maps API has
        // loaded. That is why Popup is defined inside initMap().
        Popup.prototype = Object.create(google.maps.OverlayView.prototype);

        /** Called when the popup is added to the map. */
        Popup.prototype.onAdd = function() {
            this.getPanes().floatPane.appendChild(this.anchor);
        };

        /** Called when the popup is removed from the map. */
        Popup.prototype.onRemove = function() {
            if (this.anchor.parentElement) {
                this.anchor.parentElement.removeChild(this.anchor);
            }
        };

        /** Called when the popup needs to draw itself. */
        Popup.prototype.draw = function() {
            var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);
            // Hide the popup when it is far out of view.
            var display = Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ? 'block' : 'none';

            if (display === 'block') {
               this.anchor.style.left = divPosition.x + 'px';
               this.anchor.style.top = divPosition.y + 'px';
            }

            if (this.anchor.style.display !== display) {
               this.anchor.style.display = display;
            }
        };

        jQuery.each(listLatLong, function (key, val) {
            var content =  document.createElement('div');
            content.innerHTML = '<div class="custom-marker">' +
                '<span class="type">'+val.service_type+'</span>' +
                '<img  src="'+baseUrl + val.icon+'"/>' +
                '</div>';
            // Add event click into marker for user and set marker into position center of map
            var clickEventType =(document.ontouchstart!==null) ? 'click' : 'touchstart';
            content.addEventListener(clickEventType, function () {
                map.setCenter({lat: val.latitude, lng: val.longitude});
                var shop_name = (val.service_type).toLowerCase();
                // trigger to item in slick view
                var slick_item = $('.tourist-shop-icon.shop-' + shop_name).parents('.slick-item.slick-slide').not('.slick-cloned')
                var target_index = slick_item.data('slick-index');
                var slick_slider_tourist = $('.slick-slider-tourist');

                if (target_index >= 0) {
                    var current_index = $('.slick-current').data('slick-index');
                    var new_speed = Math.abs(current_index - target_index);
                    new_speed = new_speed > 0 ? new_speed*300: 300;
                    slick_slider_tourist.slick('slickSetOption', 'speed', new_speed, false);
                    slick_slider_tourist.slick('slickGoTo', target_index, false);

                    var currentItem_after_goto = $('.slick-current');
                    currentItem_after_goto.removeClass('slick-next-item').removeClass('slick-prev-item');
                    currentItem_after_goto.next().addClass('slick-next-item');
                    currentItem_after_goto.prev().addClass('slick-prev-item');
                    // set default option speed 500
                    slick_slider_tourist.slick('slickSetOption', 'speed', 300, false);
                }
            });

            var popup = new Popup(new google.maps.LatLng(val.latitude, val.longitude),content);
                popup.setMap(map);
                bounds.extend(popup.position);
                map.setCenter(popup.position);

            return true;
        });
        map.setCenter(bounds.getCenter());

        switch (id) {
            default : {
                map.setZoom(17);
                break;
            }
        }
        // Create tool btn
        var controlUI = document.createElement('div'),
            ulStyle = {
                'backgroundColor': 'white',
                'border': '1px solid rgb(168, 165, 165)',
                'cursor': 'pointer',
                'margin': '5px 0px',
                'textAlign': 'center',
                'vertical-align': 'middle',
                'display': 'table-cell',
                'min-width': '55px',
                'box-shadow': 'rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px'
            },

            controlText = document.createElement('div');

        jQuery.each(ulStyle, function (key, val) {
            controlUI.style[key] = val;
        });

        controlText.style.fontFamily = 'Arial,sans-serif';
        controlText.style.fontSize = '11px';
        controlText.style.padding = '0.06em';

        var titleMain = 'リセット';

        if (typeof mainMap !== 'undefined') titleMain = mainMap;

        controlText.innerHTML = '<div id="main-map" style="padding: 0px 5px;white-space: nowrap;">' + titleMain + '</div>';
        //controlUI.appendChild(controlText);
        controlUI.index = 1;
        map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(controlUI);

    }
};
