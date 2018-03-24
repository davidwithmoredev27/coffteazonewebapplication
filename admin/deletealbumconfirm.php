<?php require "connection.php";?>
<?php
    session_start();
   $path = null;
   $titleStatus = null;
   $preventSQLInjection = null;
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
    function RemoveDirectory($target) {
      $files = glob($target . "/*");
       foreach ($files as $file){
            if (is_file($file)) {
                unlink($file);
                RemoveDirectory("../img/gallery/". $_SESSION['dirtobedelete']);
            } elseif (!is_file($file)) {
                if(is_dir($target)){
                    rmdir($target);
                }
            }
        }
        
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['albumdelete'])) {

            if (isset($_POST['selectalbum'])) {
                $title = sanitizedData($_POST['selectalbum']);
                $preventSQLInjection = mysqli_escape_string($connection, $title);
                $sql = "SELECT title FROM tbl_gallery_album_title WHERE title = '$preventSQLInjection'";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result)) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        if ($rows['title'] == $preventSQLInjection) {
                            $titleStatus = true;
                        }
                    }
                    if ($titleStatus == true) {
                        $sql = "DELETE FROM tbl_gallery_album_title WHERE title = '$preventSQLInjection'";
                        mysqli_query($connection , $sql);
                    
                        $_SESSION['dirtobedelete'] = $preventSQLInjection;
                        RemoveDirectory("../img/gallery/". $_SESSION['dirtobedelete']);
                        $sql = "DROP TABLE tbl_gallery_album_".$_SESSION['dirtobedelete'];
            
                        mysqli_query($connection , $sql);
                        $_SESSION['albumdeletesuccess'] = "<span><strong class=\"white-text\">".$_SESSION['dirtobedelete']. " album successfully deleted!</strong></span>\n";
                        header("location:deletealbum.php");
                        die();
                    } elseif($titleStatus !== true) {
                        mysql_close($connection);
                        $_SESSION['albumdeleteerror'] = "<span ><strong class=\"white-text\">Album does not exist!</strong></span>\n";
                        header("location:deletealbum.php");
                        die();
                    }
                }
            } elseif (!isset($_POST['selectalbum'])) {
                $_SESSION['albumdeleteerror'] = "<span><strong class=\"white-text\">Select Album!</strong></span>\n";
                header("location:deletealbum.php");
                die();
            }
            
        }
    } else {
        mysqli_close($connection);
        header("location:galleryview.php"); die;
    }
?>