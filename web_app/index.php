<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="style.css">
<title>Web Application </title>
</head>
<?php 
$ip  = !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$url = "http://freegeoip.net/json/$ip";
$ch  = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
$data = curl_exec($ch);
curl_close($ch);
if ($data) 
{
    $location = json_decode($data);
    $lat = $location->latitude;
    $lon = $location->longitude;
}
session_start();
date_default_timezone_set('America/New_York');
$_SESSION['IP_addr'] = $_SERVER["REMOTE_ADDR"];
$_SESSION['lat'] = $lat;
$_SESSION['long'] = $lon;
$_SESSION['Timestamp']= date('Y-m-d H:i:s', time());
include 'data_insert.php'
?>
<script type="text/javascript">
var la = <?php echo json_encode($lat); ?>;
var lo = <?php echo json_encode($lon); ?>;
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="ip.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEedeJIUKNf9ab5PFpNZJdvS4W6eMcrag"></script>
<body onload="showPosition()">
<div style="float:left">
<div class="button-container">
<button />
</div>
 </div>
<div class="index">
<?php echo 'Welcome to IP tracing web application'; ?>
<div style="float:right">
  <div class="button-container">
        <button name="submit"><span><a href="login.php">Login</a></span></button>
      </div>
  </div>
</div>
<div>
<p align="center" style="font-size:24px">Your IP Address is:</p>
</div >
<div align="center" style="font-size:24px">
<?php echo $_SERVER["REMOTE_ADDR"]; ?>
</div>
<div id="demo" style="width: 90%; height: 90%; position:fixed; text-align:center">
<div id="dvMap" style="width:99vw; height: 75vh; margin:0px auto; display:inline-block" />
</div>
</body>
</html>
