<?php
   	define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', '');
   	define('DB_DATABASE', 'mydb');
   	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$sql = "SELECT avatar FROM user WHERE id = '1'";
   	$pathResult = mysqli_query($db,$sql);
   	$locations = array();
	while($row = mysqli_fetch_array($pathResult)){
    	$locations[] = $row;
	}
   	$avatar =$locations[0]['avatar'];
?>