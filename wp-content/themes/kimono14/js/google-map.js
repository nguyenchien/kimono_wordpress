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
		{latitude: 35.0032909, longitude: 135.7727250, class_shop: 'dl[class="shop-6"]'}, //祇園四条店　gion-shijo
		{latitude: 35.0179236, longitude: 135.6810972, class_shop: 'dl[class="shop-11"]'}, //嵐山　arashiyama
		{latitude: 35.0051966, longitude: 135.7730540, class_shop: 'dl[class="shop-14"]'}, //プチ祇園四条店　Gionshirakawa
		{latitude: 34.9880993, longitude: 135.7553967, class_shop: 'dl[class="shop-15"]'}, //プチ京都駅前店　Petit Kyoto Station
		{latitude: 35.0179165, longitude: 135.681116, class_shop: 'dl[class="shop-18"]'},  //嵐山駅前店　arashiyama-togetsukyo
	];
	var listLatLongCariCature = [
        {latitude: 35.006750, longitude: 135.767332}, //カリカチュア Caricature Japan ShinMiyako
        {latitude: 35.003700, longitude:  135.772611} //カリカチュア Caricature · Japan Gion Four
	]


	// Highend Kyoto Area shop
	var listHighendKyotoLatLong = [
		{latitude: 34.987574, longitude: 135.759363, class_shop: 'dl[class="shop-1"]'}, //新京極店　kyotostation
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
	// spot map
	if($('#spot-map').length){
		var listSpotLatLong = [
			{latitude: $('#spot-map').attr('data-lat'), longitude: $('#spot-map').attr('data-lng'), class_shop: 'dl[class="spot-map"]'} //鎌倉　Kamakura
		];
	}

	var shinsaibashi = [
		{latitude: 34.67314279, longitude: 135.5009300, shop_key: 'shinsaibashi'} //大阪着物　Shinsaibashi
	];

	var asakusa = [
		{latitude: 35.7130539, longitude: 139.7938753}  //浅草店　Asakusa
	];

	var kyotostation = [
		{latitude: 34.987574, longitude: 135.759363}, //新京極店　kyotostation,
	];

	var gionshijo = [
		{latitude: 35.0032909, longitude: 135.7727250} //新京極店　gionshijo
	];

	var kanazawa = [
		{latitude: 36.5624746, longitude: 136.6532506, class_shop: 'dl[class="kanazawa-shop-10"]'} //金沢香林坊店　kanazawa,
	];
	var mapList = [
		// load map kyoto
		{longLats: listLatLong, elementId: 'map-google', options:{info: false, mapTypeControlOptions:{}}},
		// load map kyoto
		{longLats: listHighendKyotoLatLong, elementId: 'highend-kyoto-map', options:{info: false, mapTypeControlOptions:{}}},
		// load map osaka
		{longLats: listOsakaLatLong, elementId: 'map-google-osaka', options:{info: false, maxZoom: 12, mapTypeControlOptions:{}}},
		// load map kyoto
		{longLats: listTokyoLatLong, elementId: 'map-google-tokyo', options:{info: false, maxZoom: 12, mapTypeControlOptions:{}}},
		// load map kamakura
		{longLats: listKamakuraLatLong, elementId: 'map-google-kamakura', options:{info: false, mapTypeControlOptions:{}}},
		// load shinsaibashi map
		{longLats: shinsaibashi, elementId: 'lesson-map-shinsaibashi', options:{info: true, mapTypeControlOptions:{}}},
		{longLats: asakusa, elementId: 'lesson-map-asakusa', options:{info: false, draggable: true, zoomControl: true, scrollwheel: true, mapTypeControlOptions:{}}},
		// load lesson-map-kyotostation
		{longLats: kyotostation, elementId: 'lesson-map-kyotostation', options:{info: false, draggable: true, zoomControl: true, scrollwheel: true, mapTypeControlOptions:{}}},
		{longLats: gionshijo, elementId: 'lesson-map-gionshijo', options:{info: false, draggable: true, zoomControl: true, scrollwheel: true, mapTypeControlOptions:{}}},
		{longLats: kanazawa, elementId: 'map-google-kanazawa', options:{info: false, mapTypeControlOptions:{}}},
        // load map caricature
        {longLats: listLatLongCariCature, elementId: 'map-google-caricature', options:{info: false, draggable: true, zoomControl: true, scrollwheel: true, mapTypeControlOptions:{}}},
	];
	// shop tokyoskytree
    var tokyo_skytree = [
        {latitude: 35.7102875, longitude: 139.8106309, class_shop: 'dl[class="shop-17"]'}, //嵐山駅前店　tokyoskytree         var myLatLng = {lat: 35.7101277, lng: 139.8114396};
    ];

    mapList.push({longLats: tokyo_skytree, elementId: 'map-google-tokyo-skytree', options:{info: false, draggable: true, zoomControl: true, scrollwheel: true, mapTypeControlOptions:{}}})

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
		// load access-map
		mapList.push({longLats: listLatLongAccess, elementId: 'access-map', options:{info: true, mapTypeControlOptions:{}}});
		// Highend Kyoto Area shop
		/*var listHighendKyotoLatLongAccess = [
			{latitude: 34.987574, longitude: 135.759363, shop_key: 'kyotostation'}, //kyotostation
			{latitude: 35.0032909, longitude: 135.7727250, shop_key: 'gion-shijo'} //祇園四条店　gion-shijo
		];
		$.each(listHighendKyotoLatLongAccess, function (key, val) {
			if (typeof shopTitleList[val.shop_key] !== 'undefined' && shopTitleList[val.shop_key].region_name === 'kyoto') {
				listHighendKyotoLatLongAccess[key].title = shopTitleList[val.shop_key].title;
				listHighendKyotoLatLongAccess[key].link = shopTitleList[val.shop_key].link;
				listHighendKyotoLatLongAccess[key].shopname = shopTitleList[val.shop_key].shopname;
			} else {
				listHighendKyotoLatLongAccess[key].title = '';
				listHighendKyotoLatLongAccess[key].link = '';
				listHighendKyotoLatLongAccess[key].shopname = '';
			}
		});*/

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
		mapList.push(// access-map-osaka
			{longLats: listLatLongOsakaAccess, elementId: 'access-map-osaka', options:{info: true, maxZoom: 12, mapTypeControlOptions:{}}}
		);
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
		mapList.push(// load access-map-tokyo
			{longLats: listLatLongTokyoAccess, elementId: 'access-map-tokyo', options:{info: true, maxZoom: 12, mapTypeControlOptions:{}}}
		);
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
		mapList.push(// load access-map-kamakura map
			{longLats: listLatLongKarakuraAccess, elementId: 'access-map-kamakura', options:{info: true, mapTypeControlOptions:{}}}
		);

		// arashiyama
		var LatLongArashiyama = [
			{latitude: 35.0179236, longitude: 135.6810972, class_shop: 'dl[class="arashiyama-shop"]'}
		];
		mapList.push({longLats: LatLongArashiyama, elementId: 'arashiyama-map', options:{info: false, mapTypeControlOptions:{}}});
	}
	// Begin page formal-rental
	mapList.push(    {
        longLats: [{latitude: 34.998496, longitude: 135.780745}], //フォーマル京都タワー店,
        elementId: 'formal-shop-16',
        options: {mapTypeControlOptions: {}, draggable: true}
    });

	mapList.push(
        {
            longLats: [{latitude: 35.0032909, longitude: 135.7727250}], //祇園四条店　gion-shijo
            elementId: 'formal-shop-6',
            options: {mapTypeControlOptions: {}, draggable: true}
        }
	);
	mapList.push(
        {
            longLats: [{latitude: 34.67314279, longitude: 135.5009300}], //大阪着物　Shinsaibashi
            elementId: 'formal-shop-7',
                options: {mapTypeControlOptions: {}, draggable: true}
        }
	);
	mapList.push(
        {
            longLats: [{latitude: 35.7130539, longitude: 139.7938753}],  //浅草店　Asakusa,
            elementId: 'formal-shop-8',
                options: {mapTypeControlOptions: {}, draggable: true}
        }
	);
	mapList.push(
        {
            longLats: [{latitude: 35.319476, longitude: 139.551737}], //鎌倉　Kamakura
            elementId: 'formal-shop-9',
                options: {mapTypeControlOptions: {}, draggable: true}
        }
	);
    mapList.push(
        {
            longLats: [{latitude: 35.710152, longitude: 139.810681}], // Tokyoskytree
            elementId: 'formal-shop-17',
            options: {mapTypeControlOptions: {}, draggable: true}
        }
    );

	// End pages
	lazyLoadMap.init(mapList);
});
var lazyLoadMap = {
	mapList: [],
    isApiGoogleLoaded: false,
	init: function (mapList) {
		var listTmp = [];
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

        // load one url google api
        if (!this.isApiGoogleLoaded) {
            this.loadMapSDK();
        }

        this.drawMap();
	},
    loadMapSDK: function (){
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src  = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAcXF2sDg3HVODAUVSVqPFYSiLSzT6wQII&v=3.exp&region=ES&language="+language+"";
        $('head').append(script);
        LazyLoad.isApiGoogleLoaded = true;
    },
	// draw map
	drawMap: function() {
		$.each(this.mapList, function(i,v) {
            var mapOb = $('#' + v.elementId);
            var callback = function () {
                LazyLoad.executeOnDependAvailable('google', function () {
                    if (mapOb.length) {
                        mapOb.on(v.elementId, function () {
                            googleMap.loadMultiple(v.longLats, v.elementId, v.options);
                        });

                        var clicked = mapOb.data('clicked');
                        if (typeof clicked === 'undefined' || !clicked) {
                            mapOb.trigger(v.elementId);
                        }
                    }
                },false);
            };

            var node = {node: document.getElementById(v.elementId), callbackfunc: callback};

            if (typeof LazyLoad.addNode !== 'undefined') {
                LazyLoad.addNode(node);
            }

			// add event click in shop and show map
            $('.item-shop-list').on('click', function () {
            	var mapCurrent = $(this).find('.map').first();
				var idMap = mapCurrent.attr('id');
                var clicked = mapCurrent.data('clicked');

                if (typeof clicked === 'undefined' || !clicked) {
                	var mapList = lazyLoadMap.mapList;
					var data_map = mapList.filter(function(value) {
						return value.elementId === idMap;
					});

					if (data_map.length > 0) {
                        data_map = data_map[0];
                        googleMap.loadMultiple(data_map.longLats, data_map.elementId, data_map.options);
                        mapCurrent.data('clicked', true);
					}
                }
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
		} else if (id == 'lesson-map-shinsaibashi' || id == 'lesson-map-asakusa' || id == 'lesson-map-kyotostation' || id == 'lesson-map-gionshijo') {
			jQuery('#'+id).css({height: '335px', width: '470px'});
		} else if (id == 'map-google-kanazawa' || id == 'arashiyama-map' || id == 'map-google-tokyo-skytree') {
			jQuery('#'+id).css({height: '150px'});
		}
		else if (id == 'spot-map') {
			jQuery('#'+id).css({height: '444px', width: '100%'});
		}
        else if (id === 'map-google-caricature') {
            jQuery('#'+id).css({height: '450px', width: '100%'});
        }

        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDoubleClickZoom: true,
            draggable: false,
            zoomControl: true,
            scrollwheel: false,
            keyboardShortcuts: false,
	        mapTypeControl: true,
	        mapTypeControlOptions: {
		        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
		        position: google.maps.ControlPosition.BOTTOM_LEFT
	        }
        };

        if (options) {
            mapOptions = $.extend(mapOptions, options);
        }

        var map = new google.maps.Map(document.getElementById(id), mapOptions);
        var bounds = new google.maps.LatLngBounds();
        var allMarkers = [];

        jQuery.each(listLatLong, function (key, val) {

            var parent  = jQuery(val.class_shop);
			var markerOptions = {
				map: map,
				position: new google.maps.LatLng(val.latitude, val.longitude),
				id: parent.attr('class'),
				draggable: false,
			};
			var allowIcon = ['spot-map', 'map-google-caricature'];
			if (allowIcon.indexOf(id) === -1) {
				markerOptions = $.extend(markerOptions, {icon: baseUrl + '/images/icons/map_icon.png'});
			}

			var marker  = new google.maps.Marker(markerOptions);
	        marker.setAnimation(null);

			if(typeof options.info === 'boolean' && options.info === true) {
				var infowindow = new google.maps.InfoWindow({
					content: '<div style="overflow:hidden; text-align: center;white-space: nowrap;">' + val.shopname + '</div>'
				});

				infowindow.open(map, marker);	
			}

            allMarkers.push(marker);
            bounds.extend(marker.position);
            map.setCenter(marker.getPosition());

            switch(id) {
				case 'lesson-map-shinsaibashi':
				case 'lesson-map-asakusa':
				case 'lesson-map-kyotostation':
				case 'lesson-map-gionshijo':
				case 'map-google-osaka':
				case 'map-google-tokyo':
				case 'map-google-kamakura':
				case 'arashiyama-map':
				case 'spot-map': {
					map.setZoom(17); break;
				}
				case 'map-google-kanazawa': {
					map.setZoom(15); break;
				}
                case 'map-google-caricature':
				{
					map.setZoom(15); break;
				}
				case 'formal-shop-16':
				case 'formal-shop-6':
				case 'formal-shop-7':
				case 'formal-shop-8':
				case 'formal-shop-9': {
                    map.setZoom(15); break;
				}

				default : {
					map.setZoom(12); break;
				}
            }
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


        map.setCenter(bounds.getCenter());

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
        controlText.style.fontSize   = '11px';
        controlText.style.padding    = '0.06em';

        var titleMain = 'リセット';

        if (typeof mainMap !== 'undefined') {
            titleMain = mainMap;
        }

        controlText.innerHTML = '<div id="main-map" style="padding: 0px 5px;white-space: nowrap;">' + titleMain + '</div>';

        controlUI.appendChild(controlText);
        controlUI.index = 1;
        //map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(controlUI);

        jQuery(controlUI).on('click', function () {
            //map.fitBounds(bounds);

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