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
	
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$country = $_POST["countries"];
	if (isset($_POST['states']))
	{
		$states = $_POST['states'];
	} else {
		$states = NULL;
	}
	
	$cmd = "INSERT INTO users (email, phone, country, state)
	VALUES ('$email','$phone','$country', '$states')";
	
	if ($db->query($cmd) === TRUE) {
		echo "entered";
	} else {
		echo $db->error;
	}
}

?>