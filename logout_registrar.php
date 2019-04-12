 
 <?php
session_start();
if (isset($_SESSION['email_registrar'])) {
    unset($_SESSION['email_registrar']);
}

session_destroy();
header('location:registrar_login.php');
?>
 