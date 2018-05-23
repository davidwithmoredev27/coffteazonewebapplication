<?php require "connection.php";?>
<?php 
    session_start();
     $_SESSION['uploadstatus'] = null;

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    

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
                 $_SESSION['historyerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:historyimages.php");
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['historyerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a mininum of 1MB of JPG image!</strong>\n".
                                            "</strong>\n";
                header("location:historyimages.php");
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../img/aboutus/" .$filename )) {
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
                $_SESSION['historyerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid File Type!</strong>\n".
                                            "</strong>\n";
                    header("location:historyimages.php");
                die();
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        
        if (isset($_POST['historyimgsubmit'])) {
            if (isset($_POST['historyimgname'])) {
                
                 if (is_numeric($_POST['historyimgname'])) {
                    
                    $_SESSION['historyerror'] = "<span class=\"center-align\"><strong class=\"white-text\">image Name is invalid!</strong></span>\n";
                 } elseif (!is_numeric($_POST['historyimgname'])) {
                      
                     #check for first number
                    if(strlen($_POST['historyimgname']) > 0 && is_numeric($_POST['historyimgname'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['aboutushistoryerrorerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:historyimages.php");
                        die;
                    } elseif (strlen($_POST['historyimgname']) > 0 && !is_numeric($_POST['historyimgname'][0])) {
                        $title = sanitizedData($_POST['historyimgname']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $title);
                        
                        if (strlen($sqlPreventInjection) <= 50 &&  strlen($sqlPreventInjection) !== 0) {
                            if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['historyerror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                                die();
                            } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                 $_SESSION['historyimgnameSuccess'] = $sqlPreventInjection; 
                            }
                            
                            
                        } elseif (strlen($sqlPreventInjection) > 50 ) {
                            mysqli_close($connection);
                            $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 50!</strong></span>\n";
                            header("location:historyimages.php");
                            die;
                        }
                    }
                 }
            } else {
                mysqli_close($connection);
                $_SESSION['historyerror']= "<span>".
                                    "<strong class=\"center-align white-text\">"."Fill out history names!"."</strong></span>\n";
                header("location:historyimages.php");
                die();
            }

            if ($_FILES['historyimg']['error'] === 0) {
                $sql = "SELECT * FROM tbl_about_image";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) === 3) {
                    $_SESSION['historyerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You've riched a maximum of 3 images!</strong>\n".
                                            "</strong>\n";
                header("location:historyimages.php");die();
                }
        
                $filePath = UploadFile($_FILES['historyimg']);
                
            } else if ($_FILES['historyimg']['error'] > 0) {
               
                mysqli_close($connection);
                $_SESSION['historyerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Image!</strong>\n".
                                            "</strong>\n";
                header("location:historyimages.php");die();
            }

             if (isset($_SESSION['historyimgnameSuccess']) && isset($_SESSION['uploadstatus'])){
                
                $pathPass  = $_SESSION['dirpath'];
                $historyimgName = $_SESSION['historyimgnameSuccess'];
    
                mysqli_query($connection , $sql);
                $sql = "INSERT INTO tbl_about_image(name , path)".
                        "VALUES('$historyimgName', '$pathPass')";
                mysqli_query($connection , $sql);
                
                $_SESSION['historysuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">".$pagename." successfully Added</strong></span>\n";
                header("location:historyimages.php");die;
            }
        }

    } else {
        mysqli_close($connection);
        header("location:historyimages.php");
    }
?>