<?php require "connection.php";?>
<?php
session_start();
   $path = null; 
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

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['deletesubmit'])) {

            if (isset($_POST['deleteid'])) {
                $deleteid = sanitizedData($_POST['deleteid']);
                $preventSqlInjection = mysqli_escape_string($connection , $deleteid);
                if (is_numeric($preventSqlInjection)) {
                    $sql = "SELECT path FROM tbl_gallery_album_".$_SESSION['selectedtitle']. " WHERE id =". $preventSqlInjection;
                    $result = mysqli_query($connection, $sql);
                    while($rows = mysqli_fetch_assoc($result)) {
                        $path = $rows['path'];
                    }
                    unli("../". $path);
                    $sql = "DELETE FROM tbl_gallery_album_".$_SESSION['selectedtitle']." WHERE id = ".$preventSqlInjection;
                    mysqli_query($connection , $sql);
                    $_SESSION['albumimagesuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">Image successfully deleted!</strong></span>\n";
                    header("location:albumcontent.php");
                    die;
                } elseif (!is_numeric($_SESSION['selectedtitle'])) {
                    mysqli_close($connection);
                    $_SESSION['albumimageerror'] = "<span class=\"center-align\"><strong class=\"white-text\">Ivalid image!</strong></span>\n";
                    header("location:albumcontent.php");
                    die;
                }
            } elseif (!isset($_POST['deleteid'])) {
                $_SESSION['albumimageerror'] = "<span class=\"center-align\"><strong class=\"white-text\">Ivalid image!</strong></span>\n";
                mysqli_close($connection);
                header("location:albumcontent.php");
            }
        }
    } else {
        mysqli_close($connection);
        header("location:galleryview.php"); die;
    }
?>