<!DOCTYPE html>

<html lang="en" class="fuelux">
<head>

<!-- Header -->
<?php include('_include/header.php'); ?>
<link href="../css/app/map.css" rel="stylesheet" type="text/css" />
<link href="../css/app/contextMenu.css" rel="stylesheet" type="text/css" />
<link href="../css/app/checkbox.css" rel="stylesheet" type="text/css" />
	  	<style type="text/css">
		.olControlLayerSwitcher .layersDiv {
    background-color:#575757 !important;

    /* for IE */
    filter:alpha(opacity=90);
    /* CSS3 standard */
    opacity:0.9;
    border-radius: 4px;
    color: white;

    font-family: sans-serif;
    font-size: smaller;  
    font-weight: bold;
}
		</style>
<script type="text/javascript"
	src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://openweathermap.org/js/OWM.GoogleMap.1.0.js" ></script>
<script src="http://openlayers.org/api/OpenLayers.js"></script>
<script>
$(function(){
	$('.alert .close').live("click", function(e) {
	fetchWeatherWithCoords(39,139);
    $(this).parent().hide();
    window.setTimeout("showWeather()", 1000);
});});
</script>
<script>
$(function() {
	$('.dropdown-toggle').dropdown();
	});
</script>
<script type="text/javascript">
$(function() {
$('.layer').click(function(){
    var layerID = parseInt($(this).attr('id'));
    if ($(this).attr('checked')){
        var overlayMap = new google.maps.ImageMapType(overlayMaps[layerID]);
        map.overlayMapTypes.setAt(layerID, overlayMap);
        console.log("test overlay");
    } else {
        if (map.overlayMapTypes.getLength() > 0){
            map.overlayMapTypes.setAt(layerID, null);
        }
    }
});});
</script>
</head>
<body onload="initialize();">
	<!-- Navigation -->
	
	<!-- Container -->
	<div class="container-fluid">
		
		<!-- App Navigation -->
		<?php include('_include/navigation_app.php'); ?>
		<br />
		<br />
		<input type="checkbox" id="0" class="layer" /><label for="0">Flood Zones</label>
<input type="checkbox" id="1" class="layer" /><label for="1">Subdivisions</label>
		<div class="alert fade in" id="reminder" style="display: none;">
			<button type="button" class="close">x</button>
			It's about time to make another logbook entry? Click <a onclick="fetchWeatherWithCoords(); $('#myModal').modal('show')" href="#">here</a> or just ignore the message....
<div class="btn-group">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    Action
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><input type="checkbox" id="c1" name="cc" />
            <label for="c1"><span></span>Check Box 1</label>
            <p>
            <input type="checkbox" id="c2" name="cc" />
            <label for="c2"><span></span>Check Box 2</label>
            <p><br/></li>
  </ul>
</div>			
		
		</div>
		
          <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Weather Data</h3>
            </div>
            <div class="modal-body">
			The below form was already filled with the current weather data.
			As we know, nobody's perfect, so please check the fields and add/edit if deemed neccessary.   
				<?php include('app_weather_modal.php'); ?>
			</div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Save changes</button>
            </div>
          </div>
		<div id="images">
		<!-- Route Menu -->
		<div id="routeMenuContainer">
			<div id="routeMenu" class="well">
				<h4>Routen Menü</h4>
				<div class="btn-group btn-group-vertical">
					<input type="button" class="btn" value="l&ouml;schen"
						id="deleteRouteButton" class="routeButton"
						onclick="javascript: deleteRoute()" /> <input type="button"
						class="btn" value="speichern" id="saveRouteButton"
						class="routeButton" onclick="javascript: saveRoute()" /> <input
						type="button" class="btn" value="beenden" id="stopRouteButton"
						class="routeButton" onclick="javascript: stopRouteMode()" />
				</div>
				<br> <br>
				<div id="route_distance">
					Routen-L&auml;nge: <span id="route_distance_number"></span> m
				</div>
			</div>
		</div>

		<!-- Distance Menu -->
		<div id="distanceToolContainer">
			<div id="distanceToolMenu" class="well">
				<h4>Distanztool</h4>
				<input type="button" class="btn" value="beenden"
					id="stopDistanceToolButton" class="distanceToolbutton"
					onclick="javascript: stopDistanceToolMode()" /> <br> <br>
				<div id="distanceTool_distance">
					Distanz: <span id="distanceTool_number"></span> m
				</div>
			</div>
		</div>

		<!-- Navigation Menu -->
		<div id="navigationContainer">
			<div id="navigationMenu" class="well">
				<h4>Navigation</h4>
				<input type="button" class="btn" value="beenden"
					id="stopNavigationButton" class="distanceToolbutton"
					onclick="javascript: stopNavigationMode()" /> <br> <br>
				<div id="navigation_distance">
					Distanz: <span id="navigation_number"></span> m
				</div>
			</div>
		</div>

		<!-- Current Position -->
		<div id="followCurrentPositionContainer">
			<div id="followCurrentPosition_button" class="well">
				<input type="button" class="btn" value="Eigener Position folgen"
					id="followCurrentPositionbutton"
					onclick="javascript: toggleFollowCurrentPosition()" />
			</div>
		</div>


		<!-- Map -->
		<div id="appWrapper">
			<div id="map_canvas"></div>
		</div>

		<!-- Context Menus -->
		<div id="temporaryMarkerContextMenu"></div>
		<div id="fixedMarkerContextMenu"></div>
		<div id="routeContextMenu_active"></div>
		<div id="routeContextMenu_inactive"></div>
		<div id="chat" align="center">
			<div id="chat-area"
				style="height: 200px; width: 200px; background-color: white; overflow: auto;"></div>
		</div>

	</div>
	<!-- Container -->

	<!-- Java-Script -->
	<script src="../js/bootstrap/bootstrap-dropdown.js"></script>
	<script src="../js/bootstrap/bootstrap-modal.js"></script>
	<script src="../js/bootstrap/bootstrap-transition.js"></script>
	<script src="../js/bootstrap/bootstrap-button.js"></script>
	<script src="../js/bootstrap/bootstrap-collapse.js"></script>
	<script src="../js/bootstrap/bootstrap-affix.js"></script>

	<!-- Additional Java-Script -->
	<script src="../js/app/map/fancywebsocket.js" type="text/javascript"></script>
	<script src="../js/app/map/chat.js" type="text/javascript"></script>
	<script src="../js/app/map/labels.js" type="text/javascript"></script>
	<script src="../js/app/map/map.js" type="text/javascript"></script>
	<script src="../js/app/map/map_routes.js" type="text/javascript"></script>
	<script src="../js/app/map/validation.js" type="text/javascript"></script>
	<script src="../js/app/map/contextMenu.js" type="text/javascript"></script>
	<script src="../js/app/map/TxtOverlay.js" type="text/javascript"></script>

</body>
</html>
