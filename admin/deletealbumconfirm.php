<?php require "connection.php";?>
<?php
    session_start();
   $path = null;
   $titleStatus = null; 
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
        if (is_dir($target)) {
            $files = glob( $target . '*', GLOB_MARK );
            
            foreach( $files as $file ) {
                RemoveDirectory( $file );      
            }
            rmdir($target);
        } elseif(is_file($target)) {
            unlink( $target );  
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
                        RemoveDirectory("../img/gallery/". $preventSQLInjection);
                        mysqli_query($connection , $sql);
                    } elseif($titleStatus !== true) {

                    }
                }
            } elseif (!isset($_POST['selectalbum'])) {

            }
            
        }
    } else {
        mysqli_close($connection);
        header("location:galleryview.php"); die;
    }
?>