<?php
$con	=	mysql_connect("localhost","testuser","testuser");

$db_selected = mysql_select_db('webtech2013', $con);
if (!$db_selected) {
	if	(mysql_query("CREATE	DATABASE	webtech2013",$con))
	{
		echo	"Database	created";
	}
	else
	{		echo	"Error	creating database:	"	.	mysql_error();
	}
	//	Create	table
	mysql_select_db("webtech2013",	$con);
	$sql	=	"CREATE	TABLE	WeatherData (
			ID int not null auto_increment,
			WindStrength varchar(15),
			WindDirection varchar(15),
			AirPressure varchar(15),
			Temparature varchar(15),
			Unit varchar(15),
			Clouds varchar(1),
			Rain varchar(1),
			WaveHeight varchar(15),
			WindDirection varchar(10),
			DateTime datetime,
			Primary Key(ID)
			)";
	//	Execute	query
	mysql_query($sql,$con);
}

?>