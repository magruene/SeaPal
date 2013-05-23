
<html>
<head>

<title>Open Weather Map</title>

    <style type="text/css">
        #basicMap {
            width: 100%;
            height: 99%;
            border: 1px solid black;
        }
    </style>

<script src="http://code.jquery.com/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://openweathermap.org/js/OWM.GoogleMap.1.0.js" ></script>

</head>

<body>
<div id="basicMap"></div>
</body>

<script type="text/javascript">
	var station_list;

	var map;
	var markersArray = [];
	var iActiveMarker = -1;

window.onload = function(e){ 

	var lat=55.8;
	var lng=37.5;

	var point = new google.maps.LatLng(lat, lng);
	var myOptions = {
		zoom: 10,
		center: point,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("basicMap"),myOptions);
        google.maps.event.addListener(map, 'idle', function(){
		var bounds = map.getBounds();
		var ln = bounds.getNorthEast();
		var ln2 = bounds.getSouthWest();
		var z = map.getZoom();
		var myhre = 'http://openweathermap.org/data/getrect?type=city&cnt=200&lat1='+ 
			ln2.lat() + '&lat2='+ ln.lat() + '&lng1=' + ln2.lng() + '&lng2='+ ln.lng()+
			"&cluster=yes&zoom="+z+"&callback=?";
		$.getJSON(myhre,getData);
	} );

}


function getData(s)
{
	station_list = s;

	if(station_list.cod != '200') {
		alert('Ошибка '+ JSONobject.message);
		return;
	}

	deleteOverlays();

	infowindow = new google.maps.InfoWindow({
		content: "place holder",
		disableAutoPan: false
	})


for(var i = 0; i <  station_list.list.length; i ++){
	var p = new google.maps.LatLng(station_list.list[i].lat, station_list.list[i].lng);

	var temp = station_list.list[i].temp -273;
	temp = Math.round(temp*100)/100;

	img = GetWeatherIcon(station_list.list[i]);
	var html_b = '<div style="background-color:#ffffff; opacity:0.7;border:1px solid #777777;" >\
		<img src="http://openweathermap.org'+img+'" height="50px" width="60px" style="float: left; "><b>'+temp+'C</b></div>';

	var m = new StationMarker(p, map, html_b);
	m.station_id=i; 
	markersArray.push(m);

  }



}

var obj;

function deleteOverlays() {
  var temp_marker;
  if (markersArray) {
    for (i in markersArray) {
	if(obj!=markersArray[i]) {
	      markersArray[i].setMap(null);
	}
    }
    markersArray.length = 0;
    if( temp_marker != undefined ) {
	markersArray.push(temp_marker);
	iActiveMarker = -1;
    }
  }
}

</script>


<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31601618-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</html>
