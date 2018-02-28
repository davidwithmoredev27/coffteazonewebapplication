<?php
    session_start();
    $_SESSION['loginerror'] = 0;
    $_SESSION['passwordattempt'] = null;
    if (isset($_SESSION['password']) && isset($_SESSION['password'])) {
        header("location:dashboard.php?admin");
    }  else if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        header("location:login.php");
    }
?>  