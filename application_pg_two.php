  
 <?php include('server.php');

session_start(); 

  if (!isset($_SESSION['email'])) {
    
    header('location: index.php');
  }



  ?>





<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
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
  <title>E-CITIZEN: APPLICATION PART B</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 

<div class="topnav">
  
  <a class="active" href="application_pg_two">APPLICATION PART B</a>
   

  </div>
 
 

</head>

  <body>

  <div class="header">
    <h2>PART B: APPLICANT</h2>

  </div>
  
  <form method="post" action="application_pg_two.php" class="application_form">

    <?php include('errors.php'); ?>

    <div class="input-group">
     <label>First Name</label><input type="text" name="first_name"   >
     <label>Middle Name</label><input type="text" name="middle_name"  >
     <label>Surname</label><input type="text" name="surname"  >
       
     
     <label>Phone Number</label><input type="text" name="phone_number"  >
       
         <label>Relationship with child</label>
      <select name="relationship" id="relationship" style="width: 93%; height: 40px; font-size: 17px;text-align-last: center;text-indent: 5px" required>
             <option value="0" > -- Select --</option>
             <option value="Father" >Father</option>
             <option value="Mother" >Mother</option>
             <option value="Gurdian" >Gurdian</option>
             <option value="Self" name ="self">SELF</option>
           </select>

           <div id="id_number_div" hidden>
            <label>ID Number</label> 
         <input type="number" id="id_number" name="id_number" placeholder="ID Number">
         </div>

     <label>location</label>  
     <select name="location_applicant" style="width: 93%; height: 40px; font-size: 17px;text-align-last: center;text-indent: 5px" required>
             <option value="0"> -- Select Location -- </option>
             <option value="kesses" >Kesses</option>
             <option value="cheptiret" >Cheptiret</option>
           </select>
     
     <label>Address</label><input type="tex" name="address"  >
      


 
    </div>
    <p>
       <a href="home.php"> << HOME  </a>  | |    <button type="submit" class="btn" name="application_b" style="float:right;">SUBMIT</button>

    </p>
  </form>

<script>
  $(document).ready(function(){
  $(document).on('change', '#relationship', function() {

   var selected_value = $( this ).val();

   
   if(selected_value == "Self")

   {
   
    $("#id_number_div").removeAttr("hidden");
     $("#id_number").prop('required',true);

  }
  else 
  {

   // $("").appendAttr("hidden");
    $("#id_number_div").prop('hidden',true);
     $("#id_number").prop('required',false);
  }

  });
});

  
</script>
 </body>

 <div class="footer" style="position: absolute; right: 0; bottom: 0px; left: 0px;"> 
     
     <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#" style="color:black">@shashiro_dev</a></p>
    <p class="fl_right">Developed by <a target="_blank" href="about.php" title="dev_team" style="color:black;">shashiro_dev</a></p>
    
</div>

</html>
