<?php
session_start();// À placer obligatoirement avant tout code HTML.
 
$_SESSION['connect'] = 0; //Initialise la variable 'connect'.
$_SESSION['device'] = '';
$_SESSION['user_name'] = '';

$servername = "mysql.hostinger.fr";
$username = "u969633178_vince";
$password = "1234azerty";
$dbname = "u969633178_gps";

$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
$passuser = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$passuser = sha1($passuser);

try {
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sth = $pdo->prepare("SELECT user_name, device FROM user WHERE user_name = '".$user."' and password = '".$passuser."' LIMIT 1");
	$sth->execute();
	$connection = $sth->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

$pdo = null;


if (!empty($connection)) {
// Si le mot de passe et le login sont bons (valable pour 1 utilisateur ou plus). J'ai mis plusieurs identifiants et mots de passe.
	$_SESSION['connect'] = 1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y a eu identification.
	$_SESSION['login'] = $user;// Permet de récupérer le login afin de personnaliser la navigation.
	$_SESSION['device'] = $connection['device'];
	$_SESSION['user_name'] = $connection['user_name'];
	header('Location: http://antivoliot.esy.es/map.php');
} else {
	header('Location: http://antivoliot.esy.es/index.php');
}
