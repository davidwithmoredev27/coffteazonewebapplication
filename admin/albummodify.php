<?php require "connection.php";?>
<?php
    session_start();
    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    $_SESSION['mainpath'] = "../img/gallery/";
    
    $preventSQlinjection = false;

    $_SESSION['uploadstatus'] = "try";
    $_SESSION['albumupdateerror'] = null;
    $_SESSION['optionsuccess'] = null;
     function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
     function UploadFile($img) {
         require "connection.php";
         $allowed = array('jpg' => 'image/jpeg' ,  'jpeg' => 'image/jpeg' , 'JPG' => 'image/jpg');
        if(isset($img)) {
    
            $filename = $img['name'];
            $filetype = $img['type'];
            $size = $img['size'];
            $filetmpname = $img["tmp_name"];
            $ext = array();
            for ($index = 0 ; $index < count($filename) ; $index++) {
                $ext[$index] = pathinfo($filename[$index] ,PATHINFO_EXTENSION);

            }
            $maxSize = 1024 * 1024;

            for ($ii = 0 ; $ii < count($filetype) ; $ii++) {
                
                if(!array_key_exists($ext[$ii] , $allowed)) {
                    $_SESSION['uploadstatus'] = 0;
                
                    $_SESSION['albumupdateerror'] = "<span class=\"red darken-3 center-align\"><strong class=\"white-text\">".
                        "One or More image is invalid or iligitimate JPEG image format!"."</strong></span>\n";
            
                    break;
                }
                if ($size[$ii] > $maxSize) {
                    $_SESSION['uploadstatus'] = 0;
                    $_SESSION['albumupdateerror'] = "<span class=\"red darken-3 center-align\"><strong class=\"white-text\">".
                        "There are image that is greater than 1MB!"."</strong></span>\n";
                    break;
                }
                #check the image if its greater than 1mb
                if (!in_array($filetype[$ii] , $allowed)) {
                     $_SESSION['albumupdateerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                        "One or More image is invalid!"."</strong></span>\n";
                    $_SESSION['uploadstatus'] = 0;
                    break;
                }
            }

            if ($_SESSION['uploadstatus'] !== 0) {
                $_SESSION['uploadstatus'] = 1;
            }
            # check the upload status if 0 then stop the execution
            if ($_SESSION['uploadstatus'] == 0) {
                mysqli_close($connection);
                header("location:addimages.php");
                die();
            } elseif ($_SESSION['uploadstatus'] == 1) {
                
                $_SESSION['filnamecount'] = count($filename);
                // get all the path
                for($path = 0 ; $path < count($filename) ; $path++) { 
                    $_SESSION['path'][$path] = "img/gallery/" . $_SESSION['optionsuccess']."/".$filename[$path];
                    
                }
               
    
                if (file_exists("../img/gallery/" . $_SESSION['optionsuccess'])) {
                    for ($index = 0 ; $index < count($filename) ; $index++) {

                        if (file_exists("../img/gallery/" . $_SESSION['optionsuccess']."/".$filename[$index])) {
                            unlink("../img/gallery/" . $_SESSION['optionsuccess']."/".$filename[$index]);
                            move_uploaded_file($filetmpname[$index] ,"../img/gallery/" . $_SESSION['optionsuccess']."/".$filename[$index]);
                        } elseif (!file_exists("../img/gallery/" . $_SESSION['optionsuccess']."/".$filename[$index])) {
                            move_uploaded_file($filetmpname[$index] ,"../img/gallery/" . $_SESSION['optionsuccess']."/".$filename[$index]);
                        }
                    }
                } elseif (!file_exists("../img/gallery/" . $_SESSION['optionsuccess'])) {
                    mkdir($_SESSION['mainpath'].$_SESSION['optionsuccess'] , 0755);
                    for($index = 0 ; $index < count($filename); $index++) {
                        move_uploaded_file($filetmpname[$index], "../img/gallery/" . $_SESSION['optionsuccess']."/".$filename[$index]);
                    }
                }
            }

        } else {
            $_SESSION['albumupdateerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                        "Upload failed!"."</strong></span>\n";
            header("location:addimages.php");
            die();
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if (!isset($_POST['albumupdate'])) {
        
            header("location:addimages.php");
            die();
        } elseif (isset($_POST['albumupdate'])) {

            if (isset($_POST['selectalbum'])) {
                $option = sanitizedData($_POST['selectalbum']);
                $preventSQlinjection = mysqli_real_escape_string($connection , $option);
                $sql = "SELECT title FROM tbl_gallery_album_title WHERE title = '".$preventSQlinjection."'";
                $result = mysqli_query($connection , $sql);


                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['optionsuccess'] = $preventSQlinjection;
                
                } elseif (mysqli_num_rows($result) <= 0 ) {
                    mysqli_close($connection);
                     $_SESSION['albumupdateerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                        "No rows found!"."</strong></span>\n";
                    header("location:addimages.php");
                    die();
                }
            
            } elseif (!isset($_POST['selectalbum'])) {
                mysqli_close($connection);
                $_SESSION['albumupdateerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                        "Choose album inside album list!"."</strong></span>\n";
                header("location:addimages.php");
                die();
            }
            if (isset($_FILES['addimg'])) {
                UploadFile($_FILES['addimg']);
                
            } elseif (!isset($_FILES['addimg'])) {
                mysqli_close($connection);
                 $_SESSION['albumupdateerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "Upload Images for your album"."</strong></span>\n";
                header("location:addimages.php");
                die();
            }
            if (isset($_SESSION['uploadstatus']) && $_SESSION['uploadstatus'] == 1 && isset($_SESSION['optionsuccess'])) {
            
                for ($index = 0 ; $index < $_SESSION['filnamecount'] ; $index++) {
                    $sql = "INSERT INTO tbl_gallery_album_".$_SESSION['optionsuccess']."(path)"." VALUES('".$_SESSION['path'][$index]."')";
                    mysqli_query($connection , $sql);
                }
                $_SESSION['albumupdatesuccess'] = "<span class=\"green darken-3\"><strong class=\"white-text center-align\">"."Album ".$_SESSION['optionsuccess']." successfully updated!</strong></span>\n";
                header("location:addimages.php");die();
            } elseif ((!isset($_SESSION['optionsuccess']) && !isset($_SESSION['uploadstatus'])) || $_SESSION['uploadstatus'] === 0) {
                 mysqli_close($connection);
                $_SESSION['albumupdateerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "There's an error!"."</strong></span>\n";
                header("location:addimages.php");
                die();
            }
        }
    } else {
        mysqli_close($connection);
        header("location:addimages.php");
       
        
    }
?>