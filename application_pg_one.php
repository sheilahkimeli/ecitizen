  
 <?php include('server.php');

session_start(); 

  if (!isset($_SESSION['email'])) {
    
    header('location: index.php');
  }


?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  position: relative;
  padding-bottom: 6rem;
  min-height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}
 
 input{
    text-transform: capitalize;
 }
 
</style>
<head>
  <title>E-CITIZEN: APPLICATION PART A</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 

<div class="topnav">
  <a class="active" href="application_pg_two">APPLICATION PART A</a>
  

  </div>
</div>

 

</head>

 <body>

  <div class="header">
    <h2>PART A: CHILD DETAILS</h2>

  </div>
  
  <form method="post" action="application_pg_one.php" class="application_form">

    <?php include('errors.php'); ?>

    <div class="input-group">
      <label>First Name</label><input type="text" name="first_name" >
     <label>Middle Name</label><input type="text" name="middle_name">
     <label>Surname</label><input type="text" name="surname">
                 </div>
                  <label>Gender:  </label><label>Male </label><input type="radio" name="gender" value="male" checked="checked">
                            <label>Female  </label><input type="radio" name="gender" value="female">
                     <div class="input-group">       
     <label>Date Of Birth</label><input type="date" name="date_of_birth">
      
     <label>County</label>
           <select name="county" style="width: 93%; height: 40px; font-size: 17px;text-align-last: center;text-indent: 5px">
             <option value="Uasin-Gishu" >Uasin Gishu</option>
           </select>
     <label>District</label>
           <select name="district" style="width: 93%; height: 40px; font-size: 17px;text-align-last: center;text-indent: 5px">
             <option value="Eldoret-East" >Eldoret East</option>
           </select>
      <label>Location</label>
            <select name="location" style="width: 93%; height: 40px; font-size: 17px;text-align-last: center;text-indent: 5px">
             <option value="0"> -- Select Location -- </option>
             <option value="kesses" >Kesses</option>
             <option value="cheptiret" >Cheptiret</option>
           </select>
     <label>Sub Location</label><input type="text" name="sub_location">
          <label>Village</label><input type="text" name="village">
          <label>Father First Name</label><input type="text" name="father_first_name" >
           <label>Father Middle Name</label><input type="text" name="father_middle_name" >
            <label>Father Surname</label><input type="text" name="father_surname" >
     <label>Mother First Name</label><input type="text" name="mother_first_name">
     <label>Mother Middle Name</label><input type="text" name="mother_middle_name">
     <label>Mother Maiden Name</label><input type="text" name="mother_maiden_name">
    </div>
    <p>
       <a href="home.php"> << HOME  </a>  | |    <button type="submit" class="btn" name="application_a">CONTINUE >></button>

    </p>
  </form>


</body> 
 
<div class="footer" style="position: absolute; right: 0; bottom: 0px; left: 0px;"> 
     
     <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#" style="color:black">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php" title="dev_team" style="color:black;">shashiro_dev</a></p>
    

</html>