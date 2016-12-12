<?php

session_start();

$servername = "mysql.hostinger.fr";
$username = "u969633178_vince";
$password = "1234azerty";
$dbname = "u969633178_gps";

$device = $_SESSION['device'];

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sth = $pdo->prepare("SELECT latitude, longitude FROM gps WHERE device = '".$device."' LIMIT 1");
	$sth->execute();
	$locations = $sth->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

//Encode the $locations array in JSON format and print it out.
header('Content-Type: application/json');
echo json_encode($locations);

?>