<?php require "connection.php"; ?>
<?php 
    session_start();


    $_SESSION['promosdescriptionSuccess'] = null;
    $_SESSION['promostitleSuccess'] = null;
    $_SESSION['uploadstatus'] = null;

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    $_SESION['uploadstatus'] = null;
    function sanitizedData($data) {
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
                $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a mininum of 1MB of JPG image!</strong>\n".
                                            "</strong>\n";
                header("location:promos.php");
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../img/home/featureandnewimages" .$filename )) {
                    unlink("../img/home/featureandnewimages/" .$filename);
                    move_uploaded_file($filetmpname, "../img/home/featuredandnewimages/" .$filename);
                    $_SESSION['dirpath'] = "img/home/featureandnewimages/" .$filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../img/home/featuredandnewimages/" .$filename);
                    $_SESSION['dirpath'] ="img/home/featuredandnewimages/" .$filename;
                    $imgPath = $filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                }
            } else {
                mysqli_close($connection);
                $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid File Type!</strong>\n".
                                            "</strong>\n";
                    header("location:promos.php");
                die();
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['promosaddsubmit'])) {

            #promos title validation and sanitation
            if (isset($_POST['promostitle'])) {
                
                 if (is_numeric($_POST['promostitle'])) {
                    
                    $_SESSION['promoserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Title is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['promostitle'])) {
                      
                     #check for first number
                    if(strlen($_POST['promostitle']) > 0 && is_numeric($_POST['promostitle'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:newproduct.php");
                        die;
                    } elseif (strlen($_POST['promostitle']) > 0 && !is_numeric($_POST['promostitle'][0])) {
                        $title = sanitizedData($_POST['promostitle']);
                        $sqlPreventInjection = mysqli_real_escape_string($connection , $title);
                        
                        if (strlen($sqlPreventInjection) <= 50 &&  strlen($sqlPreventInjection) !== 0) {
                            if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['promoserror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                                header("location:promos.php");
                                die;
                            } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['promostitleSuccess'] = $sqlPreventInjection;
                            }
                            $_SESSION['promostitleSuccess'] = $sqlPreventInjection; 
                            
                        } elseif (strlen($sqlPreventInjection) > 50 ) {
                            mysqli_close($connection);
                            $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 50!</strong></span>\n";
                            header("location:promos.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['promoserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out pagename!"."</strong></span>\n";
                header("location:promos.php");
                die();
            }

          
            if (isset($_POST['promosdescription'])) {
                 if (is_numeric($_POST['promosdescription'])) {
                    $_SESSION['promoserror'] = "<span class=\"center-align\"><strong class=\"white-text\">Description is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['promosdescription'])) {
                     #check for first number
                    if(strlen($_POST['promosdescription']) > 0 && is_numeric($_POST['promosdescription'][0])) {
                        mysqli_close($connection);
                        $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:promos.php");
                        die;
                    } elseif (strlen($_POST['promosdescription']) > 0 && !is_numeric($_POST['promosdescription'][0])) {
                        $description = sanitizedData($_POST['promosdescription']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $description);
                        
                        if (strlen($sqlPreventInjection) <= 500 &&  strlen($sqlPreventInjection) !== 0) {
                            if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['promoserror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                                header("location:promos.php");
                                die;
                            } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['promosdescriptionSuccess'] = $sqlPreventInjection;
                            }
                            
                                 
                        } elseif (strlen($sqlPreventInjection) > 500 || strlen($sqlPreventInjection) == 0 ) {
                            mysqli_close($connection);
                            $_SESSION['promoserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 100!</strong></span>\n";
                            header("location:promos.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['promoserror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out description!"."</strong></span>\n";
                header("location:promos.php");
                die();
            }
           

            if (isset($_FILES['promosimg'])) {
                
                $filePath = UploadFile($_FILES['promosimg']);
                
            } else if (!isset($_FILES['promosimg'])) {
               
                mysqli_close($connection);
                $_SESSION['promoserror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Image!</strong>\n".
                                            "</strong>\n";
                header("location:promos.php");die();
            }
            if (isset($_SESSION['promosdescriptionSuccess'])&& 
                isset($_SESSION['promostitleSuccess']) && isset($_SESSION['uploadstatus'])) {
                $titlepass = $_SESSION['promostitleSuccess'];
                $descriptionPass = $_SESSION['promosdescriptionSuccess'];
    
                $pathPass  = $_SESSION['dirpath'];
                //die($pathPass);
                $sql = "CREATE TABLE IF NOT EXISTS tbl_new_promos (".
                    "id INT NOT NULL AUTO_INCREMENT,".
                    "title VARCHAR(50) NOT NULL,".
                    "description VARCHAR(500) NOT NULL,".
                    "path VARCHAR(1000) NOT NULL,".
                    "PRIMARY KEY(id)".
                ")";
                //die($sql);
                mysqli_query($connection , $sql);
                $sql = "INSERT INTO tbl_promos (title , description,  path) ".
                        "VALUES('$titlepass' , '$descriptionPass' , '$pathPass')";
                        // die($sql);
                //die($sql);
                mysqli_query($connection , $sql);

                
                mysqli_close($connection);
                $_SESSION['promossuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">Data successfully added</strong></span>\n";
                header("location:promos.php");die;
            }
    
        }
    } else {
        header("location:promos.php");
        die();
    } 

?>