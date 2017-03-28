<?php 
    include ("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_start();  
if(!empty($_POST['user'])) 
  {
    $u = $_POST['user'];
    $p = $_POST['password'];
    echo $u; 
    echo $p;
    $sql = "SELECT * FROM login WHERE username = '$u' AND password='$p'";
    $q = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_array($q); 
if(!empty($row['username']) AND !empty($row['password'])) 
  {
	session_start();    
    $_SESSION['username'] = $u; 
    header("location: dashboard.php");
    echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
  } 
else 
  { 
    echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
header("location:login.php");	
  }  
  } 
}

?>