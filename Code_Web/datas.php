<?php
$servername = "mysql.hostinger.fr";
$username = "u969633178_vince";
$password = "1234azerty";
$dbname = "u969633178_gps";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO gps (latitude, longitude, time, device) VALUES ('".$_REQUEST['slot_lat']."','".$_REQUEST['slot_lon']."','".$_REQUEST['time']."','".$_REQUEST['device']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();