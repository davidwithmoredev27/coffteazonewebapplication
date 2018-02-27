<?php

    // $sql = "CREATE TABLE  tbl_admin(
    //     ID INT NOT NULL AUTO_INCREMENT,
    //     username VARCHAR(255),
    //     password VARCHAR(255),
    //     PRIMARY KEY (id)
    // )";
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "admindb";
    $connection = mysqli_connect($server , $username , $password , $database);
    
?>