<?php

    session_destroy();
    unset($_SESSION['email']);
    header("location: index.php");
?>