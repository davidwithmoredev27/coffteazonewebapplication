 <?php require "connection.php"; ?>
 <?php
    session_start();
    
    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }

    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['roomdeletesubmit'])) {
            if (isset($_POST['roomdelete'])) {
                if (is_numeric($_POST['roomdelete'])) {
                    $roomdeleteid = sanitizedData($_POST['roomdelete']);
                    $preventSQl = mysqli_real_escape_string($connection , $roomdeleteid);

                    $sql = "SELECT * FROM tbl_roomthreetc WHERE id = ". $roomdeleteid;

                    $result = mysqli_query($connection , $sql);

                    if (mysqli_num_rows($result) > 0) {
    
                        $sql = "DELETE FROM tbl_roomthreetc WHERE id = ".$preventSQl;
                        mysqli_query($connection , $sql);
                        mysqli_close($connection);
                        $_SESSION['termsandconditionsuccess'] = "<span><strong class=\"white-text\">Data successfully deleted!</strong></span>\n";
                        header("location:termsandcondition.php");
                        die();
                    } elseif (mysqli_num_rows($result) == 0) {
                         $_SESSION['termsandconditionerror'] = "<span><strong class=\"white-text\">Invalid feedback id!</strong></span>\n";
                        header("location:termsandcondition.php");
                        die();
                    }

                } elseif (!is_numeric($_POST['roomdelete'])) { 
                    mysqli_close($connection);
                    $_SESSION['termsandconditionerror'] = "<span><strong class=\"white-text\">Invalid roomdelete id!</strong></span>\n";
                    header("location:termsandcondition.php");
                    die();
                }
            } elseif (!isset($_POST['roomdelete'])) {
                mysqli_close($connection);
                $_SESSION[''] = "<span><strong class=\"white-text\">Select feedback message needs to be deleted!</strong></span>\n";
                header("location:termsandcondition.php");
                die();
            }
        } elseif (!isset($_POST['roomdeletesubmit'])) {
            mysqli_close($connection);
            $_SESSION['termsandconditionerror'] = "<span><strong class=\"white-text\">Select feedback message needs to be deleted!</strong></span>\n";
            header("location:termsandcondition.php");
            die();
        }
    } else {
        mysqli_close($connection);
        header("location:termsandcondition.php");
        die;
    }

?>