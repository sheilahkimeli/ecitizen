<?php include('server.php');

if (isset($_POST['comment_btn'])) {
     
        $username =  $_POST['username'];
        $email = $_POST['email'];
    
        $comment = $_POST['comment'];
          

    if (empty($username)) { array_push($errors, "Username is required"); }
    
    if (empty($email)) { array_push($errors, "Email is required"); }
     
     
   
if (count($errors) == 0) {

       $sql = "SELECT * FROM users WHERE email='$email'";
       $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
      
   $query = "INSERT INTO comments (username, email, comment) 
            VALUES ('$username', '$email', '$comment')";
      $results = mysqli_query($db, $query);


         $success =  "<div class=success>"."COMMENT SUCCESFULLY SUBMITED"."</div>";
       
    }

    else{
    	array_push($errors, "You should be a member to submit your comment, kindly register");
    }
   

}
}
 ?>
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
	<title>E-CITIZEN: CONTACT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
    
<div class="topnav">
  
   <a class="active" href="#">CONTACT</a>
  
 
  <a href="about.php">ABOUT</a>
   <a  href="home.php">HOME</a>

  </div>
<body style="">
      <?php echo  $success ?>
	<div class="header">
		<h2>CONTACT US</h2>
	</div>
	
	<form method="post" action="contact.php">
     <?php include('errors.php'); ?>
		

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required="">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" required="">
		</div>
		<div class="input-group">
			<label>Comment</label>
			 <textarea name="comment" class="input-group" style="height: 60px; width: 90%;" required="required"></textarea>
		</div>
		 
		<div class="input-group">
			<button type="submit" class="btn" name="comment_btn">SUBMIT</button>
		</div>
		 
	</form>
</body>
<div class="footer">
   <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
 	
  </div>
</html>