<?php require "connection.php"; ?>
<?php
    session_start();
    $UserID = false;
    $userIDSQlIPrevent = false;
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

    if (isset($_POST['revoke'])) {
        
        if (is_numeric($_POST['revokeid'])) {
            $UserID = sanitizedData($_POST['revokeid']);
            $userIDSQlIPrevent = mysqli_escape_string($connection , $UserID);
            
            $sql = "SELECT id FROM tbl_filter WHERE id =". $userIDSQlIPrevent;
            $IDqueryResult = mysqli_query($connection , $sql);

            if (mysqli_num_rows($IDqueryResult) > 0) {
                
                $sql = "DELETE FROM tbl_filter WHERE id =". $userIDSQlIPrevent;
                mysqli_query($connection , $sql);
                $_SESSION['accountrevokesuccess'] = "<span><strong class=\"white-text\">Request Succesfully Revoked</strong></span>\n";
                header("location:filter.php?admin");
            } elseif (mysqli_num_rows($IDqueryResult) <= 0) {
                mysqli_close($connection);
                $_SESSION['accountrevokeerror'] = "<span><strong class=\"white-text\">Account id is not Available</strong></span>\n";    
                header("location:filter.php?admin");     
            }

        } elseif (!is_numeric($_POST['revokeid'])) {
            mysqli_close($connection);
            $_SESSION['accountrevokeerror'] = "<span><strong class=\"white-text\">input a Valid is!</strong></span>\n";
            header("location:filter.php?admin");
        }
    }
?>
