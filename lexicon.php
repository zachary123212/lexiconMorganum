<?php
require_once "vendor/autoload.php";
$loader = new Twig_Loader_Filesystem("templates");
$twig = new Twig_Environment($loader);
$db = new PDO("mysql:host=localhost;dbname=morganum",
"root", "root");

$entries = $db->query("SELECT englishword, latinword FROM dictionary;");

$latinWords = [];
$englishWords = [];

while ($entry = $entries->fetch()) {
	$englishWords[] = $entry["englishword"];
	$latinWords[] = $entry["latinword"];
}

print $twig->render("index.html", ["englishWords" => $englishWords, "latinWords" => $latinWords]); 

?>
