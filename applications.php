<?php 
 include('server.php');
session_start();
  $email = $_SESSION['email'];

  $first_name =  $_POST['first_name'];
    $middle_name =  $_POST['middle_name'];
    $surname =  $_POST['surname'];
    $relationship =  $_POST['relationship'];
     $phone_number =  $_POST['phone_number'];
        
        
 
 
 
if (isset($_POST['approve'])) {

     $delete_previous = "DELETE FROM approved_applicants WHERE email ='$email'";

    $query = "INSERT INTO approved_applicants (first_name, middle_name, surname, relationship, phone_number, email) 
            VALUES ('$first_name', '$middle_name', '$surname', '$relationship', '$phone_number', '$email')";

    $updatequery = "UPDATE child_details SET status = 'Approved' WHERE email = '$email'  ";

    $delete = "DELETE FROM applicant_details WHERE email ='$email'";
     

     mysqli_query($db, $delete_previous);

     $results = mysqli_query($db, $query);

     mysqli_query($db, $updatequery);

     mysqli_query($db, $delete);


 header('location: chief_home.php');


}
 if (isset($_POST['decline'])) {
 

     $report = $_POST['report'];



    if (empty($report)) { array_push($errors, "Report is required"); }

    if (count($errors) == 0) {

      $delete_previous_decline = "DELETE FROM declined_applicants WHERE email ='$email'";

   $query = "INSERT INTO declined_applicants (first_name, middle_name, surname, relationship, phone_number, email) 
            VALUES ('$first_name', '$middle_name', '$surname', '$relationship', '$phone_number', '$email')";

   $updatequery = "UPDATE child_details SET status = 'Nullified' WHERE email = '$email'  ";

   $delete = "DELETE FROM applicant_details WHERE email ='$email'";
   $delete_report = "DELETE FROM reports WHERE email ='$email'";


     $report = "INSERT INTO reports(email,report) VALUES('$email', '$report')";
      mysqli_query($db, $delete_previous_decline);

      $results = mysqli_query($db, $query);

      mysqli_query($db, $updatequery);


     mysqli_query($db, $delete);
      
     mysqli_query($db, $delete_report);

     mysqli_query($db, $report);

     header('location: chief_home.php');

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

 input{
    text-transform: capitalize;
 } 


</style>
<head>
<meta charset="utf-8">
<title>E-CITIZEN: CHIEF/APPLICATIONS</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all" />
  
</head>
  
 
 <div class="topnav">
  <a class="active" href="#"> APPLICANTS DETAILS</a>
   
  </div>
</div>

  </div>
 

 <body style="background-color: white;">
 
    <div><?php include('errors.php');?></div>

       <div style="overflow-x: auto;" >
   
      <table cellspacing="50px" class="input-group">
      <tr>
      <td>
	<table class="input-group" cellspacing="1px" cellpadding="1px" border="1px" width="" style="background-color: white;"   ">

  <thead>CHILD DETAILS</thead>
  <?php
        $email = $_SESSION['email'];
 $sql = "SELECT * FROM child_details WHERE email = '$email'";
$result = mysqli_query($db, $sql);
   while ($row=mysqli_fetch_array($result)) {

 
            
    echo "<tr>";
echo "<th>"."FIRST NAME"." </th>"; 
echo "<td>".$row[1] ." </td>"; 
      echo"</tr>";

      echo "<tr>";
 echo "<th>"."MIDDLE NAME"."</th>";     
echo "<td>".$row[2] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."SURNAME"."</th>";     
echo "<td>".$row[3] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."GENDER"."</th>";     
echo "<td>".$row[4] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."DATE OF BIRTH"."</th>";     
echo "<td>".$row['date_of_birth'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."COUNTY"."</th>";     
echo "<td>".$row['county'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."DISTRICT"."</th>";     
echo "<td>".$row['district'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."LOCATION"."</th>";     
echo "<td>".$row['location'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."SUB LOCATION"."</th>";     
echo "<td>".$row['sub_location'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."VILLAGE"."</th>";     
echo "<td>".$row['village'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."FIRST NAME OF FATHER"."</th>";     
echo "<td>".$row['father_first_name'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."MIDDLE NAME OF FATHER"."</th>";     
echo "<td>".$row['father_middle_name'] ." </td>";
        echo "</tr>";

echo "<tr>";
 echo "<th>"."SURNAME OF FATHER"."</th>";     
echo "<td>".$row['father_surname'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."FIRST NAME OF MOTHER"."</th>";     
echo "<td>".$row['mother_first_name'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."MIDDLE NAME OF MOTHER"."</th>";     
echo "<td>".$row['mother_middle_name'] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."MAIDEN NAME OF MOTHER"."</th>";     
echo "<td>".$row['mother_maiden_name'] ." </td>";
        echo "</tr>";
    echo "<tr>";
  echo "</tr>";
  
   
  }
  ?>

	</table>
 
 </td>

  <td>
 
    <div class="input-group">
 
 
  <?php
        $email = $_SESSION['email'];
 $sql = "SELECT * FROM applicant_details WHERE email = '$email'";
$result = mysqli_query($db, $sql);
   while ($row=mysqli_fetch_array($result)) {

        echo "<table cellpadding=1px border=1px  style=background-color:white;>";
           echo "<thead>"."APPLICANT DETAILS"."</thead>";
     echo "<form action='applications.php' method='post'>";
    echo "<tr>";
echo "<th>"."FIRST NAME"." </th>"; 
 echo "<td>" . "<input type=text   name=first_name size=auto readonly value=" .$row['first_name'].">" . "</td>";
      echo"</tr>";

      echo "<tr>";
 echo "<th>"."MIDDLE NAME"."</th>";     
 echo "<td>" . "<input type=text   name=middle_name size=auto readonly value=" .$row['middle_name'].">" . "</td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."SURNAME"."</th>";     
echo "<td>" . "<input type=text   name=surname size=auto readonly value=" .$row['surname'].">" . "</td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."RELATIONSHIP"."</th>";     
echo "<td>" . "<input type=text   name=relationship size=auto readonly value=" .$row['relationship'].">" . "</td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."PHONE NUMBER"."</th>";     
echo "<td>" . "<input type=text name=phone_number size=auto readonly value=" .$row['phone_number'].">" . "</td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."ADDRESS "."</th>";     
 echo "<td>" . $row['address'] . "</td>";
  



 echo "</table>";

  echo "</td>";
  echo "</tr>";
  echo "</table>";

  echo "<div class=report>";
       
                 echo"<h3>"."REASON FOR DECLINE"."</h3>";
          
               echo "<textarea name=report style=width:90%; height=80%;>"."</textarea>";
              
              echo "</div>"; 
              echo "<div class = approve_nullify>"; 

  echo "<table width=100% cellspacing=2px>";
   echo "<tr>";
      echo "<td>";
        echo "<input type=submit name=approve value=APPROVE class=btn >";
        echo "</td>";
        echo "<td>";
        echo "<input type=submit name=decline value=DECLINE class=btn >";
        echo "</td>";
         echo "</form>";

         }
         ?>
             <td>  <a href="chief_home.php" class="btn">BACK</a> </td>

          </tr> 
         </form> 
        </table>
        </div>
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