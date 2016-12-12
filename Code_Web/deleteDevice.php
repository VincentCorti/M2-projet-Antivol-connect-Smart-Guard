<?php
$device = $_POST['device'];

$servername = "mysql.hostinger.fr";
$username = "u969633178_vince";
$password = "1234azerty";
$dbname = "u969633178_gps";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sth = $pdo->prepare("DELETE FROM gps WHERE device = '" . $device . " ' LIMIT 1");
	$sth->execute();
	$locations = $sth->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

header('Location: http://antivoliot.esy.es/index.php');
?>