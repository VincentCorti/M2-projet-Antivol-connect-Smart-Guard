<?php
	session_start();
	$_SESSION = array();
	
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(),'',time()-4200,'/');
	}
	
	session_destroy();
	header('Location: http://antivoliot.esy.es/index.php');