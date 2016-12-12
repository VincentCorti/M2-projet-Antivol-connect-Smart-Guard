<?php
	session_start();
?>
<!DOCTYPE html5>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Smart Guard</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
crossorigin="anonymous"></script>

	</head>
	<body>
		<form class="form-inline" method="post" action="connect.php">
			<div class="form-group"> <!-- Username field -->
				<input class="form-control" id="username_id" name="user" type="text" placeholder="Nom d'utilisateur"/>
			</div>
			<div class="form-group"> <!-- Password field -->
				<input class="form-control" id="password_id" name="password" type="password" placeholder="Mot de passe"/>
			</div>
			<div class="form-group"> <!-- Login button -->
				<button class="btn btn-primary " name="submit" type="submit">Login</button>
			</div>
		</form>
		<a href="signup.php">Créer un compte</a>
	</body>
</html>