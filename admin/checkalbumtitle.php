<?php require "connection.php";?>
<?php
    session_start();
     if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    $albumStatus = false;
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['albumview'])) {

            if (isset($_POST['selectalbum'])) {
                $selectalbumData = sanitizedData($_POST['selectalbum']);
                $preventSqlInjection = mysqli_escape_string($connection ,$selectalbumData);
                $sql = "SELECT * FROM tbl_gallery_album_title";
                $result = mysqli_query($connection ,$sql);
                if (mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        if ($rows['title'] === $preventSqlInjection) {
                            $_SESSION['selectedtitle'] = $rows['title'];
                            $albumStatus = true;
                            break;
                        }
                    }
                     if ($albumStatus === true) {
                        mysqli_close($connection);
                        header("location:albumcontent.php?".$_SESSION['selectedtitle']);
                        die();
                    } elseif ($albumStatus !== true) {
                        mysqli_close($connection);
                        $_SESSION['albumviewerror'] = "<span class=\"white-text\"><strong class=\"center-align\">Invalid album!</strong></span>\n";
                        header("location: galleryview.php");
                        die();
                    }
                } elseif (mysqli_num_rows($result) <= 0) {
                    mysqli_close($connection);
                    $_SESSION['albumviewerror'] = "<span class=\"white-text\"><strong class=\"center-align\">Select does not exist!</strong></span>\n";
                    header("location: galleryview.php");
                    die();
                }
            } elseif (!isset($_POST['selectalbum'])) {
                mysqli_close($connection);
                $_SESSION['albumviewerror'] = "<span class=\"white-text\"><strong class=\"center-align\">Select Album!</strong></span>\n";
                header("location: galleryview.php");
                die();
            }
        } 
    } else {
        die();
    }
   
?>