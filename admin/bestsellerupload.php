<?php require "connection.php";?>
<?php
    // bestsellerdescription
    // bestsellertitle
    // bestsellerimg
    // bestsellerprice
    // submitbestseller
    session_start();
    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    $description = false;
    $title = false;
    $price = false;
    $preventSQLInjection = false;
    $DescriptionSuccess =  false;
    $titleSuccess = false;
    $priceSuccess = false;
    $uploadStatus = false;
    $filePath = false;
    $dirPath = false;
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
                 $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:bestselleredit.php");
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a mininum of 1MB of JPG image!</strong>\n".
                                            "</strong>\n";
                header("location:bestselleredit.php");
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../img/home/bestsellerimages/" .$filename )) {
                    unlink("../img/home/bestsellerimages/" .$filename);
                    move_uploaded_file($filetmpname, "../img/home/bestsellerimages/" .$filename);
                    $_SESSION['dirpath'] ="img/home/bestsellerimages/" .$filename;
                    $uploadStatus = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../img/home/bestsellerimages/" .$filename);
                    $_SESSION['dirpath'] ="img/home/bestsellerimages/" .$filename;
                    $imgPath = $filename;
                    $uploadStatus = true;
                    return $filename;
                }
            } else {
                mysqli_close($connection);
                $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid File Type!</strong>\n".
                                            "</strong>\n";
                header("location:bestselleredit.php");
                die();
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['submitbestseller'])) {

            if (isset($_POST['bestsellertitle'])) {
                $title = sanitizedData($_POST['bestsellertitle']);
                $preventSQLInjection = mysqli_escape_string($connection , $title);
                //die($preventSQLInjection);
                if (strlen($preventSQLInjection) < 20 || strlen($preventSQLInjection) == 20) {
                    if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                        $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                        header("location:bestseller.php");
                        die();
                    } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                         $titleSuccess = $preventSQLInjection;
                    }
                    $titleSuccess = $preventSQLInjection;
                } else if (strlen($preventSQLInjection) > 20) {
                    mysqli_close($connection);
                    $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You cannot use more than 20 characters!</strong>\n".
                                            "</strong>\n";
                    header("location:bestseller.php");
                    die();
                } 
            } else if (!isset($_POST['bestsellertitle']) || strlen($_POST['bestsellertitle']) == 0) {
                 mysqli_close($connection);
                $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Please Give a Title for this bestseller</strong>\n".
                                            "</strong>\n";
                header("location:bestseller.php");die();
            }

            if (isset($_POST['bestsellerdescription'])) {
                $description = sanitizedData($_POST['bestsellerdescription']);
                $preventSQLInjection = mysqli_escape_string($connection , $description);

                if (strlen($preventSQLInjection) < 50 || strlen($preventSQLInjection) == 50) {
                    if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                        $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                         header("location:bestseller.php");
                        die();
                    } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$preventSQLInjection)) {
                        $DescriptionSuccess = $preventSQLInjection;
                    }
                    
                } else if (strlen($preventSQLInjection) > 50) {
                    mysqli_close($connection);
                    $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You cannot use more than 50 characters!</strong>\n".
                                            "</strong>\n";
                    header("location:bestseller.php");
                    die();
                } 
            } else if (!isset($_POST['bestsellerdecriptionconfirm']) || strlen($_POST['bestsellerdecriptionconfirm']) == 0) {
                mysqli_close($connection);
                    $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Provide a caption!</strong>\n".
                                            "</strong>\n";
                    header("location:bestseller.php");
                    die();
            }

            if (isset($_POST['bestsellerprice'])) {

                if (is_numeric($_POST['bestsellerprice'])) {

                    $price = sanitizedData($_POST['bestsellerprice']);
                    $preventSQLInjection = mysqli_real_escape_string($connection , $price);
                    
                    if ($preventSQLInjection < 0) {
                        mysqli_close($connection);
                        $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Negative number is not allowed!</strong>\n".
                                                "</strong>\n";
                        header("location:bestseller.php");die();
                    }
                    $priceSuccess = $preventSQLInjection;
    


                } else if (!is_numeric($_POST['bestsellerprice'])) {
                    mysqli_close($connection);
                    $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Please use a number for the price!</strong>\n".
                                            "</strong>\n";
                    header("location:bestseller.php");die();
                }
                
            } else if (!isset($_POST['bestsellerprice']) || strlen($_POST['bestsellerprice']) == 0) {
                 mysqli_close($connection);
                    $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">please give a price</strong>\n".
                                            "</strong>\n";
                    header("location:bestseller.php");die();
            }


            if (isset($_FILES['bestsellerimg'])) {
        
                $filePath = UploadFile($_FILES['bestsellerimg']);
            } else if (!isset($_FILES['bestsellerimg'])) {
                mysqli_close($connection);
                $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Image!</strong>\n".
                                            "</strong>\n";
                header("location:bestseller.php");die();
            }
        }
        if (isset($filePath) && isset($titleSuccess) &&  isset($DescriptionSuccess) && isset($priceSuccess)) {
            

            
            $sql ="SELECT * FROM tbl_bestseller";
            $result = mysqli_query($connection , $sql);
            if (mysqli_num_rows($result) === 6) {
                $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Bestseller reach 6!</strong>\n".
                                            "</strong>\n";
                mysqli_close($connection);
                header("location:bestseller.php");
                die();
            }
            
            $dirPath = $_SESSION['dirpath'];
            $_SESSION['dirpath'] = null;
            $sql = "INSERT INTO tbl_bestseller(title, image , caption , price ,  path) 
                    VALUES( '$titleSuccess','$filePath','$DescriptionSuccess' , $priceSuccess ,  '$dirPath')";
           // die($sql);
            mysqli_query($connection ,$sql);
            mysqli_close($connection);
            $_SESSION['bestselleruploadsuccess'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">BestSeller Succefully updated!</strong>\n".
                                            "</strong>\n";
            header("location:bestseller.php");
            die();
        } else if(!isset($uploadStatus) && !isset($DescriptionSuccess) && !isset($titleSuccess) && !isset($priceSuccess)) {
             $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">There's an error!</strong>\n".
                                            "</strong>\n";
            header("location:bestseller.php");
            die();
        } else {
            mysli_close($connection);
            $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Failed!</strong>\n".
                                            "</strong>\n";
            die();
        }
    } else {
        header("location:bestseller.php");

    }
?>