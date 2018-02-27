<?php require "connection.php"; ?>
<?php
    session_start();
    $UserID = false;
    $userIDSQlIPrevent = false;
    $alluserId = array();
    
    $acceptedUser = null;
    $acceptedPassword = null;
    $acceptedSecurityPin  = null;

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

    if (isset($_POST['accept'])) {
        
        if (filter_var($_POST['acceptid'] , FILTER_VALIDATE_INT)) {
            $UserID = sanitizedData($_POST['acceptid']);
            $userIDSQlIPrevent = mysqli_escape_string($connection , $UserID);
            
            $sql = "SELECT id FROM tbl_filter WHERE id =". $userIDSQlIPrevent;
            $IDqueryResult = mysqli_query($connection , $sql);

            if (mysqli_num_rows($IDqueryResult) > 0) {

                $sql = "SELECT * FROM tbl_filter WHERE id =". $userIDSQlIPrevent;
                $result = mysqli_query($connection , $sql);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    //$acceptedRequest['id'] = $row['id'];
                    $acceptedUser = $row['username'];
                    $acceptedPassword = $row['password'];
                    $acceptedSecurityPin = $row['pin'];

                }
            
                if (isset($acceptedUser) && isset($acceptedPassword)) {
                
                        $sql = "INSERT INTO tbl_admin(username , password , pin)
                         VALUES('$acceptedUser','$acceptedPassword' ,". $acceptedSecurityPin .")";
                        mysqli_query($connection , $sql);
                        // delete the particular row in the tbl_filter
                        $sql = "DELETE FROM tbl_filter WHERE id =". $userIDSQlIPrevent;
                        mysqli_query($connection , $sql);
                }
            
                $_SESSION['accountacceptsuccess'] = "<span><strong class=\"white-text\">Request successfully Accepted!</strong></span>\n";
                header("location:filter.php?admin");
            } else if(mysqli_num_rows($IDqueryResult) <= 0) {
                mysqli_close($connection);
                $_SESSION['accountaccepterror'] = "<span><strong class=\"white-text\">Account is not Available</strong></span>\n";    
                header("location:filter.php?admin");     
            }

        } else if(!filter_var($_POST['acceptid'] , FILTER_VALIDATE_INT)) {
            mysqli_close($connection);
            $_SESSION['accountaccepterror'] = "<span><strong class=\"white-text\">Input a valid id!</strong></span>\n";
            header("location:filter.php?admin");
        }
    }
?>
