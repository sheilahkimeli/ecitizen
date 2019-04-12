<?php include('server.php') ?>





<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="layout/styles/lay.css" rel="stylesheet" type="text/css" media="all">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
 


.topnav {
  overflow: hidden;
  background-color: black;
}

.topnav a {
  float: right;
  display:inline-block;
  color:cyan;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  color: blue;
 
}

.topnav a.active {
   
  color: blue;
}
  
 
</style>
<head>
	<title>E-CITIZEN: LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
 
</head>
<body style="background-color:white;">
<div class="topnav">
  <a class="active" href="login.php">LOGIN PAGE</a>
  <a href="index.php">HOME</a>
  

  </div>




	<div class="header">
		<h2> E-CITIZEN LOGIN </h2>
	</div>
	
	<form method="post" action="login.php">

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
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
 
  <div class="footer" style="position: fixed; bottom: 0px ;">
   <p class="fl_left" style=;">Copyright &copy; 2017 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
 	
  </div>
</html>