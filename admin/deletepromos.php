<?php require "connection.php";?>
<?php 
    session_start();
    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    $preventSQl = null;
     function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

     if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['promosedeletesubmit'])) {
            if (isset($_POST['deletepromosid'])) {
                if (is_numeric($_POST['deletepromosid'])) {
                    $id = sanitizedData($_POST['deletepromosid']);
                    $preventSQl = mysqli_real_escape_string($connection , $id);

                    $sql = "SELECT * FROM tbl_promos WHERE id = ". $preventSQl;

                    $result = mysqli_query($connection , $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $path = $rows['path'];
                        }
                        $sql = "DELETE FROM tbl_promos WHERE id = ".$preventSQl;
                        mysqli_query($connection , $sql);
                        unlink("../" . $path);
                        mysqli_close($connection);
                        $_SESSION['promossuccess'] = "<span><strong class=\"white-text\">Data successfully deleted!</strong></span>\n";
                        header("location:newproduct.php");
                        die();
                    } elseif (mysqli_num_rows($result) == 0) {
                         $_SESSION['promoserror'] = "<span><strong class=\"white-text\">Invalid promos id!</strong></span>\n";
                        header("location:newproduct.php");
                        die();
                    }

                } elseif (!is_numeric($_POST['deletepromosid'])) { 
                    mysqli_close($connection);
                    $_SESSION['promoserror'] = "<span><strong class=\"white-text\">Invalid promos id!</strong></span>\n";
                    header("location:newproduct.php");
                    die();
                }
            } elseif (!isset($_POST['deletepromosid'])) {
                mysqli_close($connection);
                $_SESSION['promoserror'] = "<span><strong class=\"white-text\">Select promos data needs to be deleted!</strong></span>\n";
                header("location:newproduct.php");
                die();
            }
        } elseif (!isset($_POST['promosedeletesubmit'])) {
            mysqli_close($connection);
            $_SESSION['promoserror'] = "<span><strong class=\"white-text\">Select promo needs to be deleted!</strong></span>\n";
            header("location:newproduct.php");
            die();
        }
    } else {
        mysqli_close($connection);
        header("location:newproduct.php");
        die;
    }
?>