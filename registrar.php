  
  <?php
  include('server.php');
  session_start();
  if (!isset($_SESSION['email_registrar'])) {
    
    header('location: registrar_login.php');
  }



  $email_registrar = $_SESSION['email_registrar'];

  ?>
<!DOCTYPE html>
<html>
 <style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

  
 .topnav .btn{
  float: left;
  margin-left: 10px;
 }




</style>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <title>E-CITIZEN: REGISTRAR</title>
    
</head>
  <body>
 <div class="topnav">
  <a class="active" href="#"> APPLICANT EMAIL </a>
   
  
 <a href="index.php">E-CITIZEN HOME</a>
  
 
 <a href="logout_registrar.php" class="btn">LOGOUT</a>
 <a href="registrar_zone.php" class="btn">MANAGE PROFILE</a>
 <a href="re_print.php" class="btn">RE PRINT</a>
  <a href="succesful_applicants.php" class="btn">SUCCESSFUL APPLICANTS</a>
  </div>
 
   
    <div class="header">
        <h2> APPLICANT : User Email</h2>
    </div>
    
    <form method="post" action="registrar.php">

        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Email Adress</label>
            <input type="email" name="email" >
        </div>
         
        <div class="input-group">
            <p style="text-align: center; width: 100%;   border-top: 10px; margin-top: 10px"><button type="submit" class="btn" name="submit_user_email">SUBMIT</button></p>
        </div>
         
    </form>
 
   <div style="padding-bottom: 200px;">
     

     </div>

 
<div class="footer" style="position: fixed; bottom: 0px ;">
   <p class="fl_left" style=;">Copyright &copy; 2017 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
  
  </div>
  </body>
</html>

