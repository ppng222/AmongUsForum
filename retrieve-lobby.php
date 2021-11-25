<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	define("DATABASE_HOST", "localhost");
	define("DATABASE_USERNAME","root");
	define("DATABASE_PASSWORD","");
	define("DATABASE_NAME","AMOGUS_LOBBIES");
	
	$db = new mysqli(DATABASE_HOST,DATABASE_USERNAME,DATABASE_PASSWORD,DATABASE_NAME);
	
	if ($db->connect_error) {
		die('Error : ('. $db->connect_errno .') '. $db->connect_error);
	}
	
	$map = $_GET["map"];
	if ($map === "None") {
		$cmd = "SELECT * FROM lobbies";
	} else {
		$cmd = "SELECT * FROM lobbies WHERE map = '".$map."'";
	}
	$result = $db->query($cmd);
	echo "<table class=\"lobby_entry\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th class=\"lobby_entry_header\">Lobby Code</th>";
	echo "<th class=\"lobby_entry_header\">Map</th>";
	echo "<th class=\"lobby_entry_header\">Impostors</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td class=\"lobby_entry_text\">".$row['lobbycode']."</td>";
		echo "<td class=\"lobby_entry_text\">".$row['map']."</td>";
		echo "<td class=\"lobby_entry_text\">".$row['killer_count']."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	
	
	
	
}
?>