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
    $sth = $pdo->prepare("SELECT id, latitude, longitude, time, device FROM gps WHERE device = '".$device."' ORDER BY id ASC");
    $sth->execute();
    $locations = $sth->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

foreach($locations as $location){ 
  $ts = (!empty($location['time'])) ? $location['time'] : 0;
  $date = new DateTime("@$ts");
  $date->setTimezone(new DateTimeZone('Europe/Paris'));	

  echo "<tr>
    <td>" . $location['latitude'] . "</td>
    <td>" . $location['longitude'] . "</td>
    <td>" . $date->format('d/m/Y H:i:s') . "</td>
    <td>" . $location['device'] . "</td>
  </tr>";
}

?>