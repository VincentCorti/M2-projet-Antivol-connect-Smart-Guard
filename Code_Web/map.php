<?php
session_start();
if (isset($_SESSION['connect'])) {//On vérifie que le variable existe.

    $connect=$_SESSION['connect'];//On récupère la valeur de la variable de session.
}
else {
    $connect=0;//Si $_SESSION['connect'] n'existe pas, on donne la valeur "0".
}
       
if ($connect == "1") {// Si le visiteur s'est identifié.
// On affiche la page cachée.
?>
<!DOCTYPE html5>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Smart Guard</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcDE8rQKpqH6g9wdOJMXOQstjFEKuW0Eo" type="text/javascript"></script>

    <script type="text/javascript">
    function load() {

      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(42.3094, 9.1490),
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.TERRAIN
      });

      function locationsMarkers() {

	   google.maps.Map.prototype.clearMarkers = function() {
          for(var i=0; i < this.markers.length; i++){
            this.markers[i].setMap(null);
          }
          this.markers = new Array();
        };

        $.ajax({
              url: 'get-locations.php',
              success:function(data){
                  //Loop through each location.
                  $.each(data, function(){
                      //Plot the location as a marker
                      var pos = new google.maps.LatLng(this.latitude, this.longitude); 
                      new google.maps.Marker({
                          position: pos,
                          map: map
                      });
                  });
              }
          });
      }
 
      locationsMarkers();

      setInterval(locationsMarkers, 1000 * 30);

    function showDevices() {
    	document.getElementById("txtHint").innerHTML = "";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","locations.php",true);
        xmlhttp.send();
    }

    showDevices();

    setInterval(showDevices, 1000 * 30);


  }
  </script>
  </head>

  <body onload="load()">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Smart Guard</a>
		  <form method="POST" action="deconnexion.php" class="form-inline">
			<button type="submit" class="btn btn-default">Déconnexion</button>
		  </form>
        </div>
      </div><!-- /.container-fluid -->
    </nav>
	<p> Bienvenue <?php echo $_SESSION['user_name']; ?> !</p>
    <div id="map" style="width: 75%; height: 75%; margin: 0 auto;"></div>
	   <br />
      <div class="col-sm-offset-1">
        <form method="POST" action="deleteDevice.php" class="form-inline">
          <div class="form-group">
            <label for="device"> Numéro du device : </label>
            <input type="text" required="true" class="form-control" id="device" name="device" placeholder="Numéro du device">
  	      </div>
          <button type="submit" class="btn btn-default">Supprimer</button>
        </form>
      </div>
      <div class="col-sm-10 col-sm-offset-1">
        <table class="table table-hover">
          <thead>
        	  <th>Latitude</th>
        	  <th>Longitude</th>
        	  <th>Date</th>
        	  <th>Device</th>
  	      </thead>
    	    <tbody id="txtHint">
    	    </tbody>
        </table>
    </div>
  </body>
</html>
<?php
}
 
else // Le mot de passe n'est pas bon.
{
// On affiche la zone de texte pour rentrer le mot de passe.
header('Location: http://antivoliot.esy.es/index.php');
}
?>
