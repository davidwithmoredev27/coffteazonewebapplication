<?php require "connection.php"; ?>
<?php
    session_start();
    $UserID = false;
    $userIDSQlIPrevent = false;
    $preventExecution = false;
    $alluserId = array();
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }

    if (isset($_POST['deleteaccount'])) {
        

        if (is_numeric($_POST['deleteid'])) {
            
            $UserID = sanitizedData($_POST['deleteid']);
            $userIDSQlIPrevent = mysqli_real_escape_string($connection , $UserID);
            
            $sql = "SELECT ID FROM tbl_admin WHERE ID =". $userIDSQlIPrevent;
            $IDqueryResult = mysqli_query($connection , $sql);

            if (mysqli_num_rows($IDqueryResult) > 0) {
                $sql = "DELETE FROM tbl_admin WHERE ID =". $userIDSQlIPrevent;
                mysqli_query($connection , $sql);
                mysqli_close($connection);
                $_SESSION['accountdeletesuccess'] = "<span><strong class=\"white-text\">Account Succesfully Deleted!</strong></span>\n";
                header("location:users.php?admin");
            } else if(mysqli_num_rows($IDqueryResult) <= 0) {
                mysqli_close($connection);
                $_SESSION['accountdeleteerror'] = "<span><strong class=\"white-text\">Account is not Available</strong></span>\n";    
                header("location:users.php?admin");     
            }

        } else if(!is_numeric($_POST['deleteid'])) {
            mysqli_close($connection);
            $_SESSION['accountdeleteerror'] = "<span><strong class=\"white-text\">Input a Valid ID!</strong></span>\n";
            header("location:users.php?admin");
        }
    } else {
        mysqli_close($connection);
        $_SESSION['accountdeleteerror'] = "<span><strong class=\"white-text\">Select an id!</strong></span>\n";
        header("location:users.php?admin");
    }
?>
