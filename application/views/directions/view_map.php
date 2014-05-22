<?php
?>
<h1>View map!</h1>

<?php

//echo anchor('mailing_list/view/' . $row->userid,"View User");
// echo '<p>' . $story->description . '</p><br /><br />';
//echo '<p>Lat is' . $sLat . '</p><br /><br />';
//echo '<p>Long is' . $sLng . '</p><br /><br />';


?>
<?php
//$dLat = '45.5409105';
//$dLng = '-122.6637327';

//$dLat = $data['dLat'];
//$dLng = $data['dLng'];

$sLat = '47.5388878';
$sLng = '-122.38464139999999';
//$dLat = $lat;
//$dLng = $lng;

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;

		function initialize() {
		  directionsDisplay = new google.maps.DirectionsRenderer();
		  var myStart = new google.maps.LatLng(<?=$sLat?>, <?=$sLng?>);
		  var mapOptions = {
			zoom:7,
			center: myStart
		  }
		  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		  directionsDisplay.setMap(map);
		  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
		  calcRoute();
		}

		function calcRoute() {
		  var start = new google.maps.LatLng(<?=$sLat?>, <?=$sLng?>);
		  var end = new google.maps.LatLng(<?=$dLat?>, <?=$dLng?>);
		  var request = {
			  origin:start,
			  destination:end,
			  travelMode: google.maps.TravelMode.DRIVING
		  };
		  directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
			  directionsDisplay.setDirections(response);
			}
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
	<div id="map-canvas" style="float:left;width:70%; height:100%"></div>
	<div id="directionsPanel" style="float:right;width:30%;height 100%"></div>
  </body>

