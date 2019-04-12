<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<style type="text/css">
	* {box-sizing: border-box;}

body {
  margin: 0;
  background-color: white;
  font-family: Arial, Helvetica, sans-serif;
}

 
 
 


</style>
<head>
	<title>E-CITIZEN: REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
    
<div class="topnav">
  <a class="active" href="register.php">REGISTRATION PAGE</a>
  <a href="index.php">HOME</a>
  

  </div>
<body style="">
	<div class="header">
		<h2>E-CITIZEN REGISTRATION</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
 <div class="footer" style="position: fixed; bottom: 0px ;">
   <p class="fl_left" style=;">Copyright &copy; 2017 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
  
  </div>
</html>