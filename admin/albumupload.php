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
    $albumstatus = 0;
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
                        "Invalid filetype!"."</strong></span>\n";
            
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
                        "one or more are invalid filtype!"."</strong></span>\n";
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
                    copy("../img/buttons/next.png" , "../img/gallery/" . $_SESSION['albumtitlepath']);
                    copy("../img/buttons/prev.png" , "../img/gallery/" . $_SESSION['albumtitlepath']);
                    copy("../img/buttons/loading.gif" , "../img/gallery/" . $_SESSION['albumtitlepath']);
                    copy("../img/buttons/close.png","../img/gallery/" . $_SESSION['albumtitlepath']);
                } elseif (!file_exists("../img/gallery/" . $_SESSION['albumtitlepath'])) {
                    mkdir($_SESSION['mainpath'].$_SESSION['albumtitlepath'] , 0755);
                    for($index = 0 ; $index < count($filename); $index++) {
                        move_uploaded_file($filetmpname[$index], "../img/gallery/" . $_SESSION['albumtitlepath']."/".$filename[$index]);
                    }
                    copy("../img/buttons/next.png" , "../img/gallery/" . $_SESSION['albumtitlepath']);
                    copy("../img/buttons/prev.png" , "../img/gallery" . $_SESSION['albumtitlepath']);
                    copy("../img/buttons/loading.gif" , "../img/gallery/" . $_SESSION['albumtitlepath']);
                    copy("../img/buttons/close.png","../img/gallery/" . $_SESSION['albumtitlepath']);
                }
            }

        } else {
            $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
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
               
                if (strlen($preventSQlinjection) <= 50 && strlen($preventSQlinjection) !== 0 ) {
                    if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQlinjection)) {
                        $_SESSION['albumerror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters entry!</strong></span>\n";
                        header("location:galleryalbumadd.php");
                        die();
                    } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQlinjection)) {
                        $title = $preventSQlinjection;
                        $titleSuccess = preg_replace('/\s/', '_', $preventSQlinjection);
                        $_SESSION['albumtitlepath'] = $titleSuccess;
                    }
                   
                } elseif (strlen($preventSQlinjection) > 50) {
                    mysqli_close($connection);
                    $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "You've reach the maximum 50 characters!"."</strong></span>\n";
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
                
                if (strlen($preventSQlinjection) <= 100  && strlen($preventSQlinjection) !== 0 ) {


                    if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQlinjection)) {
                        $_SESSION['albumerror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters entry!</strong></span>\n";
                        header("location:galleryalbumadd.php");
                        die();
                    } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQlinjection)) {
                        $descriptionSuccess = $sqlPreventInjection;
                        $_SESSION['albumdescription'] = $descriptionSuccess;
                    }
                    
                } elseif (strlen($preventSQlinjection) > 100) {
                    mysqli_close($connection);
                      $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "You've reach the maximum or 100 characters for  your description!"."</strong></span>\n";
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
            
            if ($_FILES['album']['error'][0] >= 1) {
                $albumstatus = 1;
            }
        
            if ($albumstatus >= 1) {
                mysqli_close($connection);
                $_SESSION['albumerror'] = "<span class=\"red darken-3\"><strong class=\"white-text center-align\">".
                "Upload Images for your album"."</strong></span>\n";
                header("location:galleryalbumadd.php");
                die();
            } elseif ($albumstatus == 0) {
                 UploadFile($_FILES['album']);
            }

        
            if (isset($titleSuccess) and isset($_SESSION['uploadstatus']) && $_SESSION['uploadstatus'] == 1) {
                for ($index = 0 ; $index < $_SESSION['filnamecount'] ; $index++) {
        
                    $sql = "INSERT INTO tbl_gallery_album_".$_SESSION['albumtitlepath']."(path)"." VALUES('".$_SESSION['path'][$index]."')";
                    //die($sql);
                    mysqli_query($connection , $sql);
                }
               $sql = "CREATE TABLE IF NOT EXISTS tbl_gallery_album_title". "(".
                        "id INT NOT NULL AUTO_INCREMENT, ".
                        "title VARCHAR(100) NOT NULL,".
                        "PRIMARY KEY(id)".
                ")";
                mysqli_query($connection , $sql);
                $sql = "INSERT INTO tbl_gallery_album_title (title)"." VALUES('".$_SESSION['albumtitlepath']."')";
                mysqli_query($connection , $sql);
                mysqli_close($connection);
                $_SESSION['albumsuccess'] = "<span class=\"center-align green darken-3\"><strong class=\"white-text \">".
                "Album " .$title." Successfully Added!"."</strong></span>\n";
                header("location:galleryalbumadd.php");die();
            } elseif ((!isset($titleSuccess) and !isset($descriptionSuccess) and !isset($_SESSION['uploadstatus'])) || $_SESSION['uploadstatus'] === 0) {
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