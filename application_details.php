<?php 
 include('server.php');
session_start();
   if (!isset($_SESSION['email_user'])) {
   
    header('location: registrar.php');
  }

  $email_user = $_SESSION['email_user'];

if (isset($_POST['print'])) {


    $first_name =  $_POST['first_name'];
    $middle_name =  $_POST['middle_name'];
    $surname =  $_POST['surname'];
    $relationship =  $_POST['relationship'];
    $phone_number =  $_POST['phone_number'];
    $first_name_child =  $_POST['first_name_child'];
    $middle_name_child=  $_POST['middle_name_child'];
    $gender =  $_POST['gender'];
    $date_of_birth =  $_POST['date_of_birth'];
    $location =  $_POST['location'];
    $father_first_name =  $_POST['father_first_name'];
    $father_middle_name =  $_POST['father_middle_name'];
    $father_surname =  $_POST['father_surname'];
    $mother_first_name =  $_POST['mother_first_name'];
    $mother_middle_name =  $_POST['mother_middle_name'];
    $mother_maiden_name =  $_POST['mother_maiden_name'];
     
     
    $u=uniqid();

  $day = date('jS');
  $month = date('F');
  $year = date('Y');

     
$query_one= "INSERT INTO successful_applicants (first_name, middle_name, surname, relationship, phone_number, email) 
            VALUES ('$first_name', '$middle_name', '$surname', '$relationship', '$phone_number', '$email_user')";
             mysqli_query($db, $query_one);



    $query = "INSERT INTO successful_child_details (first_name, middle_name, gender, email, date_of_birth, location, father_first_name, father_middle_name, father_surname, mother_first_name, mother_middle_name, mother_maiden_name) 
           VALUES ('$first_name_child', '$middle_name_child', '$gender', '$email_user', '$date_of_birth', '$location', '$father_first_name', '$father_middle_name', '$father_surname', '$mother_first_name', '$mother_middle_name', '$mother_maiden_name')";
      mysqli_query($db, $query);
   
    require("fpdf/fpdf.php");

 $pdf = new FPDF();

$pdf -> AddPage();
$pdf -> SetFont("Arial","B",12);
$pdf -> Cell(0,10,"REPUBLIC OF KENYA",0,1,C);
$pdf -> SetFont("Arial","B",20);
$pdf -> Cell(0,10,"CERTIFICATE OF BIRTH",0,1,C);
$pdf -> Line(10,30,210-10,30);
$pdf -> SetFont("Arial","B",10);
$pdf -> Cell(50,10,"        Birth in the",0,0,C);
$pdf -> Line(60,37,210-120,37);
$pdf -> Cell(30,10,"ELDORET EAST",0,0);

$pdf -> Cell(35,10,"  District in the",0,0,C);
 $pdf -> Cell(30,10," RIFT VALLEY",0,0);
$pdf -> Cell(35,10,"  Province",0,1);
$pdf -> Line(125,37,210-58,37);

 $pdf -> Line(10,38,210-10,38);
 $pdf -> SetFont("Arial","B",10);
$pdf -> Cell(30,10," Entry No",0,0,C);
$pdf -> Cell(30,10,"$u",0,0);
$pdf -> Cell(25,10," Where Born",0,0);
$pdf -> Cell(25,10,"$location",0,0);
$pdf -> Cell(30,10," Name",0,0);

$pdf -> Cell(20,10,ucfirst("$first_name_child"),0,0);
$pdf -> Cell(20,10,ucfirst("$middle_name_child"),0,1);
$pdf -> SetLineWidth(0.1);
$pdf -> Line(10,50,210-10,50);

$pdf -> SetFont("Arial","B",10);
$pdf -> Cell(30,10,"Date of Birth",0,0,C);
$pdf -> Cell(30,10,"$date_of_birth",0,0);
$pdf -> Cell(15,10," Sex",0,0);
$pdf -> Cell(30,10,"$gender       ",0,0,R);
$pdf -> Cell(30,10,"Name of Father",0,0);
 
$pdf -> Cell(15,10,ucfirst("$father_first_name "),0,0);
$pdf -> Cell(20,10,ucfirst("$father_middle_name "),0,0);
$pdf -> Cell(0,10,ucfirst("$father_surname "),0,1);

$pdf -> SetLineWidth(0.1);
$pdf -> Line(10,60,210-10,60);
$pdf -> Line(38,38,38,60);
$pdf -> Line(69,38,69,60);
$pdf -> Line(93,38,93,60);
$pdf -> Line(115,38,115,60);
$pdf -> Line(142,38,142,60);

$pdf -> Cell(30,10,"Name of Mother",0,0);
$pdf -> Cell(15,10,ucfirst("$mother_first_name "),0,0);
$pdf -> Cell(15,10,ucfirst("$mother_middle_name "),0,0);
$pdf -> Cell(0,10,ucfirst("$mother_maiden_name "),0,1);
$pdf -> Line(10,70,210-10,70);
$pdf -> Line(40,60,40,70);

$pdf -> Cell(70,10,"Name and Description of Informant",0,0);
$pdf -> Cell(30,10," Parent",0,1);
$pdf -> Line(10,80,210-10,80);
$pdf -> Line(75,70,75,80);


$pdf -> Cell(60,10,"Name of Registering Officer",0,0);
$pdf -> Cell(30,10,"Job Kiprop",0,0);
$pdf -> Cell(50,10,"Date of Registration",0,0);
$pdf -> Cell(30,10," 10.10.2019",0,1);
$pdf -> Line(10,90,210-10,90);
$pdf -> Line(60,80,60,90);
$pdf -> Line(100,80,100,90);
$pdf -> Line(138,80,138,90);


$pdf -> Cell(30,10,"I",0,0,C);
$pdf -> Cell(80,10," Job Kprop",0,0,C);
$pdf -> Line(60,97,210-110,97);
$pdf -> Cell(40,10,"District/Assistant",0,1,C);
 
$pdf -> Cell(30,5,"     Registrar For  ",0,0,C);
$pdf -> Cell(30,5," ELDORET EAST ",0,0,C);
$pdf -> Line(40,104,210-137,104);
$pdf -> Cell(150,5,"District, hereby certify that this certificate is complied from an",0,1,C);
$pdf -> Cell(0,5," entry/return in the Register of Births in the District",0,1);
 
 
$pdf -> Cell(150,10,"  EE 00655665651665 ",0,0,C);
$pdf -> Cell(30,10," ",0,1,C);
$pdf -> Line(146,117,210-15,117);

$pdf -> Cell(140,10," AUTH NO 00655665651665 ",0,0,C);
$pdf -> Cell(30,1,"             District/Assistant Registrar ",0,1,C);

$pdf -> Cell(100,20,"Given under the Seal of the Principal Civil Registrar on ",0,0,C);
$pdf -> Cell(20,20,"$day",0,0,C);
$pdf -> Cell(10,20,"day of",0,0);
$pdf -> Cell(20,20,"$month",0,0,C);
$pdf -> Cell(10,20,"$year",0,1);

$pdf -> SetLineWidth(0.8);
$pdf -> Line(10,136,210-10,136);


$pdf -> Cell(0,4,"   This certificate is issued in parsuace of the Births and Deaths Registration Act (Cap. 149) which provides that a",0,1);
   $pdf -> Cell(0,4,"certified copy of any entry in any register of return purporting to be scaled or stamped with the Seal of the Principal",0,1);
   $pdf -> Cell(0,4,"Registrar shall be received as evidence of the dates and and facts therein contained without any or other proof of such",0,1);
   $pdf -> Cell(0,4,"entry.",0,1);

$pdf -> SetFont("Arial","B",15);
$pdf -> Cell(0,10," NOTE:  A Certificate of Birth is not Proof of Kenyan Citizen",0,0);



$pdf ->Output();  

 


 $delete = "DELETE FROM child_details WHERE email ='$email_user'";
  $delete_applicant = "DELETE FROM approved_applicants WHERE email ='$email_user'";

    mysqli_query($db, $delete);
   mysqli_query($db, $delete_applicant);

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
<title>E-CITIZEN: APPLICATIONS</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all" />
  
</head>
  <body>
<div class="topnav">
  
  <a class="active" href="#">APPLICANT DETAILS</a>
  <a href="registrar.php">BACK HOME</a>
   

  </div>
      <table cellspacing="50px" class="input-group">
      <tr>
      <td>
	<table class="input-group" cellpadding="1px" border="1px" width="500px" style="background-color: white;"   ">

  <thead>CHILD DETAILS</thead>
  <?php
        $email_user = $_SESSION['email_user'];
 $sql = "SELECT * FROM child_details WHERE email = '$email_user'";
$result = mysqli_query($db, $sql);
   while ($row=mysqli_fetch_array($result)) {

 echo "<form action='application_details.php' method='post' target=_blank>";
            
    echo "<tr>";
echo "<th>"."FIRST NAME"." </th>"; 
echo "<td>" . "<input type=text   name=first_name_child readonly value=" .$row[1].">". " </td>"; 
      echo"</tr>";

      echo "<tr>";
 echo "<th>"."MIDDLE NAME"."</th>";     
echo "<td>" . "<input type=text   name=middle_name_child readonly value=" .$row[2].">". " </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."SURNAME"."</th>";     
echo "<td>".$row[3] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."GENDER"."</th>";     
echo "<td>"."<input type=text   name=gender readonly value=" .$row[4].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."DATE OF BIRTH"."</th>";     
echo "<td>"."<input type=text   name=date_of_birth readonly value=" .$row[6].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."COUNTY"."</th>";     
echo "<td>".$row[7] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."DISTRICT"."</th>";     
echo "<td>".$row[8] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."LOCATION"."</th>";     
echo "<td>"."<input type=text   name=location readonly value=" .$row[9].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."SUB LOCATION"."</th>";     
echo "<td>".$row[10] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."VILLAGE"."</th>";     
echo "<td>".$row[11] ." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."FIRST NAME OF FATHER"."</th>";     
echo "<td>"."<input type=text name=father_first_name  readonly value=" .$row[12].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."MIDDLE NAME OF FATHER"."</th>";     
echo "<td>"."<input type=text   name=father_middle_name readonly value=" .$row[13].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."SURNAME OF FATHER"."</th>";     
echo "<td>"."<input type=text name=father_surname  readonly value=" .$row[14].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."FIRST NAME OF MOTHER"."</th>";     
echo "<td>"."<input type=text   name=mother_first_name readonly value=" .$row[15].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."MIDDLE NAME OF MOTHER"."</th>";     
echo "<td>"."<input type=text name=mother_middle_name  readonly value=" .$row[16].">"." </td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."MAIDEN NAME OF MOTHER"."</th>";     
echo "<td>"."<input type=text   name=mother_maiden_name readonly value=" .$row[17].">"." </td>";
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
        $email_user = $_SESSION['email_user'];
 $sql = "SELECT * FROM approved_applicants WHERE email = '$email_user'";
$result = mysqli_query($db, $sql);
   while ($row=mysqli_fetch_array($result)) {

        echo "<table class=input-group cellpadding=1px border=1px  style=background-color:white;>";
           echo "<thead>"."APPLICANT DETAILS"."</thead>";
     
    echo "<tr>";
echo "<th>"."FIRST NAME"." </th>"; 
 echo "<td>" . "<input type=text   name=first_name readonly value=" .$row['first_name'].">" . "</td>";
      echo"</tr>";

      echo "<tr>";
 echo "<th>"."MIDDLE NAME"."</th>";     
 echo "<td>" . "<input type=text   name=middle_name readonly value=" .$row['middle_name'].">" . "</td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."SURNAME"."</th>";     
echo "<td>" . "<input type=text   name=surname readonly value=" .$row['surname'].">" . "</td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."RELATIONSHIP"."</th>";     
echo "<td>" . "<input type=text   name=relationship readonly value=" .$row['relationship'].">" . "</td>";
        echo "</tr>";

        echo "<tr>";
 echo "<th>"."PHONE NUMBER"."</th>";     
echo "<td>" . "<input type=text name=phone_number readonly value=" .$row['phone_number'].">" . "</td>";
        echo "</tr>";
 echo "</table>";

  echo "</td>";
  echo "</tr>";
  echo "</table>";

  echo "<div class=approve_nullify>";

  echo "<table width=100% cellspacing=2px>";
   echo "<tr>";
      echo "<td>";
        echo "<input type=submit name=print value=PRINT class=btn >";
        echo "</td>";
        
         }
         ?>
            <td>  <a href="registrar.php" class="btn">BACK</a> </td>
            
          </tr> 
         </form> 
        </table>
        </div>


   <div style="padding-bottom: 200px;">
     

     </div>
 <div class="footer">
   <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
  
  </div>
 </body>
     
 </html>