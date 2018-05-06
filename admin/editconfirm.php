<?php require "connection.php"; ?>
<?php
    session_start();
     //$_SESSION['idchange'] = $rows['ID'];
    // $_SESSION['usernamechange'] = $rows['username'];
    // $_SESSION['passwordchange'] = $rows['password'];
    if (!isset($_SESSION['username']) && !isset($_POST['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }



    $newusername = null;
    $newpassword = null;
    $oldpassword = null;
    $usernameStatus = null;
    $passwordStatus = null;
    $pinStatus = null;
    $userpreventsqlInjection = null;
    $passwordpreventsqlinjection = null;
    $pinpreventsqlinjection = null;
    $salt  = '$2a$07$usesomassodosrkeoaol1e35958kdafir1rsalt$';
    $hashed_password = false;
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
    

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['accountchange'])) {

             if (isset($_POST['oldpassword'])) {
                 if (strlen($_POST['oldpassword']) < 8) {
                    mysqli_close($connection);
                    $_SESSION['accountediterror'] = "<span class=\"center-align\"><strong class=\"white-text center-align\">Invalid password!</strong></span>\n";
                    header("location:editaccount.php");
                    die;
                 } elseif (strlen($_POST['oldpassword'])  >= 8) {
                    $oldpassword = sanitizedData($_POST['oldpassword']);
                    $oldpasspreventsqlinjection = mysqli_real_escape_string($connection ,$oldpassword);
                    $hashed_oldPassword = crypt($oldpasspreventsqlinjection , $salt);
                    $sql = "SELECT password FROM tbl_admin WHERE username ="."\"".$_SESSION['username']."\"";
                
                    $result = mysqli_query($connection , $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            $passwordConfirm = $rows['password'];
                        }
                        if ($passwordConfirm == $hashed_oldPassword) {
                            $oldpasswordStatus = true;
                        } elseif ($passwordConfirm !== $hashed_oldPassword) {
                            mysqli_close($connection);
                            $_SESSION['accountediterror'] = "<span><strong class=\"white-text center-align\">Invalid password!</strong></span>\n";
                            header("location:editaccount.php");
                            die();
                        }
                    } elseif (mysqli_num_rows($result) <= 0) {
                        mysqli_close($connection);
                        $_SESSION['accountediterror'] = "<span><strong class=\"white-text center-align\">Password does not exist!</strong></span>\n";
                        header("location:editaccount.php");
                        die();
                    }
                }
            } elseif (!isset($_POST['oldpassword'])) {
                 mysqli_close($connection);
                $_SESSION['accountediterror'] = "<span><strong class=\"white-text center-align\">Please fill out old password field!</strong></span>\n";
                header("location:editaccount.php");
                die();
            }

             if (isset($_POST['newpassword'])) {
                $newpassword = sanitizedData($_POST['newpassword']);
                $passwordpreventsqlinjection = mysqli_escape_string($connection , $newpassword);
                if(strlen($passwordpreventsqlinjection) < 8) {
                    mysqli_close($connection);
                     $_SESSION['accountediterror'] = "<span><strong class=\"white-text center-align\">Password is less than 8!</strong></span>\n";
                     header("location:editaccount.php");
                     die();
                } elseif (strlen($passwordpreventsqlinjection) >= 8) {
                    if (preg_match("/\s/",$passwordpreventsqlinjection)) {
                        mysqli_close($connection);
                        $_SESSION['accountediterror'] = "<span><strong class=\"white-text center-align\">Space are not allowed!</strong></span>\n";
                        header("location:editaccount.php");
                        die();
                    }
                    $hashed_password = crypt($passwordpreventsqlinjection , $salt);
                    $passwordStatus = true;
                }

             } elseif (!isset($_POST['newpassword'])) {
                mysqli_close($connection);
                $_SESSION['accountediterror'] = "<span><strong class=\"white-text center-align\">Choose Password!</strong></span>\n";
                header("location:editaccount.php");
                die();
             }             

             if (isset($passwordStatus)) {
                $sql = "UPDATE tbl_admin SET password = ". "\"$hashed_password\"" .  " WHERE username = ". "\"".$_SESSION['username']."\"";
                //die($sql);
                mysqli_query($connection , $sql); 
                $_SESSION['accounteditsuccess'] = "<span><strong class=\"white-text\">".$_SESSION['username']." Successfully updated!</strong></span>";
                $_SESSION['idcontinuation'] = null;
                header("location:dashboard.php?admin");
             } 
        }
        mysqli_close($connection);
    } else {
        mysqli_close($connection);
        header("location:dashboard.php");
        die();
    }
?>