<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	define("DATABASE_HOST", "localhost");
	define("DATABASE_USERNAME","root");
	define("DATABASE_PASSWORD","");
	define("DATABASE_NAME","AMOGUS_LOBBIES");
	
	$db = new mysqli(DATABASE_HOST,DATABASE_USERNAME,DATABASE_PASSWORD,DATABASE_NAME);
	
	if ($db->connect_error) {
		die('Error : ('. $db->connect_errno .') '. $db->connect_error);
	}
	
	$lobby_code = $_POST["lobby"];
	$map = $_POST["map"];
	$killer_count = $_POST["killer_count"];
	
	$cmd = "INSERT INTO lobbies (lobbycode, map, killer_count)
	VALUES ('$lobby_code','$map','$killer_count')";
	
	if ($db->query($cmd) === TRUE) {
		echo "entered";
	} else {
		echo $db->error;
	}
}
header("location: index.html");
?>