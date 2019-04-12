 
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
 
.container {
  text-align:;
 
  padding: 5px;
}
.container table {
  
   
    
    margin: 0 auto;
   
}


</style>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <title>E-CITIZEN: CHIEF</title>





</head>
   
 <body>

  
 <div class="topnav">
  <a class="active" href="#"> SUCCESSFUL APPLICANTS </a>
   
   
 
 
 <a href="registrar.php" class="btn">BACK</a>
  </div>
</div>

    

<div class="">
  <?php
$sql = "SELECT * FROM successful_child_details ";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<div class=container >";
        echo "<table  align=center  cellpadding=3px  cellspacing=2px >";
            echo "<tr>";
                echo "<th>NO</th>";
                echo "<th>First_Name  </th>";
                echo "<th>Last_Name   </th>";
                echo "<th>Email     </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
          echo "<form action='chief_home.php' method='post'>";
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td size=20px>" . $row[2] . "</td>";
                echo "<td>" . "<input type=text style='font-size:19px;'   size=auto name=email readonly value=" .$row['email'].">" . "</td>";
                
            echo "</tr>";
            echo "</form>";
        }
        echo "</table>";
        echo "</div>";
         
        mysqli_free_result($result);
    } else{

          echo "<p class=error >"."No Applications Available"."</p>";
    }
}  
 
?>
  </div>
  <div style="padding-bottom: 200px;">
     

 </div>
 


   <div class="footer" style="position: fixed; bottom: 0px ;">
   <p class="fl_left" style=;">Copyright &copy; 2017 - All Rights Reserved - <a href="#">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team">shashiro_dev</a></p>
  
  </div>
</body>
 
</html>

