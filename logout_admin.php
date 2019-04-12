 
 <?php
session_start();
if (isset($_SESSION['email_admin'])) {
    unset($_SESSION['email_admin']);
}

session_destroy();
header('location:admin_login.php');
?>
 