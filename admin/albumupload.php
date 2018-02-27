<?php require "connection.php";?>
<?php
    session_start();
    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    $_SESSION['mainpath'] = "../img/gallery/";
    
    $preventSQlinjection = false;
    $titleSuccess = false;
    $descriptionSuccess = false;
    $priceSuccess = false;
    $_SESSION['dirpath'] = array();
    $_SESSION['uploadstatus'] = 1;
    $_SESSION['albumerror'] = null;
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
                    $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                        "There are other files!"."</strong></span>\n";
            
                    break;
                }
                #check the image if its greater than 1mb
                if ($size[$ii] > $maxSize) {
                    $_SESSION['uploadstatus'] = 0;
                    $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                        "There are image that is greater than 1MB!"."</strong></span>\n";

            
                    break;
                }
                if (!in_array($filetype[$ii] , $allowed)) {
                     $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                        "There are other files or Invalid image file type!"."</strong></span>\n";
                    $_SESSION['uploadstatus'] = 0;
                    break;
                }
            }
        
            # check the upload status if 0 then stop the execution
            if ($_SESSION['uploadstatus'] == 0) {
                mysqli_close($connection);
                header("location:galleryalbumadd.php");
                die();
            } elseif ($_SESSION['uploadstatus'] == 1) {
                
                $_SESSION['filnamecount'] = count($filename);
                // get all the path
                for($path = 0 ; $path < count($filename) ; $path++) { 
                    $_SESSION['path'][$path] = "img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$path];
                    
                }
                $sql = "CREATE TABLE tbl_gallery_album_".$_SESSION['albumtitlepath']." (".
                    "id INT NOT NULL AUTO_INCREMENT,".
                    "path VARCHAR(1000) NOT NULL,".
                    "PRIMARY KEY(id)".
                ")";
                mysqli_query($connection, $sql);
    
                if (file_exists("../img/gallery/" . $_SESSION['albumtitlepath'])) {
                    for ($index = 0 ; $index < count($filename) ; $index++) {
                        if (file_exists("../img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$index])) {
                            unlink("../img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$index]);
                            move_uploaded_file($filetmpname[$index] ,"../img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$index]);
                        } elseif (!file_exists("../img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$index])) {
                            move_uploaded_file($filetmpname[$index] ,"../img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$index]);
                        }
                    }
                } elseif (!file_exists("../img/gallery/" . $_SESSION['albumtitlepath'])) {
                    mkdir($_SESSION['mainpath'].$_SESSION['albumtitlepath'] , 0755);
                    for($index = 0 ; $index < count($filename); $index++) {
                        move_uploaded_file($filetmpname[$index], "../img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$index]);
                    }
                }
            }

        } else {
            $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align \">".
                        "Upload failed!"."</strong></span>\n";
            header("location:galleryalbumadd.php");
            die();
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if (!isset($_POST['addalbumsubmit'])) {
        
            header("location:galleryalbumadd.php");
            die();
        } elseif (isset($_POST['addalbumsubmit'])) {

            if (isset($_POST['albumtitle']))  {
                $albumtitle = sanitizedData($_POST['albumtitle']);
                $preventSQlinjection = mysqli_escape_string($connection , $albumtitle);
                if ((strlen($preventSQlinjection) < 100 || strlen($preventSQlinjection) == 100) && strlen($preventSQlinjection) != 0 ) {
                    $titleSuccess = $preventSQlinjection;
        
                    $_SESSION['albumtitlepath'] = $titleSuccess;
                } elseif (strlen($preventSQlinjection) > 100 || strlen($preventSQlinjection) == 0) {
                    mysqli_close($connection);
                    $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "You've reach the maximum or 100 characters!"."</strong></span>\n";
                    header("location:galleryalbumadd.php");
                    die();
                }

            } elseif (!isset($_POST['albumtitle']) or strlen($_POST['albumtitle']) === 0) {
                mysqli_close($connection);
                $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "Please give your album a title!"."</strong></span>\n";
                header("location:galleryalbumadd.php");
                die();
            }

            if (isset($_POST['albumdescription']))  {
                $albumdescription = sanitizedData($_POST['albumdescription']);
                $preventSQlinjection = mysqli_escape_string($connection , $albumdescription);
                
                if ((strlen($preventSQlinjection) < 1000 || strlen($preventSQlinjection) == 1000) && strlen($preventSQlinjection) != 0 ) {
                    $descriptionSuccess = $preventSQlinjection;
                } elseif (strlen($preventSQlinjection) > 1000 || strlen($preventSQlinjection) == 0) {
                    mysqli_close($connection);
                      $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "You've reach the maximum or 1000 characters for  your description!"."</strong></span>\n";
                    header("location:galleryalbumadd.php");
                    die();
                }

            } elseif (!isset($_POST['albumdescription']) or strlen($_POST['albumdescription']) === 0) {
                mysqli_close($connection);
                $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "Please give your album a Description!"."</strong></span>\n";
                header("location:galleryalbumadd.php");
                die();
            }

            if (isset($_FILES['album'])) {
                UploadFile($_FILES['album']);
            } elseif (!isset($_FILES['album'])) {
                mysqli_close($connection);
                 $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "Upload Images for your album"."</strong></span>\n";
                header("location:galleryalbumadd.php");
                die();
            }

            if (isset($titleSuccess) and isset($descriptionSuccess) and isset($_SESSION['uploadstatus'])) {
                for ($index = 0 ; $index < $_SESSION['filnamecount'] ; $index++) {
                    $sql = "INSERT INTO tbl_gallery_album_".$_SESSION['albumtitlepath']."(path)"." VALUES('".$_SESSION['path'][$index]."')";
                    mysqli_query($connection , $sql);
                }
                mysqli_close($connection);
                $_SESSION['albumsuccess'] = "<span class=\"green darken-3\"><strong class=\"white-text center-align\">".
                "Album " .$_SESSION['albumtitlepath']." Successfully Updated!"."</strong></span>\n";
                header("location:galleryalbumadd.php");die();
            } elseif ((!isset($titleSuccess) and !isset($descriptionSuccess) and !isset($_SESSION['uploadstatus'])) and $_SESSION['uploadstatus'] === 0) {
                 mysqli_close($connection);
                $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "There's an error!"."</strong></span>\n";
                header("location:galleryalbumadd.php");
                die();
            }
        }
    } else {
        mysqli_close($connection);
        header("location:gallery.php");
        die();
        
    }
?>