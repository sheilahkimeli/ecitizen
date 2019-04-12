 <?php include('server.php') ?>





<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
</style>
<head>
	<title>E-CITIZEN :CHIEF LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div class="topnav">
  <a class="active" href="#"> CHIEF LOGIN PAGE</a>
   
  
 <a href="index.php">E-CITIZEN HOME</a>
  </div>
<body style>

	<div class="header">
		<h2>CHIEF LOGIN</h2>
	</div>
	
	<form method="post" action="chief_login.php" class="application_form">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Email Adress</label>
			<input type="email" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_chief">Login</button>
		</div>
		 
	</form>


    <div style="padding-bottom: 100px;">
     

 </div>
 </body>
 <div class="footer" style="position: fixed; bottom: 0px ;">
    <p class="fl_left" style=;">Copyright &copy; 2017 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
 	
  </div>
   
</html>