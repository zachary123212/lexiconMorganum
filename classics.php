<?php
$db = new PDO("mysql:host=localhost;dbname=classics", "root",
"root");
$db->query("DROP TABLE IF EXISTS dictionary;");
$db->query("CREATE TABLE dictionary (id INT AUTO_INCREMENT
PRIMARY KEY, parts VARCHAR(255), tense VARCHAR(16), mood
VARCHAR(16), voice VARCHAR(16), form VARCHAR(32));");
$statement = $db->prepare("INSERT INTO dictionary VALUES
(NULL, :parts, :tense, :mood, :voice, :form);");
$content = file_get_contents("grammar.json");
$words = json_decode($content, true);
foreach ($words as $word) {
$parts = $word["parts"];
$class = $word["class"];
foreach ($word["conjugations"] as $tense => $moods) {
foreach ($moods as $mood => $voices) {
foreach ($voices as $voice => $forms) {
foreach ($forms as $form) {
	print($parts);
$statement->execute([":parts" => $parts, ":tense" => $tense,
":mood" => $mood, ":voice" => $voice, ":form" => $form]);
}
}
}
}
}
?>