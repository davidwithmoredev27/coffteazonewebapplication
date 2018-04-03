<?php require "connection.php";?>
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
        if (isset($_POST['feedbackdelete'])) {
            if (isset($_POST['feedbackdeleteid'])) {
                if (is_numeric($_POST['feedbackdeleteid'])) {
                    $feedbackId = sanitizedData($_POST['feedbackdeleteid']);
                    $preventSQl = mysqli_escape_string($connection , $feedbackId);

                    $sql = "SELECT * FROM tbl_feedback WHERE feedbackID = ". $preventSQl;

                    $result = mysqli_query($connection , $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $path = $rows['path'];
                        }
                        $sql = "DELETE FROM tbl_feedback WHERE feedbackID = ".$preventSQl;
                        mysqli_query($connection , $sql);
                        unlink("../" . $path);
                        mysqli_close($connection);
                        $_SESSION['feedbacksuccess'] = "<span><strong class=\"white-text\">Data successfully deleted!</strong></span>\n";
                        header("location:feedback.php");
                        die();
                    } elseif (mysqli_num_rows($result) == 0) {
                         $_SESSION['feedbackerror'] = "<span><strong class=\"white-text\">Invalid feedback id!</strong></span>\n";
                        header("location:feedback.php");
                        die();
                    }

                } elseif (!is_numeric($_POST['feedbackdeleteid'])) { 
                    mysqli_close($connection);
                    $_SESSION['feedbackerror'] = "<span><strong class=\"white-text\">Invalid feedback id!</strong></span>\n";
                    header("location:feedback.php");
                    die();
                }
            } elseif (!isset($_POST['feedbackdeleteid'])) {
                mysqli_close($connection);
                $_SESSION['feedbackerror'] = "<span><strong class=\"white-text\">Select feedback message needs to be deleted!</strong></span>\n";
                header("location:feedback.php");
                die();
            }
        } elseif (!isset($_POST['feedbackdelete'])) {
            mysqli_close($connection);
            $_SESSION['feedbackerror'] = "<span><strong class=\"white-text\">Select feedback message needs to be deleted!</strong></span>\n";
            header("location:feedback.php");
            die();
        }
    } else {
        mysqli_close($connection);
        header("location:feedback.php");
        die;
    }

?>