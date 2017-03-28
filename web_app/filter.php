<html>
<head>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script>
  $(document).ready(function() {
    $("#start_date").datepicker();
	$("#end_date").datepicker();
  </script>
</head>
<body>
<div class="index">
	<div style="float:left">
  <div class="button-container">
        <button name="submit"><span><a href="dashboard.php">Home</a></span></button>
      </div>
	 
  </div>
  <div style="float:right">
  <div class="button-container">
        <button name="submit"><span><a href="logout.php">Logout</a></span></button>
      </div>
  </div>
  </div>
<div class="container">
<div class="card">
<h1 class="title">Select Date Range</h1>
<form action = "selected.php" method = "post">
	<div class="input-container">
	<input id="start_date" name="to" required="required"/>
	<label for="#{label}">Start Date</label>
	 <div class="bar"></div>
	</div>
	<div class="input-container">
	<input id="end_date" name="fo" required="required" />
	 <label for="#{label}">End Date</label>
	 <div class="bar"></div>
	</div>
	<div class="button-container">
	<button id="a" name="submit" ><span>Search!</span></button>
	</div>
</form>	
</div>
</div>
</body>
</html>