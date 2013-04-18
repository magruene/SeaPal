<?php
$con = mysql_connect("localhost","root","root");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("webtech2013", $con);
$sql="INSERT INTO weatherdata (WindStrength,  WindDirection,  AirPressure,  Temparature,  Unit,  Clouds,  Rain,  WaveHeight, WaveDirection, DateTime)
VALUES
('$_POST[wind_strength]','$_POST[wind_direction]','$_POST[air_pressure]','$_POST[air_temparature]','$_POST[temparature_unit]','$_POST[clouds]','$_POST[rain]','$_POST[wave_height]','$_POST[wave_direction]','$_POST[date]')";
if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}
echo "1 record added";
mysql_close($con);
?>