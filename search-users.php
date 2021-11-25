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
	
	$user_filter_button = $_POST["user_filter_button"];
	
	if ($user_filter_button === "email") {
		$user_filter_option = "email";
		$user_filter_value = $_POST["email"];
	} else if ($user_filter_button === "phone") {
		$user_filter_option = "phone";
		$user_filter_value = $_POST["phone"];
	} else if ($user_filter_button === "country") {
		$user_filter_option = "country";
		$user_filter_value = $_POST["countries"];
	}
	
	$cmd = "SELECT * FROM users WHERE ".$user_filter_option." = '".$user_filter_value."'";
	$result = $db->query($cmd);
	echo "<table>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Email</th>";
	echo "<th>Phone</th>";
	echo "<th>Country</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['country']."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	
	
	
	
}
?>