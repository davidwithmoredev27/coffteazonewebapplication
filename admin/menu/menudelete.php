<?php require "../connection.php";?>
<?php
    session_start();
    $deletePath = $_SESSION['menupath'];
    $databaseName = $_SESSION['database_name'];
    $pageLink = $_SESSION['pagelink'];
    $pageName = $_SESSION['pagename'];
    $preventSQl = false;
    $image = null;
    
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
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['menudelete'])) {
            if (is_numeric($_POST['menudeleteid'])) {
                $deleteid = sanitizedData($_POST['menudeleteid']);
                $preventSQl = mysqli_escape_string($connection , $deleteid);

                $sql = "SELECT * FROM ".$databaseName." WHERE id = ".$preventSQl;
                $result = mysqli_query($connection , $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                    $image = $rows['path'];
                }

                $sql = "DELETE FROM ".$databaseName. " WHERE id = ".$preventSQl;

                mysqli_query($connection , $sql);
                unlink("../../".$image);
                mysqli_close($connection);
                $_SESSION['menuuploadsuccess'] = "<span><strong class=\"white-text\">".$pageName." Successfully Updated!</strong></span>\n";
                header("location:".$pageLink);
                die();
            } elseif (!is_numeric($_POST['menudeleteid'])) {
                mysqli_close($connection);
                $_SESSION['menuuploaderror'] = "<span><strong class=\"white-text\">Invalid Id!</strong></span>\n";
                header("location:" .$pageLink);
                die();
            }
        } elseif (!isset($_POST['menudelete'])) {
            mysqli_close($connection);
            $_SESSION['menuuploaderror'] = "<span><strong class=\"white-text\">Select you want to delete!</strong></span>\n";
            header("location:" .$_SESSION['pagelink']);
            die();
        }   
    } else {
        mysqli_close($connection);
        header("../dashboard.php");
    }
?>
