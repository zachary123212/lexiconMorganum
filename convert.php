<?php
$db = new PDO("mysql:host=localhost;dbname=morganum", "root",
"root");
$db->query("DROP TABLE IF EXISTS dictionary;");
$db->query("CREATE TABLE dictionary (id INT AUTO_INCREMENT
PRIMARY KEY, englishword VARCHAR(32), latinword VARCHAR(32));");
$statement = $db->prepare("INSERT INTO dictionary VALUES
(NULL, :englishword, :latinword);");
$content = file_get_contents("rawData.json");
$words = json_decode($content, true);
foreach ($words as $word) {
$englishword = $word["englishword"];
$latinword = $word["latinword"];
print($englishword . "  ");
print($latinword . " ");
$statement->execute([":englishword" => $englishword, ":latinword" => $latinword]);
}
?>

