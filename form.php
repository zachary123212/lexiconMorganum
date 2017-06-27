<?php

$item = $_GET["search"];

print("Results for: " . $item . " <br> <br>");
$db = new PDO("mysql:host=localhost;dbname=morganum",
"root", "root");

$db->query("USE morganum;");
$results = $db->query("SELECT * FROM dictionary WHERE englishword LIKE '$item';");

if ($results->rowCount() == 0){ 
	print("No results");
} else {
	while($row = $results->fetch()){
    	print("{$row['latinword']}");
	}
}
?>