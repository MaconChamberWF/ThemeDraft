<div id="map"></div>
<script type="text/javascript">
		var locations = [
			<?php while($communities->have_posts()): $communities->the_post(); ?>
				<?php if(get_field('latitude') && get_field('longitude')): ?>
					<?php echo '["' . get_the_title() . '", ' . get_field('latitude') . ', ' . get_field('longitude') . ', "' . get_permalink() . '"],'; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		];

		var initMap = function() {
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 11,
					center: new google.maps.LatLng(32.8535841,-83.7791614),
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});

				var infowindow = new google.maps.InfoWindow();
				var marker, i;
				var markers = [];
				var panels = document.querySelectorAll('[data-map-panel]');
				var icon = {
			    url: '<?php echo get_template_directory_uri(); ?>/_assets/icon-marker.svg',
			    scaledSize: new google.maps.Size(24, 34),
			    origin: new google.maps.Point(0,0),
			    anchor: new google.maps.Point(12,34)
				};

				var iconActive = {
			    url: '<?php echo get_template_directory_uri(); ?>/_assets/icon-marker-active.svg',
			    scaledSize: new google.maps.Size(24, 34),
			    origin: new google.maps.Point(0,0),
			    anchor: new google.maps.Point(12,34)
				};

				for (i = 0; i < locations.length; i++) {
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(locations[i][1], locations[i][2]),
						icon: icon,
						map: map,
						id: i
					});

					// push marker to all array
					markers.push(marker);

					// Add click event for each marker
					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							// Revert all markers back
							for (i = 0; i < markers.length; i++) {
								markers[i].setIcon(icon);
							}
							// Make the clicked icon active
							marker.setIcon(iconActive);
							// Open nav panel
							togglePanel(marker.id);
						}
					})(marker, i));

          // Set first marker to active
          markers[0].setIcon(iconActive)
				}

				// Toggle Nav Function
				function togglePanel(id) {
					for (i = 0; i < panels.length; i++) {
						panels[i].classList.remove('is-active');
					}
					for (i = 0; i < markers.length; i++) {
						markers[i].setIcon(icon);
					}
					if(id || id === 0) {
						document.querySelector('[data-map-panel="' + id + '"]').classList.add('is-active');
						markers[id].setIcon(iconActive);
					}
				}
		}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBj_3Q0pl_WUWFlB3-c8Njp75N_riYI-E8&callback=initMap"></script>