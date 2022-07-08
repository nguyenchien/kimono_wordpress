/**
 * Created by TuDh on 9/26/14.
 * Edited by Duyen Hoang 2014.12.16
 */
jQuery(function () {
	// Kyoto shop
    var listLatLong = [
        {latitude: 34.987574, longitude: 135.759363, class_shop: 'dl[class="shop-1"]'}, //新京極店　kyotostation
        {latitude: 35.004704, longitude: 135.767149, class_shop: 'dl[class="shop-2"]'}, //新京極店　Shinkyogoku
        {latitude: 34.995613, longitude: 135.779331, class_shop: 'dl[class="shop-3"]'}, // 清水坂店　Kiyomizuzaka
        {latitude: 35.0384923, longitude: 135.7315990, class_shop: 'dl[class="shop-4"]'}, //金閣寺店　Kinkakuji
	    {latitude: 34.998496, longitude: 135.780745, class_shop: 'dl[class="shop-5"]'}, //二年坂店　Ninenzaka
	    {latitude: 35.0032909, longitude: 135.7727250, class_shop: 'dl[class="shop-6"]'} //祇園四条店　gion-shijo
    ];
	// Osaka shop
	var listOsakaLatLong = [
		{latitude: 34.67314279, longitude: 135.5009300, class_shop: 'dl[class="osaka-shop-1"]'} //大阪着物　Shinsaibashi
	];

	// Tokyo shop
    var listTokyoLatLong = [
        {latitude: 35.7130539, longitude: 139.7938753, class_shop: 'dl[class="tokyo-shop-1"]'} //浅草店　Asakusa
    ];

	// Kamakura shop
	var listKamakuraLatLong = [
		{latitude: 35.319476, longitude: 139.551737, class_shop: 'dl[class="kamakura-shop-1"]'} //鎌倉　Kamakura
	];

	var mapList = [
		// load map kyoto
		{longLats: listLatLong, elementId: 'map-google', options:{info: false, mapTypeControlOptions:{}}},
		// load map kyoto
		{longLats: listOsakaLatLong, elementId: 'map-google-osaka', options:{info: false, maxZoom: 12, mapTypeControlOptions:{}}},
		{longLats: listTokyoLatLong, elementId: 'map-google-tokyo', options:{info: false, maxZoom: 12, mapTypeControlOptions:{}}},
		{longLats: listKamakuraLatLong, elementId: 'map-google-kamakura', options:{info: false, maxZoom: 12, mapTypeControlOptions:{}}},
	];

	if(typeof shopTitleList !== 'undefined' && shopTitleList) {
		// Kimono shop
		var listLatLongAccess = [
			{latitude: 34.987574, longitude: 135.759363, shop_key: 'kyotostation'}, //kyotostation
			{latitude: 35.004704, longitude: 135.767149, shop_key: 'shinkyogoku'}, //新京極店　Shinkyogoku
			{latitude: 34.995613, longitude: 135.779331, shop_key: 'kiyomizuzaka'},  // 清水坂店　Kiyomizuzaka
			{latitude: 35.0384923, longitude: 135.7315990, shop_key: 'kinkakuji'}, //金閣寺店　Kinkakuji
			{latitude: 34.998496, longitude: 135.780745 , shop_key: 'ninenzaka'}, //二年坂店　Ninenzaka
			{latitude: 35.0032909, longitude: 135.7727250, shop_key: 'gion-shijo'} //祇園四条店　gion-shijo
		];
		$.each(listLatLongAccess, function (key, val) {
			if (typeof shopTitleList[val.shop_key] !== 'undefined' && shopTitleList[val.shop_key].region_name === 'kyoto') {
				listLatLongAccess[key].title = shopTitleList[val.shop_key].title;
				listLatLongAccess[key].link = shopTitleList[val.shop_key].link;
				listLatLongAccess[key].shopname = shopTitleList[val.shop_key].shopname;
			} else {
				listLatLongAccess[key].title = '';
				listLatLongAccess[key].link = '';
				listLatLongAccess[key].shopname = '';
			}
		});

		mapList.push({longLats: listLatLongAccess, elementId: 'access-map', options:{info: true, mapTypeControlOptions:{}}});

		// Kimono Osaka shop
		var listLatLongOsakaAccess = [
			{latitude: 34.67314279, longitude: 135.5009300, shop_key: 'shinsaibashi'} //大阪着物　Shinsaibashi
		];
		$.each(listLatLongOsakaAccess, function (key, val) {
			if (typeof shopTitleList[val.shop_key] !== 'undefined' && shopTitleList[val.shop_key].region_name === 'osaka') {
				listLatLongOsakaAccess[key].title = shopTitleList[val.shop_key].title;
				listLatLongOsakaAccess[key].link = shopTitleList[val.shop_key].link;
				listLatLongOsakaAccess[key].shopname = shopTitleList[val.shop_key].shopname;
			} else {
				listLatLongOsakaAccess[key].title = '';
				listLatLongOsakaAccess[key].link = '';
				listLatLongOsakaAccess[key].shopname = '';
			}
		});
		mapList.push({longLats: listLatLongOsakaAccess, elementId: 'access-map-osaka', options:{info: true, maxZoom: 12,mapTypeControlOptions:{}}});
		// Kimono Tokyo shop
		var listLatLongTokyoAccess = [
			{latitude: 35.7130539, longitude: 139.7938753, shop_key: 'asakusa'} //浅草店　Asakusa
		];

		$.each(listLatLongTokyoAccess, function (key, val) {
			if (typeof shopTitleList[val.shop_key] !== 'undefined' && shopTitleList[val.shop_key].region_name === 'tokyo') {
				listLatLongTokyoAccess[key].title = shopTitleList[val.shop_key].title;
				listLatLongTokyoAccess[key].link = shopTitleList[val.shop_key].link;
				listLatLongTokyoAccess[key].shopname = shopTitleList[val.shop_key].shopname;
			} else {
				listLatLongTokyoAccess[key].title = '';
				listLatLongTokyoAccess[key].link = '';
				listLatLongTokyoAccess[key].shopname = '';
			}
		});
		mapList.push({longLats: listLatLongTokyoAccess, elementId: 'access-map-osaka', options:{info: true, maxZoom: 12, mapTypeControlOptions:{}}});

		// Kamakura shop
		var listLatLongKarakuraAccess = [
			{latitude: 35.319476, longitude: 139.551737, shop_key: 'kamakura'} //鎌倉　Kamakura
		];

		$.each(listLatLongKarakuraAccess, function (key, val) {
			if (typeof shopTitleList[val.shop_key] !== 'undefined' && shopTitleList[val.shop_key].region_name === 'kamakura') {
				listLatLongKarakuraAccess[key].title = shopTitleList[val.shop_key].title;
				listLatLongKarakuraAccess[key].link = shopTitleList[val.shop_key].link;
				listLatLongKarakuraAccess[key].shopname = shopTitleList[val.shop_key].shopname;
			} else {
				listLatLongKarakuraAccess[key].title = '';
				listLatLongKarakuraAccess[key].link = '';
				listLatLongKarakuraAccess[key].shopname = '';
			}
		});
		mapList.push({longLats: listLatLongKarakuraAccess, elementId: 'access-map-kamakura', options:{info: true, maxZoom: 12, mapTypeControlOptions:{}}});
	}

	lazyLoadMap.init(mapList);
});

var lazyLoadMap = {
	mapList: [],
	init: function (mapList) {
		var loaded = false;
		var listTmp = []
		// filter element exist
		$.each(mapList, function (i, v) {
			if ($('#' + v.elementId).length > 0) {
				listTmp.push(v);
			}
		});
		this.mapList = listTmp;

		if (typeof language !='undefined' && language == 'tw') { // taiwan
			language = 'zh'; // Chinese
		}
		// get element has offset top min;
		if (this.mapList.length > 0) {
			var topMinElement = this.mapList.reduce(function(prev, curr) {
				return $('#'+prev.elementId).offset().top < $('#'+curr.elementId).offset().top ? prev : curr;
			});
		}
		// load one url google api
		if (typeof topMinElement != 'undefined') {
			$('#'+ topMinElement.elementId).bind('scrollin', function () {
				if (loaded == false) {
					var script = document.createElement("script");
					script.type = "text/javascript";
					script.src  = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDNXdRtoQLoH8QMY6NCJzz7bi4_MnbAOug&v=3.exp&region=ES&language="+language+"&callback=lazyLoadMap.drawMap";
					$('head').append(script);
					loaded = true;
				}
			});
		}
	},
	// draw map
	drawMap: function() {
		this.mapList = this.mapList.map(function(v){v.loaded = false; return v;});
		$.each(this.mapList, function(i,v) {
			$('#'+ v.elementId).bind('scrollin', function () {
				var mapOb = $('#'+ v.elementId);

				if (v.loaded == false && mapOb.length  && typeof mapOb !== 'undefined') {
					mapOb.on(v.elementId, function () {
						googleMap.loadMultiple(v.longLats, v.elementId, v.options);
					});
					mapOb.trigger(v.elementId);
				}

				v.loaded = true;
			});
		});
	}
}

var googleMap = {
	loadMultiple: function (listLatLong, id, options) {
		if (id === 'map-google') {
			jQuery('#'+id).css({height: '372px'});
		}else if(id === 'access-map'){
			jQuery('#'+id).css({height: '600px'});
		} else if ( id ==='access-map-osaka') {
			jQuery('#'+id).css({height: '410px', width: '100%'});
		}

		// Map for osaka shop
		if (id === 'map-google-osaka') {
			jQuery('#' + id).css({height: '254px'});
		}

		// Map for osaka shop
		if (id === 'map-google-tokyo') {
			jQuery('#' + id).css({height: '254px'});
		}

		// Map for osaka shop
		if (id === 'map-google-kamakura') {
			jQuery('#' + id).css({height: '254px'});
		}

        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDoubleClickZoom: true,
            draggable: false,
            zoomControl: false,
            scrollwheel: false,
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

		/*if (window.innerWidth < 767) { 	// For mobile and disable the drag event on map
		    mapOptions = jQuery.extend(mapOptions, {draggable : false, scrollwheel: false});
		}*/

        var map = new google.maps.Map(document.getElementById(id), mapOptions);
        var bounds = new google.maps.LatLngBounds();
        var allMarkers = [];

        jQuery.each(listLatLong, function (key, val) {

            var parent  = jQuery(val.class_shop);
            var marker  = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(val.latitude, val.longitude),
                id: parent.attr('class'),
                draggable: false,
	            icon: baseUrl + '/images/icons/map_icon.png'
            });

	        marker.setAnimation(null);

			if(typeof options.info === 'boolean' && options.info === true) {
				var infowindow = new google.maps.InfoWindow({
					content: '<div style="overflow:hidden; text-align: center;white-space: nowrap;">' + val.shopname + '</div>'
				});

				infowindow.open(map, marker);	
			}

            allMarkers.push(marker);
            bounds.extend(marker.position);
            //map.fitBounds(bounds);
            map.setZoom((id == 'map-google-osaka' || id == 'map-google-tokyo' || id == 'map-google-kamakura' ? 17:12));
	        map.setCenter(marker.getPosition());

            if (id === 'access-map') {
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addListener(marker, 'mouseover', function() {
                jQuery('.' + marker.id).addClass('border-map');
            });

            google.maps.event.addListener(marker, 'mouseout', function() {
                jQuery('.' + marker.id).removeClass('border-map');

                this.setAnimation(null);
            });
			
			//zoom and pan into shop
            parent.on('mouseover', function () {
                google.maps.event.trigger(marker, 'mouseover');
	            //marker.map.setZoom(17);

                jQuery.each(allMarkers, function (key, mk) {
                    if (marker.id != mk.id) {
	                    // reset map to default
                        jQuery('.' + mk.id).removeClass('border-map');
                        mk.setAnimation(null);
                    }
                });

                marker.setAnimation(google.maps.Animation.BOUNCE, 600);
                //map.panTo(marker.position);
            }).mouseout(function() {
	            // reset map to default
	            jQuery.each(allMarkers, function (key, mk) {
		            jQuery('.' + mk.id).removeClass('border-map');
		            mk.setAnimation(null);
	            });
            });
        });

        var controlUI = document.createElement('div'),
            ulStyle = {
                'backgroundColor': 'white',
                'border': '1px solid rgb(168, 165, 165)',
                'cursor': 'pointer',
                'margin': '5px 0',
                'textAlign': 'center',
                'vertical-align': 'middle',
                'display': 'table-cell',
                'min-width': '55px',
                'box-shadow': 'rgba(0, 0, 0, 0.298039) 0 1px 4px -1px'
            },

            controlText = document.createElement('div');

        jQuery.each(ulStyle, function (key, val) {
            controlUI.style[key] = val;
        });

        controlText.style.fontFamily = 'Arial,sans-serif';
        controlText.style.fontSize   = '11px';
        controlText.style.padding    = '0.06em';

        var titleMain = 'リセット';

        if (typeof mainMap !== 'undefined') {
            titleMain = mainMap;
        }

        controlText.innerHTML = '<div id="main-map" style="padding: 0 5px;white-space: nowrap;">' + titleMain + '</div>';

        controlUI.appendChild(controlText);
        controlUI.index = 1;
        map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(controlUI);

        jQuery(controlUI).on('click', function () {
            map.fitBounds(bounds);

	        jQuery.each(allMarkers, function (key, mk) {
		        jQuery('.' + mk.id).removeClass('border-map');
		        mk.setAnimation(null);
	        });

            if (id === 'access-map' || id === 'access-map-osaka') {
                $('#'+id).trigger(id);
            }
        });
    }
};
//-- Back to top--
jQuery(function() {
    var duration = 1000;

    jQuery('.back_to_top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);

        return false;
    });
});