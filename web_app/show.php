<?php
 
  include 'connection.php';
 
  $q = "SELECT IP_addr, Timestamp, Latitude, Longitude FROM web_app WHERE Timestamp > date_sub(now(), interval 5 minute)";
  $apikey = "AIzaSyBEedeJIUKNf9ab5PFpNZJdvS4W6eMcrag";
$result = mysqli_query($conn,$q);
if (!$result) 
{
  die('Invalid query: ' . mysqli_error());
}
$new = array();
while ($row = @mysqli_fetch_assoc($result)){
	$lat = $row['Latitude'];
	$lon = $row['Longitude'];
	$IP = long2ip($row['IP_addr']);
	$Time = $row['Timestamp'];
	$data = $lat.", ". $lon .", ". $IP .", ". $Time;
	array_push($new,$data);
} 
?>
<html>
  <head>
  <link rel="stylesheet" href="style.css">
    </head>
  <body onload="initMap()">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEedeJIUKNf9ab5PFpNZJdvS4W6eMcrag">
    </script>
    <script type="text/javascript">
 function initMap() 
 {
	 var mapOptions = {
            center: new google.maps.LatLng(0,0),
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP};
 map = new google.maps.Map(document.getElementById('map'),mapOptions);

 var arr =  <?php echo json_encode($new); ?>;
for(var i=0; i<arr.length;i++)
{
    var lat = Number(arr[i].split(",")[0].trim());
    var lon = Number(arr[i].split(",")[1].trim());
	var IP  = arr[i].split(",")[2].trim();
	var Time = arr[i].split(",")[3].trim();
    var four = new google.maps.LatLng(parseFloat(lat),parseFloat(lon));
	add(four,IP,Time);
    
}
 }	
	
function add(four,IP,Time)
{	
	
	var marker=new google.maps.Marker({
                map:map,
	position:four });
				
	var popup = new google.maps.InfoWindow({
 content: "<div class='popup' style = 'height:60px;width:200px'><b>Your location:</b><br />IP address: " + IP + "<br />Timestamp: " + Time
 }); 
var currentPopup;
google.maps.event.addListener(marker, "click", function() {
 if (currentPopup != null) {
 currentPopup.close();
 currentPopup = null;
 }
 popup.open(map, marker);
 currentPopup = popup;
 });
 google.maps.event.addListener(popup, "closeclick", function() {
 currentPopup = null;
 }); 
 }
    </script>
	<div class="index">
	<div style="float:left">
  <div class="button-container">
        <button name="submit"><span><a href="dashboard.php">Home</a></span></button>
      </div>
  </div>
	
  <?php echo 'Current Users'; ?>
  <div style="float:right">
  <div class="button-container">
        <button name="submit"><span><a href="">Logout</a></span></button>
      </div>
  </div>
  </div>
	<div  style="height:100%; width:100%;">
    <div id="map" style="width:99vw; height: 90vh; margin:2px auto; display:inline-block" >
	</div>
	</div>
  </body>
</html>