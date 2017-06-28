<?php

$item = $_GET["search"];

print("Results for: " . $item . " <br> <br>");
$db = new PDO("mysql:host=localhost;dbname=morganum",
"root", "root");

$db->query("USE morganum;");

$resultsEnglish = $db->query("SELECT * FROM dictionary WHERE englishword LIKE
    '$item%';");

$resultsLatin = $db->query("SELECT * FROM dictionary WHERE latinword LIKE
    '$item%';");

if (($resultsEnglish->rowCount() == 0) && ($resultsLatin->rowCount() == 0)){
	print("No results");
} else {
	while($row = $resultsEnglish->fetch()){
        print("{$row['englishword']}: {$row['latinword']}<br>");
    }
    while($row = $resultsLatin->fetch()){
        print("{$row['latinword']}: {$row['englishword']}<br>");
    }
}
?>
