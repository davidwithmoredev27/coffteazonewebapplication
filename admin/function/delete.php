<?php
    session_start();
    // check if there already login admin
    //require "sessiontimeout.php";

    $_SESSION['accountnew'] = false;

    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    $feedbackID = $_POST["feedbackID"];//sanitized 
    
    $query = "DELETE from tbl_feedback WHERE feedbackID = $feedbackID";
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "admindb";
    $connection = mysqli_connect($server , $username , $password , $database);
    $result = $connection->query($query);
    $_SESSION['feebackmessage'] = "<span><strong class=\"white-text\">Data successfully deleted!</strong></span>\n";
    header("Location: ../feedback.php");
    $connection->close();
?>