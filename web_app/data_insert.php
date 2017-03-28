<?php
include 'connection.php' ;
$IP_addr = ip2long($_SESSION['IP_addr']);
$lat =  $_SESSION['lat'];
$long = $_SESSION['long'];
$Timestamp = $_SESSION['Timestamp']; 
$sql = "INSERT INTO web_app (IP_addr,Latitude,Longitude) VALUES ($IP_addr,$lat,$long)";
$bool = mysqli_query($conn, $sql);
?>

