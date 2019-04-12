<?php 
	session_start();

	// variable declaration
	  
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', 'shaddy96', 'citizen');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);

           $sql = "SELECT * FROM users WHERE email='$email'";
  	       $results = mysqli_query($db, $sql);
  	      if (mysqli_num_rows($results) > 0) {
  	       array_push($errors, "Email already exist");
           }
           else{
			//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			 
			$_SESSION['success'] = "Sucessfuly registered";
			header('location: login.php');
		}

	}
}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

########################################
 if (isset($_POST['application_a'])) {
  	$email = $_SESSION['email'];



  	$first_name =  $_POST['first_name'];
		$middle_name =  $_POST['middle_name'];
		$surname =  $_POST['surname'];
		$gender =  $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$county = $_POST['county'];
		 $district = $_POST['district'];
		 $location = $_POST['location'];
		 $sub_location = $_POST['sub_location'];
		 $village = $_POST['village'];
         $father_first_name =  $_POST['father_first_name'];
         $father_middle_name =  $_POST['father_middle_name'];
         $father_surname =  $_POST['father_surname'];
         $mother_first_name =  $_POST['mother_first_name'];
         $mother_middle_name =  $_POST['mother_middle_name'];
         $mother_maiden_name =  $_POST['mother_maiden_name'];
          $status = "Pending";


		if (empty($first_name)) { array_push($errors, "First is required"); }
		if (empty($middle_name)) { array_push($errors, "Middle is required"); }
		if (empty($surname)) { array_push($errors, "Surname is required"); }
		if (empty($gender)) { array_push($errors, "Gender is required"); }
		if (empty($date_of_birth)) { array_push($errors, "Date Of Birth is required"); }
		if (empty($county)) { array_push($errors, "County is required"); }
		if (empty($district)) { array_push($errors, "District is required"); }
		if (empty($location)) { array_push($errors, "Location is required"); }

		if (empty($sub_location)) { array_push($errors, "Sub Location is required"); }
		if (empty($village)) { array_push($errors, "Village is required"); }
		if (empty($father_first_name)) { array_push($errors, "Father First Name is required"); }
		if (empty($father_middle_name)) { array_push($errors, "Father Middle Name is required"); }
		if (empty($father_surname)) { array_push($errors, "Father Surname is required"); }
		if (empty($mother_first_name)) { array_push($errors, "Mother First Name is required"); }
		if (empty($mother_middle_name)) { array_push($errors, "Mother Middle Name is required"); }
		if (empty($mother_maiden_name)) { array_push($errors, "Mother Maiden Name is required"); }

		 

 

if (count($errors) == 0) {


  	 
  	$sql = "SELECT * FROM applicant_details WHERE email='$email'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  array_push($errors, "Already have pending Submission");

       

  	}else{
            $sql_delete = " DELETE FROM child_details WHERE email = '$email' ";
            $results = mysqli_query($db, $sql_delete);

     $sql_delete_report = " DELETE FROM reports WHERE email = '$email' ";
            $results = mysqli_query($db, $sql_delete_report);


  	  $query = "INSERT INTO child_details (first_name, middle_name, surname, gender, email, date_of_birth, county, district, location, sub_location, village, father_first_name,father_middle_name, father_surname, mother_first_name, mother_middle_name, mother_maiden_name, status) 
  	       	VALUES ('$first_name', '$middle_name', '$surname', '$gender', '$email', '$date_of_birth', '$county',    '$district', '$location', '$sub_location', '$village', '$father_first_name', '$father_middle_name', '$father_surname', '$mother_first_name', '$mother_middle_name', '$mother_maiden_name', '$status')";
  	  $results = mysqli_query($db, $query);
  	            $_SESSION['email'] = $email;
			  header('location: application_pg_two.php');
  	}
  }
}
 
 ###########################################################

  if (isset($_POST['application_b'])) {
  	 



  	    $first_name =  $_POST['first_name'];
		$middle_name =  $_POST['middle_name'];
		$surname =  $_POST['surname'];
		$relationship =  $_POST['relationship'];
		$id_number = $_POST['id_number'];
		 $phone_number =  $_POST['phone_number'];
		 $location_applicant = $_POST['location_applicant'];
         $address =  $_POST['address'];
       
        $email = $_SESSION['email'];
         $status = 'Pending';

		if (empty($first_name)) { array_push($errors, "First name is required"); }
		if (empty($middle_name)) { array_push($errors, "Middle name is required"); }
		if (empty($surname)) { array_push($errors, "Surname is required"); }
		if (empty($relationship)) { array_push($errors, "Relationship is required"); }
		if (empty($phone_number)) { array_push($errors, "Phone number is required"); }
		if (empty($location_applicant)) { array_push($errors, "Location is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }


		if (empty($id_number)){ $id_number = '00000000';}
		
		
		 

if (count($errors) == 0) {

   $query = "INSERT INTO applicant_details (first_name, middle_name, surname, relationship,id_number, phone_number, location_applicant, address, email,status) 
  	       	VALUES ('$first_name', '$middle_name', '$surname', '$relationship','$id_number', '$phone_number', '$location_applicant', '$address', '$email', '$status')";
  	  $results = mysqli_query($db, $query);
  	              array_push($errors, "submited");
  	              header('location: home.php');
  	   
  	}
  else
  	echo "ERRORS";
}




if (isset($_POST['view'])) {
  $email = $_POST['email'];
  $_SESSION['email'] = $email;

     header('location: applications.php');
}


 
// LOGIN CHIEF
	if (isset($_POST['login_chief'])) {
		$email_chief = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email_chief)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			 
			$query = "SELECT * FROM chief WHERE email='$email_chief' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email_chief'] = $email_chief;
				$_SESSION['success'] = "You are now logged in";
				header('location: chief_home.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

//LOGIN ADMIN
		if (isset($_POST['login_admin'])) {
		$email_admin = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email_admin)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			 
			$query = "SELECT * FROM administrators WHERE email='$email_admin' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email_admin'] = $email_admin;
				$_SESSION['success'] = "You are now logged in";
				header('location: admin_home.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}


 
// LOGIN REGISTRAR
	if (isset($_POST['login_registrar'])) {
		$email_registrar = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email_registrar)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			 
			$query = "SELECT * FROM registrators WHERE email='$email_registrar' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email_registrar'] = $email_registrar;
				$_SESSION['success'] = "You are now logged in";
				header('location: registrar.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

	// CHECK USER APPLICATION DETAILS....FINAL PAGE
	if (isset($_POST['submit_user_email'])) {
		$email_user = mysqli_real_escape_string($db, $_POST['email']);
        $status = "approved";
		if (empty($email_user)) {
			array_push($errors, "Email is required");
		}
		 

		if (count($errors) == 0) {
			 
			$query = "SELECT * FROM child_details WHERE email='$email_user' AND status='$status'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email_user'] = $email_user;
				header('location: application_details.php');
			}else {
				array_push($errors, "No Application Matching Your Email Available");
			}
		}
	}

	//re_print cert
	if (isset($_POST['submit_user_email_reprint'])) {
		$email_user = mysqli_real_escape_string($db, $_POST['email']);
        $status = "approved";
		if (empty($email_user)) {
			array_push($errors, "Email is required");
		}
		 

		if (count($errors) == 0) {
			 
			$query = "SELECT * FROM successful_child_details WHERE email='$email_user'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email_user'] = $email_user;
				header('location: reprint.php');
			}else {
				array_push($errors, "No Application Matching Your Email Available");
			}
		}
	}

	?>	
 