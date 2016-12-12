<?php
	
$servername = "mysql.hostinger.fr";
$username = "u969633178_vince";
$password = "1234azerty";
$dbname = "u969633178_gps";

$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
$passuser = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$passuser = sha1($passuser);
$device = filter_var($_POST['device'], FILTER_SANITIZE_STRING);
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (user_name, password, device) VALUES ('".$user."', '".$passuser."', '".$device."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

if (!empty($user) && !empty($passuser) && !empty($device)) {
	header('Location: http://antivoliot.esy.es/index.php');
}

?>


	
	
	
	