 <?php include('server.php') ?>





<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

 
 
 
 
</style>
<head>
	<title>E-CITIZEN: REGISTRAR LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
 
</head>
<body>

 <div class="topnav">
  <a class="active" href="#"> REGISTRAR LOGIN PAGE</a>
   
  
 <a href="index.php">E-CITIZEN HOME</a>
  </div>




 

 


	<div class="header">
		<h2> REGISTRAR LOGIN</h2>
	</div>
	
	<form method="post" action="registrar_login.php">

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
			<button type="submit" class="btn" name="login_registrar">Login</button>
		</div>
		 
	</form>


 <div style="padding-bottom: 100px;">
     

 </div>

     

 </div>
 </body>
 <div class="footer" style="position: fixed; bottom: 0px ;">
   <p class="fl_left" style=;">Copyright &copy; 2017 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
 	
  </div>
   
</html>