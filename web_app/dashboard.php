<head>
<?PHP
session_start();
if(!$_SESSION['username'])  
{  
  
    header("Location: login.php");
}   
?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
 <link rel="stylesheet" href="style.css">
<title>Dashboard</title>
  </head>
  <body>
  <div style="float:left">
  <div class="button-container">
  <button />
  </div>
  </div>
  <div class="index">
  <?php echo 'Welcome to Dashboard'; ?>
  <div style="float:right">
  <div class="button-container">
        <button name="submit"><span><a href="logout.php">Logout</a></span></button>
      </div>
  </div>
  </div>
  <div class="container">
  <div class="card">
  <h1 class="title">Select</h1>
  <div class="button-container">
        <button name="submit"><span><a href="show.php">Current Users</a></span></button>
      </div>
	  <div class="button-container">
        <button name="submit"><span><a href="filter.php">Select Users</a></span></button>
      </div>
  </div>
  </div>
  </body>
</html>
