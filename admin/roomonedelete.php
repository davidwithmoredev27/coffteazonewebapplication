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

    if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
        if (isset($_POST['btndelete'])) {
            $id = sanitizedData($_POST['roomdelete']);
        
            $sqlPreventInjection = mysqli_real_escape_string($connection , $id);

            if (is_numeric($sqlPreventInjection)) {
                $sql = "SELECT * FROM tbl_services_ktv_room1 WHERE id = ".$id;
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $path = $rows['path'];
                    }
                    unlink("../" . $path);
                    $sql = "DELETE FROM tbl_services_ktv_room1  WHERE id = " .$id;
                    mysqli_query($connection , $sql);
                    mysqli_close($connection);
                    $_SESSION['success'] = "<span><strong class=\"white-text\">Data successfully deleted!</strong></span>\n";
                    header("location:ktvservices.php");
                    die();

                } elseif (mysqli_num_rows($result) <= 0) {
                    mysqli_close($connection);
                    $_SESSION['error'] = "<span><strong class=\"white-text\">Invalid id!</strong></span>\n";
                    header("location:ktvservices.php");
                    die();
                }
            } elseif (!is_numeric($sqlPreventInjection)) {
                mysqli_close($connection);
                $_SESSION['error'] = "<span><strong class=\"white-text\">Invalid id!</strong></span>\n";
                header("location:ktvservices.php");
                die();
            }
        }
   
    } else {
        header("location:ktvservices.php");
    }

?>