<!DOCTYPE html>
<html>
<head>
  <style>img{ height: 100px; float: left; }</style>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
  <div id="placeholder">
 
</div>
<script>
(function() {
  $(document).ready(function(){
    $.getJSON("http://api.openweathermap.org/data/2.5/weather?callback=?&lat=35&lon=139",
        function(p){
            for (var key in p) {
  if (p.hasOwnProperty(key)) {
    alert(key + " -> " + p[key]);
  }
}
        });
  });
})();
</script>
 
</body>
</html>