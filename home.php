<?php

include('server.php'); 
  session_start(); 

  if (!isset($_SESSION['email'])) {
   
    header('location: index.php');
  }

   

?>
 
<!DOCTYPE html>
 
<html lang="">
<head>
<style type="text/css">
  .welcome_info{
    text-transform: uppercase;
    text-align: left;
  }
  .apply_btn{
    text-align: center;
  }


</style>
<title>E-CITIZEN HOME</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">
 
 
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
  
    <div class="fl_left">
    <h3 style="color: white;">ONLINE E_CITIZEN WEB APPLICATION</h3>
       
    </div>
    <div class="fl_right">
      <ul>
      <li>    <p><em><strong><?php echo $_SESSION['email']; ?></strong></em></p></li>
       
        <li><a href="log_out.php" style="color: pink;">log out</a></li>
      
      </ul>
    </div>
    
  </div>
</div>

<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
     
    <ul class="clear">
    <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
      <li class="active"><a href="#">HOME</a></li>
      </li>   
      </li>
      <li><a href="about.php">ABOUT</a></li>
      <li><a href="contact.php">CONTACT</a></li>
      </ul>
      </nav>
    </div>        
<div class="wrapper row3" style="background-color:white;" >
  <main  class="hoc container clear" style="background-color:hsl(50, 50%, 100%); text-align: center;" > 
   <?php
  include('server.php');

   $email = $_SESSION['email'];
   $sql_check = "SELECT * FROM child_details WHERE email = '$email'" ;
   $sql = "SELECT * FROM child_details WHERE email = '$email' AND status = 'Pending'"  ;
   $sql_approved = "SELECT * FROM child_details WHERE email = '$email' AND status = 'Approved'"  ;
   $sql_nullified = "SELECT * FROM child_details WHERE email = '$email' AND status = 'Nullified'"  ;
   

if($result = mysqli_query($db, $sql_check)){
    if(mysqli_num_rows($result) > 0){

    if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
       
         $sql = "SELECT * FROM users WHERE email = '$email'" ;

         $result = mysqli_query($db, $sql);
         if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_array($result)){
         
            echo "<div  class = welcome_info>";
                     
                         
                echo "<p>"."Thank you  " .$row['username']." ;". "</p>"; 
                echo "<br>";

                echo "Your application was submitted sucessfully, kindly; ";
 
                   echo"<ul> ";
                       echo "<li>"."wait for response "."</li>";
                       echo "<li>"."note :processing takes a minimum of two days"."</li>";
                        
                   echo "</ul>";
                         echo "</div>";
                        
            echo "</div>";

        }
       
         
        mysqli_free_result($result);

    }


    }
   
   }
  


if($result = mysqli_query($db, $sql_approved)){
    if(mysqli_num_rows($result) > 0){


   $sql = "SELECT * FROM users WHERE email = '$email'" ;

         $result = mysqli_query($db, $sql);
         if(mysqli_num_rows($result) > 0){

  while($row = mysqli_fetch_array($result)){
         
            echo "<div  class = welcome_info>";
                     
                         
                echo "<p>"."Thank you  " .$row['username']." ;". "</p>"; 
                echo "<br>";

                echo "Your application was successfully approved ";
                echo " kindly visit our nearest offices with ; ";
 
                   echo"<ul> ";
                       echo "<li>"."Your national identity card (if self applied / gurdian) "."</li>";
                       echo "<li>"."Both parents national identity cards "."</li>";
                        
                   echo "</ul>";
                         echo "</div>";
                        
            echo "</div>";

        }
       
         
        mysqli_free_result($result);
   
   }

}
}
if($result = mysqli_query($db, $sql_nullified)){
    if(mysqli_num_rows($result) > 0){

       
          

        }
       
        
         $sql_report = "SELECT * FROM reports WHERE email = '$email'" ;

         $result = mysqli_query($db, $sql_report);
         if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_array($result)){
         
            echo "<div class=welcome_info>";

                    echo"<h4>"."YOUR APPLICATION WAS NULLIFIED"."</h4>";
                      echo "<h5>"."Due to :"."</h5>";
                         
                echo "<ul>"."<li>".$row['report']."</li>"."</ul>";


                      echo "<p style=color:red;>"."**kindly provide correct information during reapplication"."</p>";

                        echo "</div>";


                        echo "<div class=apply_btn>";

                 echo "<a href=application_pg_one.php>"."<button class=btn>"."APPLY AGAIN"."</button>" ."</a>";
            echo "</div>";

        }
       
         
        mysqli_free_result($result);

            }

       

      }
   
   

    }



else {
       
            
          
         $sql = "SELECT * FROM users WHERE email = '$email'" ;

         $result = mysqli_query($db, $sql);
         if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_array($result)){
         
            echo "<div  class = welcome_info>";
                     
                         
                echo "<p>"."<h4>"."WELCOME  " .$row['username']. "</h4>"."</p>"; 
                echo "<br>";

                echo "<h4>"."during application you are required to provide :"."</h4>";
 
                   echo"<ul> ";
                       echo "<li>"."child details"."</li>";
                       echo "<li>"."parent details"."</li>";
                       echo "<li>"."your locality"."</li>";
                       echo "<li>"."your details (as an applicant)"."</li>";
                   echo "</ul>";
                         echo "</div>";
                         echo "<div class=apply_btn>";
                 echo "<a href=application_pg_one.php>"."<button class=btn>"."APPLY"."</button>" ."</a>";
            echo "</div>";

           }
       
         
        mysqli_free_result($result);

        }
    
           

    }
   
   

}
 

 

?>
 </main>
 </div>
 


<div class="wrapper row4">
  <footer id="footer" class="hoc clear" style="color: black;"> 
  
    <div class="one_quarter" >
     
      <nav>
        <ul class="nospace linklist">
           
          <li><a href=about.php>About</a></li>
             
        </ul>
      </nav>
       
    </div>
       <div class="one_quarter" >
     
      <nav>
        <ul class="nospace linklist">
           
          <li> <a href="contact.php">Contact</a></li>
             
        </ul>
      </nav>
       
    </div>
     
    <div class="one_quarter">
    
       <nav>
      <ul class="nospace linklist">
        <li><a href="#">CHECK YOUR APPLICATION</a></li>
      </ul>
      </nav>
    </div>  
  </footer>
</div>
  
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#" style="color:black">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php/" title="dev_team" style="color:black;">shashiro_dev</a></p>
   
  </div>
</div>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>