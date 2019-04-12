 <?php 
 include('server.php');
session_start();

if (!isset($_SESSION['email_chief'])) {
    
    header('location: chief_login.php');
  }
   $email_chief = $_SESSION['email_chief'];

  
        
  $success = '';
 
 
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
 

    $updatequery = "UPDATE chief SET first_name = '$first_name', surname ='$surname', password ='$password' WHERE email = '$email_chief'  ";

     mysqli_query($db, $updatequery);

  
$success =  "<div class=success>"."PROFILE UPDATED SUCCESFULLY"."</div>";
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

</style>
<head>
<meta charset="utf-8">
<title>E-CITIZEN: CHIEF UPDATE PROFILE</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all" />
  
</head>
  
 <body>
 <div class="topnav">
  <a class="active" href="#"> MY PROFILE</a>
    <a  href="chief_home.php">BACK HOME</a>
  
 
  
  </div>
 
    <div><?php include('errors.php');?></div>

      <?php echo  $success ?>
 
   
 
 
  <?php
        $email = $_SESSION['email_chief'];
 $sql = "SELECT * FROM chief WHERE email = '$email_chief'";
$result = mysqli_query($db, $sql);
   while ($row=mysqli_fetch_array($result)) {
          echo "<div class=container>";
        echo "<table cellspacing=5px>";
           echo "<thead>"."APPLICANT DETAILS"."</thead>";
     echo "<form action='chief_zone.php' method='post'>";
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

      echo "<div class = approve_nullify>"; 

      echo "<table width=100% cellspacing=2px>";
   echo "<tr>";
   echo"<td>";
        echo "<a href =chief_home.php class=btn >"."BACK"."</a>";
        echo "</td>";
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
 <div style="padding-bottom: 100px;">
     

 </div>

  </div>

   
  <div class="footer" style="position: fixed; bottom: 0px ;">
   <p class="fl_left" style=;">Copyright &copy; 2017 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
  
  </div>
     </body>
 </html>