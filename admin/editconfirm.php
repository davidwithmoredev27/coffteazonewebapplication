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
    if (!isset($_SESSION['idchange'])) {
        mysqli_close($connection);
        header("location:users.php?admin");
    }
    $newusername = null;
    $newpassword = null;
    $usernameStatus = null;
    $passwordStatus = null;
    $userpreventsqlInjection = null;
    $passwordpreventsqlinjection = null;
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

             if (isset($_POST['newusername'])) {
                $newusername = sanitizedData($_POST['newusername']);
                $userpreventsqlInjection = mysqli_escape_string($connection , $newusername);
                $usernameStatus = true;
             }
             if (isset($_POST['newpassword'])) {
                $newpassword = sanitizedData($_POST['newpassword']);
                $passwordpreventsqlinjection = mysqli_escape_string($connection , $newpassword);
                if(strlen($passwordpreventsqlinjection) < 8) {
                    mysqli_close($connection);
                     $_SESSION['accountediterror'] = "<span><strong class=\"white-text\">Please use a minimum of 8 characters!</strong></span>\n";
                     header("location:editaccount.php");
                     die();
                } elseif (strlen($passwordpreventsqlinjection) >= 8) {
                    $hashed_password = crypt($passwordpreventsqlinjection , $salt);
                    $passwordStatus = true;
                }

             }

             if (isset($passwordStatus) && isset($usernameStatus)) {
                $sql = "UPDATE tbl_admin SET username = ". "\"$newusername\"" . " , " . "password = ". "\"$hashed_password\"" .  " WHERE ID = ". $_SESSION['idchange'];
                //die($sql);
                mysqli_query($connection , $sql); 
                $_SESSION['accounteditsuccess'] = "<span><strong class=\"white-text\">".$_SESSION['idchange']." Successfully updated!</strong></span>";
                header("location:users.php?admin");
                
             }
        }
        mysqli_close($connection);
    } else {
        mysqli_close($connection);
        header("location:users.php");
        die();
    }
?>