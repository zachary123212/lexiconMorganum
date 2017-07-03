<?php
require_once "vendor/autoload.php";
$loader = new Twig_Loader_Filesystem("templates");
$twig = new Twig_Environment($loader);
$db = new PDO("mysql:host=localhost;dbname=morganum",
"root", "root");

$entries = $db->query("SELECT englishword, latinword FROM dictionary;");

$englishToLatin = [];

while ($entry = $entries->fetch()) {
	$englishToLatin[$entry["englishword"]] = $entry["latinword"];
}

print $twig->render("index.html", ["englishToLatin" => $englishToLatin, "title" => "Lexicon Morganianum",
	"subtitle" => "An English-Latin Dictionary of Modern Words:"]);

?>
