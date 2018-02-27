<?php require "connection.php"; ?>

<?php 
    if (filter_has_var(INPUT_POST , 'submit')) {
        $username = mysqli_escape_string($connection , $_POST['username']);
        $password = mysqli_escape_string($connection , $_POST['password']);
        echo $username + $password;
    } else {
        # code...
        echo "Hell world";
    }
?>