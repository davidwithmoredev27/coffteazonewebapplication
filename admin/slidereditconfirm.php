<?php require "connection.php";?>
<?php
    
    session_start();
    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    $description = false;
    $preventSQLInjection = false;
    $DescriptionSuccess = false;
    $uploadStatus = false;
    $filePath = false;
    $dirpath = false;
    $_SESSION['uploadStatus'] = null;
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
                 $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:slideredit.php");
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a mininum of 1MB of JPG image!</strong>\n".
                                            "</strong>\n";
                header("location:slideredit.php");
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../img/home/homepageslider/" .$filename )) {
                    unlink("../img/home/homepageslider/" .$filename);
                    move_uploaded_file($filetmpname, "../img/home/homepageslider/" .$filename);
                    $_SESSION['dirpath'] = "img/home/homepageslider/" .$filename;
                     $_SESSION['uploadStatus'] = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../img/home/homepageslider/" .$filename);
                    $_SESSION['dirpath'] = "img/home/homepageslider/" .$filename;
                    $imgPath = $filename;
                    $_SESSION['uploadStatus'] = true;
                    return $filename;
                }
            } else if (!in_array($filetype , $allowed)) {
                mysqli_close($connection);
                $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid File Type!</strong>\n".
                                            "</strong>\n";
                header("location:slideredit.php");
                die();
            }
        }
    }
    

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['slidersubmit'])) {

            if (isset($_POST['slidereditdecription'])) {
                $description = sanitizedData($_POST['slidereditdecription']);
                $preventSQLInjection = mysqli_real_escape_string($connection , $description);

                if (strlen($preventSQLInjection) < 50 || strlen($preventSQLInjection) == 50) {
                    if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                        $_SESSION['slideruploaderror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                        header("location:slideedit.php");die();
                    } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                        $DescriptionSuccess = $preventSQLInjection;
                    }
                    
                    
                } elseif (strlen($preventSQLInjection) > 50) {
                    mysqli_close($connection);
                    $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You cannot use more than 50 characters!</strong>\n".
                                            "</strong>\n";
                    header("location:slideedit.php");
                    die();
                } 
            } elseif (!isset($_POST['slidereditdecription']) || strlen($_POST['slidereditdecription']) == 0) {
                $DescriptionSuccess = $_POST['slidereditdecription'];
            }

            if (isset($_FILES['uploadimageupdate'])) {
                $filePath = UploadFile($_FILES['uploadimageupdate']);
            } elseif (!isset($_FILES['uploadimageupdate'])) {
                mysqli_close($connection);
                $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload image!</strong>\n".
                                            "</strong>\n";
                header("location:slideedit.php");die();
            }
        }
   
        if ((isset($_SESSION['uploadStatus']) && isset($DescriptionSuccess)) || !isset($DescriptionSuccess)) {
            $sql ="SELECT * FROM tbl_slider";
            $result = mysqli_query($connection , $sql);
           
        
            $dirPath = $_SESSION['dirpath'];
            $_SESSION['dirpath'] = null;
        
            $sql = "UPDATE tbl_slider SET img = '$filePath' , description = '$DescriptionSuccess' , path = '$dirPath' WHERE id = " .$_SESSION['sliderconfirm'];
            
            $_SESSION['sliderconfirm'] = null;
            mysqli_query($connection ,$sql);
            mysqli_close($connection);
            $_SESSION['uploadsuccess'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Slider successfully updated!</strong>\n".
                                            "</strong>\n";
            header("location:slideredit.php");
            die();
        } elseif ((!isset($uploadStatus) && isset($DescriptionSuccess)) || !isset($DescriptionSuccess)) {
             $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">There's an error!</strong>\n".
                                            "</strong>\n";
            header("location:slideedit.php");
            die();
        } else {
            mysli_close($connection);
            $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Failed!</strong>\n".
                                            "</strong>\n";
            header("location:slideedit.php");
            die();
        }
    } else {
        header("location:slideedit.php");

    }
?>