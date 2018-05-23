<?php require "connection.php"; ?>
<?php
    session_start();


     if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['termsandconditionsubmit'])) {

            if (isset($_POST['termsandcondition'])) {
                $termsandcondition = sanitizedData($_POST['termsandcondition']);
                $preventSQLInjection = mysqli_real_escape_string($connection , $termsandcondition);
                //die($preventSQLInjection);
                if (strlen($preventSQLInjection) < 150 || strlen($preventSQLInjection) == 150) {
                    if (preg_match("/^[\'^£$%*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                        $_SESSION['termsandconditionerror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                        header("location:termsandcondition.php");
                        die();
                    } elseif (!preg_match("/^[\'^£$%*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                         $termandconditionSuccess = $preventSQLInjection;
                    }
                    $sql = "INSERT INTO tbl_roomthreetc(terms_and_conditions) VALUES('$termandconditionSuccess');";


                    if(mysqli_query($connection , $sql)) {
                         $_SESSION['termsandconditionsuccess'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Data sucessfully added!</strong>\n".
                                            "</strong>\n";
                        header("location:termsandcondition.php");
                        die();
                    } elseif (!mysqli_query($connection , $sql)) {
                     $_SESSION['termsandconditionerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Data was not sucessfully added!</strong>\n".
                                            "</strong>\n";
                        header("location:termsandcondition.php");
                        die();
                    }


                } else if (strlen($preventSQLInjection) > 150) {
                    mysqli_close($connection);
                    $_SESSION['termsandconditionerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You cannot use more than 150 characters!</strong>\n".
                                            "</strong>\n";
                    header("location:termsandcondition.php");
                    die();
                } 
            } else if (!isset($_POST['termsandcondition']) || strlen($_POST['termsandcondition']) == 0) {
                 mysqli_close($connection);
                $_SESSION['termsandconditionerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Please give a data!</strong>\n".
                                            "</strong>\n";
                header("location:termsandcondition.php");die();
            }
            
        }
    } else {
        header("location:termsandcondition.php");
        die();
    }
?>


