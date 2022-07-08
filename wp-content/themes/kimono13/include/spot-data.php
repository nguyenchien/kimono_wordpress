
<style type="text/css">
	.acf-map {
		width: 606px;
		height: 444px;			
	}
</style>
<div class="spot-custom-fields">	
	<div class="h2-block h2-block-second">
		<h2 class="h2-title-bar"><?php _e('基本情報', 'twentytwelve'); ?></h2>
		<div class="wrap-course clearfix">
			<div class="imageleft" style="float: right; margin: 0px;">
				<?php if (get_field('image')): ?>

					<?php
					$image = get_field('image');
					$size = 'spot-thumb'; // (thumbnail, medium, large, full or custom size)

					if ($image) {

						echo wp_get_attachment_image($image, $size);
					}
					?>

				<?php else: ?>

					<?php the_post_thumbnail('spot-thumb'); ?>

				<?php endif; ?>
			</div>
			<div class="textright" style="float: left; margin: 0px 40px 0px 0px; width: 290px;">
				<ul>
					<?php if (get_field('name')): ?>
						<li>
							<label>
								<?php _e('住所', 'twentytwelve'); ?>
							</label>
							<span>
								<?php the_field('name'); ?>
							</span>
						</li>
					<?php endif; ?>
					<?php if (get_field('time')): ?>
						<li>
							<label>
								<?php _e('拝観時間', 'twentytwelve'); ?>
							</label>
							<span>
								<?php the_field('time'); ?>
							</span>
						</li>
					<?php endif; ?>
					<?php if (get_field('phone')): ?>
						<li>
							<label>
								<?php _e('電話番号', 'twentytwelve'); ?>
							</label>
							<span>
								<?php the_field('phone'); ?>
							</span>
						</li>
					<?php endif; ?>
					<?php if (get_field('access_from_kyoto_station')): ?>
						<li>
							<label>
								<?php _e('京都駅からのアクセス', 'twentytwelve'); ?>
							</label>
							<span>
								<?php the_field('access_from_kyoto_station'); ?>
							</span>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>		
	</div>

	<?php
	$location = get_field('google_map');

	if (!empty($location)):
		?>
		<div class="h3-block">
			<h3 class="h3-title-bar">
				<?php _e('アクセスマップ', 'twentytwelve'); ?>
			</h3>
			<div class="google_map">
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNXdRtoQLoH8QMY6NCJzz7bi4_MnbAOug&v=3.exp&sensor=false"></script>
<script type="text/javascript">
	(function($) {

		/*
		 *  render_map
		 *
		 *  This function will render a Google Map onto the selected jQuery element
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	$el (jQuery element)
		 *  @return	n/a
		 */

		function render_map($el) {

			// var
			var $markers = $el.find('.marker');

			// vars
			var args = {
				zoom: 16,
				center: new google.maps.LatLng(0, 0),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			// create map	        	
			var map = new google.maps.Map($el[0], args);

			// add a markers reference
			map.markers = [];

			// add markers
			$markers.each(function() {

				add_marker($(this), map);

			});

			// center map
			center_map(map);

		}

		/*
		 *  add_marker
		 *
		 *  This function will add a marker to the selected Google Map
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	$marker (jQuery element)
		 *  @param	map (Google Map object)
		 *  @return	n/a
		 */

		function add_marker($marker, map) {

			// var
			var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

			// create marker
			var marker = new google.maps.Marker({
				position: latlng,
				map: map
			});

			// add to array
			map.markers.push(marker);

			// if marker contains HTML, add it to an infoWindow
			if ($marker.html())
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content: $marker.html()
				});

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {

					infowindow.open(map, marker);

				});
			}

		}

		/*
		 *  center_map
		 *
		 *  This function will center the map, showing all markers attached to this map
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	map (Google Map object)
		 *  @return	n/a
		 */

		function center_map(map) {

			// vars
			var bounds = new google.maps.LatLngBounds();

			// loop through all markers and create bounds
			$.each(map.markers, function(i, marker) {

				var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

				bounds.extend(latlng);

			});

			// only 1 marker?
			if (map.markers.length == 1)
			{
				// set center of map
				map.setCenter(bounds.getCenter());
				map.setZoom(16);
			}
			else
			{
				// fit to bounds
				map.fitBounds(bounds);
			}

		}

		/*
		 *  document ready
		 *
		 *  This function will render each map when the document is ready (page has loaded)
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	5.0.0
		 *
		 *  @param	n/a
		 *  @return	n/a
		 */

		$(document).ready(function() {

			$('.acf-map').each(function() {

				render_map($(this));

			});

		});

	})(jQuery);
</script>