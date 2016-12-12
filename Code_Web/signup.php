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
		<form class="form-horizontal" action='register.php' method="POST">
		  <fieldset>
			<div id="legend">
			  <legend class="">Formulaire d'enregistrement</legend>
			</div>
			<div class="control-group">
			  <!-- Username -->
			  <label class="control-label"  for="user">Nom d'utilisateur</label>
			  <div class="controls">
				<input type="text" id="username" name="user" placeholder="" class="input-xlarge">
				<p class="help-block">Le nom d'utilisateur doit contenir des lettres, des chiffres sans espace</p>
			  </div>
			</div>
		 
			<div class="control-group">
			  <!-- E-mail -->
			  <label class="control-label" for="device">Numéro de la carte</label>
			  <div class="controls">
				<input type="text" id="device" name="device" placeholder="" class="input-xlarge">
				<p class="help-block">S'il vous plaît renseignez le numéro de la carte</p>
			  </div>
			</div>
		 
			<div class="control-group">
			  <!-- Password-->
			  <label class="control-label" for="password">Password</label>
			  <div class="controls">
				<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
				<p class="help-block">Le mot de passe de passe doit contenir au moins 4 caractères</p>
			  </div>
			</div>
		 
			<div class="control-group">
			  <!-- Button -->
			  <div class="controls">
				<button class="btn btn-success">Register</button>
			  </div>
			</div>
		  </fieldset>
		</form>
	</body>
</html>
	
	