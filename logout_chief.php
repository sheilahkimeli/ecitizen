 
 <?php
session_start();
if (isset($_SESSION['email_chief'])) {
    unset($_SESSION['email_chief']);
}

session_destroy();
header('location:chief_login.php');
?>
 