<?php require "connection.php";?>
<?php 
    session_start();
     $_SESSION['uploadstatus'] = null;

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    $_SESION['uploadstatus'] = null;



    function sanitizedData ($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }


     function UploadFile($img) {
         $allowed = array('jpg' => 'image/jpeg' ,  'jpeg' => 'image/jpeg' , 'JPG' => 'image/jpg');
        //print_r($img);
        if(isset($img)) {

            $filename = $img['name'];
            $filetype = $img['type'];

            $size = $img['size'];
            $filetmpname = $img["tmp_name"];
            $ext = pathinfo($filename , PATHINFO_EXTENSION);
            $maxSize = 1024 * 1024;
            if (!array_key_exists($ext , $allowed)) {
                mysqli_close($connection);
                 $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:promos.php");
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['aboutuserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a mininum of 1MB of JPG image!</strong>\n".
                                            "</strong>\n";
                header("location:aboutus.php");
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../img/aboutus" .$filename )) {
                    unlink("../img/aboutus/" .$filename);
                    move_uploaded_file($filetmpname, "../img/aboutus/" .$filename);
                    $_SESSION['dirpath'] = "img/aboutus/" .$filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../img/aboutus/" .$filename);
                    $_SESSION['dirpath'] ="img/aboutus/" .$filename;
                    $imgPath = $filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                }
            } else {
                mysqli_close($connection);
                $_SESSION['aboutuserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid File Type!</strong>\n".
                                            "</strong>\n";
                    header("location:aboutus.php");
                die();
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        
        if (isset($_POST['aboutussubmit'])) {
            if (isset($_POST['history'])) {
                
                 if (is_numeric($_POST['history'])) {
                    
                    $_SESSION['aboutuserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Title is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['history'])) {
                      
                     #check for first number
                    if(strlen($_POST['history']) > 0 && is_numeric($_POST['history'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['aboutuserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:aboutus.php");
                        die;
                    } elseif (strlen($_POST['history']) > 0 && !is_numeric($_POST['history'][0])) {
                        $title = sanitizedData($_POST['history']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $title);
                        
                        if (strlen($sqlPreventInjection) <= 3000 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['historySuccess'] = $sqlPreventInjection; 
                            
                        } elseif (strlen($sqlPreventInjection) > 3000 ) {
                            mysqli_close($connection);
                            $_SESSION['aboutuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 3000!</strong></span>\n";
                            header("location:aboutus.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['aboutuserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out history!"."</strong></span>\n";
                header("location:aboutus.php");
                die();
            }

            if (isset($_POST['vision'])) {
                
                 if (is_numeric($_POST['vision'])) {
                    
                    $_SESSION['aboutuserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Vision is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['vision'])) {
                      
                     #check for first number
                    if(strlen($_POST['vision']) > 0 && is_numeric($_POST['vision'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['aboutuserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:aboutus.php");
                        die;
                    } elseif (strlen($_POST['vision']) > 0 && !is_numeric($_POST['vision'][0])) {
                        $title = sanitizedData($_POST['vision']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $title);
                        
                        if (strlen($sqlPreventInjection) <= 3000 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['visionSuccess'] = $sqlPreventInjection; 
                            
                        } elseif (strlen($sqlPreventInjection) > 3000 ) {
                            mysqli_close($connection);
                            $_SESSION['aboutuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 3000!</strong></span>\n";
                            header("location:aboutus.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['aboutuserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out vision!"."</strong></span>\n";
                header("location:aboutus.php");
                die();
            }

            if (isset($_POST['mission'])) {
                
                 if (is_numeric($_POST['mission'])) {
                    
                    $_SESSION['aboutuserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Mission is invalid!</strong></span>\n";
                    header("location:history.php");
                    die;
                 } elseif (!is_numeric($_POST['mission'])) {
                      
                     #check for first number
                    if(strlen($_POST['mission']) > 0 && is_numeric($_POST['mission'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['aboutuserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:history.php");
                        die;
                    } elseif (strlen($_POST['mission']) > 0 && !is_numeric($_POST['mission'][0])) {
                        $title = sanitizedData($_POST['mission']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $title);
                        
                        if (strlen($sqlPreventInjection) <= 3000 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['missionSuccess'] = $sqlPreventInjection; 
                            
                        } elseif (strlen($sqlPreventInjection) > 3000 ) {
                            mysqli_close($connection);
                            $_SESSION['aboutuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 3000!</strong></span>\n";
                            header("location:aboutus.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['aboutuserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out history!"."</strong></span>\n";
                header("location:aboutus.php");
                die();
            }

            if (isset($_FILES['aboutusimg'])) {
                
                $filePath = UploadFile($_FILES['aboutusimg']);
                
            } else if (!isset($_FILES['aboutusimg'])) {
               
                mysqli_close($connection);
                $_SESSION['aboutuserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Image!</strong>\n".
                                            "</strong>\n";
                header("location:aboutus.php");die();
            }

             if (isset($_SESSION['historySuccess']) && isset($_SESSION['visionSuccess'])&& 
                isset($_SESSION['missionSuccess']) && isset($_SESSION['uploadstatus'])){
                $historyPass = $_SESSION['historySuccess'];
                $visionPass = $_SESSION['visionSuccess'];
                $missionPass = $_SESSION['missionSuccess'];
                $pathPass  = $_SESSION['dirpath'];
            
                $sql = "CREATE TABLE IF NOT EXISTS tbl_aboutus (".
                    "id INT NOT NULL AUTO_INCREMENT,".
                    "history VARCHAR(3000) NOT NULL,".
                    "vision VARCHAR(3000) NOT NULL,".
                    "mission VARCHAR(3000) NOT NULL,".
                    "path VARCHAR(1000) NOT NULL,".
                    "PRIMARY KEY(id)".
                ")";
                mysqli_query($connection , $sql);
                $sql = "INSERT INTO tbl_aboutus(history , vision, mission , path)".
                        "VALUES('$historyPass' , '$visionPass' , '$missionPass' , '$pathPass')";
                mysqli_query($connection , $sql);


                $_SESSION['aboutussuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">".$pagename." successfully Added</strong></span>\n";
                header("location:promos.php");die;
            }
        }

    } else {
        mysqli_close($connection);
        header("location:aboutus.php");
    }
?>