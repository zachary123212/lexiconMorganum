<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "morganum";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS morganum;";
if ($conn->query($sql) === FALSE) {
    echo "Error creating database: " . $conn->error;
}
$db = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username,
$password);

$conn->close();

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
$statement->execute([":englishword" => $englishword, ":latinword" => $latinword]);
}
?>

