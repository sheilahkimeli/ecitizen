 <?php 
 include('server.php');
session_start();

if (!isset($_SESSION['email_admin'])) {
    
    header('location: admin_login.php');
  }
   $email = $_SESSION['email_admin'];

  
        
  $success = '';
 
 // UPDATE ADMIN
 
if (isset($_POST['update'])) {

        $first_name =  $_POST['first_name'];
    
       $surname =  $_POST['surname'];
        $password =  $_POST['password'];
        $pass =  $_POST['pass'];
        
		if (empty($first_name)) { array_push($errors, "First Name is required"); }
		if (empty($surname)) { array_push($errors, "Surname is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }
		if (empty($pass)) { array_push($errors, "Password is required"); }

		if ($password != $pass) {
			array_push($errors, "The two passwords do not match");
		}
 
		if (count($errors) == 0) {
 

    $updatequery = "UPDATE administrators SET first_name = '$first_name', surname ='$surname', password ='$password' WHERE email = '$email'  ";

     mysqli_query($db, $updatequery);

  
$success =  "<div class=success>"."PROFILE UPDATED SUCCESFULLY"."</div>";
     }
  }
 
//REGISTRAR
  if (isset($_POST['add_registrar'])) {
     
        $first_name_registrar =  $_POST['first_name_registrar'];
     
        $surname_registrar =  $_POST['surname_registrar'];
    
        $email_regisrar = $_POST['email_regisrar'];
    
        $password_registrar = $_POST['password_registrar'];
          

    if (empty($first_name_registrar)) { array_push($errors, "First name is required"); }
    
    if (empty($surname_registrar)) { array_push($errors, "Surname is required"); }
    if (empty($email_regisrar)) { array_push($errors, "Email is required"); }
    if (empty($password_registrar)) { array_push($errors, "Password is required"); }
   
if (count($errors) == 0) {




       $sql = "SELECT * FROM registrators WHERE email='$email_regisrar'";
       $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
      array_push($errors, "Registrar is already in the System");


    }
    else {

   $query = "INSERT INTO registrators (first_name, surname, email, password) 
            VALUES ('$first_name_registrar', '$surname_registrar', '$email_regisrar', '$password_registrar')";
      $results = mysqli_query($db, $query);


                   $success =  "<div class=success>"."REGISTRAR ADDED SUCCESFULLY"."</div>";
       
    }
   
  }
}


//CHIEF


 if (isset($_POST['add_chief'])) {
     
        $first_name_chief =  $_POST['first_name_chief'];
     
        $surname_chief =  $_POST['surname_chief'];
    
        $email_chief = $_POST['email_chief'];
    
        $password_chief = $_POST['password_chief'];
          

    if (empty($first_name_chief)) { array_push($errors, "First name is required"); }
    
    if (empty($surname_chief)) { array_push($errors, "Surname is required"); }
    if (empty($email_chief)) { array_push($errors, "Email is required"); }
    if (empty($password_chief)) { array_push($errors, "Password is required"); }
   
if (count($errors) == 0) {




       $sql = "SELECT * FROM chief WHERE email='$email_chief'";
       $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
      array_push($errors, "Chief is already in the System");


    }
    else {

   $query = "INSERT INTO chief (first_name, surname, email, password) 
            VALUES ('$first_name_chief', '$surname_chief', '$email_chief', '$password_chief')";
      $results = mysqli_query($db, $query);


                   $success =  "<div class=success>"."CHIEF ADDED SUCCESFULLY"."</div>";
       
    }
   

}
}






?>
 
<!doctype html>
<html>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

 .container {
  text-align:center;
  padding-top: 20px;
 
}
.container table {
  
   
    
    margin: 0 auto;
   
}
input{
 text-transform: capitalize;

}
.topnav .btn{
  float: left;
  margin-left: 10px;
 }
</style>
<head>
<meta charset="utf-8">
<title>E-CITIZEN: ADMINISTRATOR</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all" />
  
</head>
  
 <body>
 <div class="topnav">
  <a class="active" href="#">HOME</a>
    <a href="index.php">E-CITIZEN HOME</a>
    
   <a href="logout_admin.php" class="btn">LOGOUT</a>
 
  
  </div>
 
    <div><?php include('errors.php');?></div>

      <?php echo  $success ?>
 
   
 
 
  <?php
        $email = $_SESSION['email_admin'];
 $sql = "SELECT * FROM administrators WHERE email = '$email'";
$result = mysqli_query($db, $sql);
   while ($row=mysqli_fetch_array($result)) {
          echo "<div class=container>";
        echo "<table cellspacing=5px>";
           echo "<thead>"."MY PROFILE"."</thead>";
     echo "<form action='admin_home.php' method='post'>";
    echo "<tr style=text-align:left;>";
echo "<th>"."EMAIL"." </th>"; 
 echo "<td>" . "<input type=text   name=email_chief size=auto readonly value=" .$row['email'].">" . "</td>";
      echo"</tr>";

      echo "<tr style=text-align:left;>";
 echo "<th>"."FIRST NAME"."</th>";     
 echo "<td>" . "<input type=text   name=first_name size=auto  value=" .$row['first_name'].">" . "</td>";
        echo "</tr>";

        echo "<tr style=text-align:left;>";
 echo "<th>"."SURNAME"."</th>";     
echo "<td>" . "<input type=text   name=surname size=auto  value=" .$row['surname'].">" . "</td>";
        echo "</tr>";

        echo "<tr style=text-align:left;>";
 echo "<th>"."PASSWORD"."</th>";     
echo "<td>" . "<input type=password   name=password >" . "</td>";
        echo "</tr>";

        echo "<tr style=text-align:left;>";
 echo "<th>"."PASSWORD AGAIN"."</th>";     
echo "<td>" . "<input type=password   name=pass>" . "</td>";
        echo "</tr>";

 echo "</table>";

    echo "<div class = approve_nullify style=padding-top:4px;>"; 

  echo "<table width=100% cellspacing=2px>";
   echo "<tr>";
   
      echo "<td>";
        echo "<input type=submit name=update value=SAVE class=btn >";
        echo "</td>";
       
       
         echo "</form>";

         }
         ?>
              
          </tr>  
        </table>
        </div>
          </div>
              <div class="container" style=" ;">
      <form action="admin_home.php" method="post" style="border-color: white">
        <table cellspacing="5px;" width="" style="">
         
          <thead style="font-size: 10px">ADD REGISTRAR</thead>
          <tr style="text-align: left">
              <th>EMAIL</th>
              <td> <input type="email" name="email_regisrar"></td>
          </tr>
          <tr style="text-align: left">
              <th>FIRST NAME</th>
              <td> <input type="text" name="first_name_registrar"></td>
          </tr>
          <tr style="text-align: left">
               <th>SURNAME</th>
               <td> <input type="text" name="surname_registrar"></td>
          </tr>
          <tr style="text-align: left">
               <th>PASSWORD</th>
               <td> <input type="text" name="password_registrar"></td>
          </tr>
          
             

       </table>


         <div class="approve_nullify" style="">
        <table width="100%" cellspacing="2px" >
          <tr>
            <td><input type="submit" class="btn" name="add_registrar" value="ADD REGISTRAR"></td>  
          </tr>
        </table>

          </div>
      </form>
       </div>
        
          <div class="container" style=" ;">
      <form action="admin_home.php" method="post" style="border-color: white">
        <table cellspacing="5px;" width="" style="">
         
           <thead style="font-size: 10px">ADD CHIEF</thead>
            <tr style="text-align: left">
            <th>EMAIL</th>
            <td> <input type="email" name="email_chief"></td>
          </tr>
          <tr style="text-align: left">
            <th>FIRST NAME</th>
            <td> <input type="text" name="first_name_chief"></td>
          </tr>
          <tr style="text-align: left">
            <th>SURNAME</th>
            <td> <input type="text" name="surname_chief"></td>
          </tr>
          <tr style="text-align: left">
            <th>PASSWORD</th>
            <td> <input type="text" name="password_chief"></td>
          </tr>
          
        </table>


         <div class="approve_nullify">
        <table width="100%" cellspacing="2px" >
          <tr>
            <td><input type="submit" class="btn" name="add_chief" value="ADD CHIEF"></td>

            <td> <a href="#" class="btn"> BACK HOME</a></td>
          </tr>
        </table>

          </div>
      </form>
       </div>
        
     

 
 <div style="padding-bottom: 100px;">
     

 </div>
 

 

 
  </div>

  <div class="footer">
   <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
  
  </div>
     </body>
 </html>