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
    

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['bestsellersubmituploadconfirm'])) {

            if (isset($_POST['bestsellertitleconfirm'])) {
                $title = sanitizedData($_POST['bestsellertitleconfirm']);
                $preventSQLInjection = mysqli_escape_string($connection , $title);
                //die($preventSQLInjection);
                if (strlen($preventSQLInjection) < 20 || strlen($preventSQLInjection) == 20) {
                    
                    $titleSuccess = $preventSQLInjection;
                } else if (strlen($preventSQLInjection) > 20) {
                    mysqli_close($connection);
                    $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You cannot use more than 20 characters!</strong>\n".
                                            "</strong>\n";
                    header("location:bestselleredit.php");
                    die();
                } 
            } else if (!isset($_POST['bestsellertitleconfirm']) || strlen($_POST['bestsellertitleconfirm']) == 0) {
                $sql = "SELECT title FROM tbl_bestseller WHERE id =". $_SESSION['bestsellerconfirm'];
                
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        $titleSuccess = $rows['title'];
                    }
                }
                
            }

            if (isset($_POST['bestsellerdecriptionconfirm'])) {
                $description = sanitizedData($_POST['bestsellerdecriptionconfirm']);
                $preventSQLInjection = mysqli_escape_string($connection , $description);

                if (strlen($preventSQLInjection) < 50 || strlen($preventSQLInjection) == 50) {
                    
                    $DescriptionSuccess = $preventSQLInjection;
                    
                } else if (strlen($preventSQLInjection) > 50) {
                    mysqli_close($connection);
                    $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You cannot use more than 50 characters!</strong>\n".
                                            "</strong>\n";
                    header("location:bestseller.php");
                    die();
                } 
            } else if (!isset($_POST['bestsellerdecriptionconfirm']) || strlen($_POST['bestsellerdecriptionconfirm']) == 0) {
                
                $sql = "SELECT caption FROM tbl_bestseller WHERE id =".$_SESSION['bestsellerconfirm'];
                
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        $DescriptionSuccess = $rows['caption'];
                        
                    }
                }

            }
            
            if (isset($_POST['bestsellerpriceconfirm'])) {
                if (is_numeric($_POST['bestsellerpriceconfirm'])) {

                    if ($_POST['bestsellerpriceconfirm'] <= 0) {
                        mysqli_close($connection);
                        $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Use negative number for the price!</strong>\n".
                                                "</strong>\n";
                        header("location:bestselleredit.php");
                        die();
                    }
                    $price = sanitizedData($_POST['bestsellerpriceconfirm']);
                    $preventSQLInjection = mysqli_escape_string($connection , $price);
                
                    $priceSuccess = $preventSQLInjection;
    


                } else if (!is_numeric($_POST['bestsellerpriceconfirm'])) {
        
                    if (!isset($_POST['bestsellerpriceconfirm'])) {
                        $sql = "SELECT price FROM tbl_bestseller WHERE id =".$_SESSION['bestsellerconfirm'];
                        
                        $result = mysqli_query($connection , $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($rows = mysqli_fetch_assoc($result)) {
                                $priceSuccess = $rows['price'];
                            }
                        }
                    } else if (isset($_POST['bestsellerpriceconfirm'])) {
                        mysqli_close($connection);
                        $_SESSION['bestselleruploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Please use a number for the price!</strong>\n".
                                                "</strong>\n";
                        header("location:bestseller.php");die();
                    }
                   
                }
                
            } else if (!isset($_POST['bestsellerpriceconfirm'])) {
                $sql = "SELECT * FROM tbl_bestseller WHERE id = ".$_SESSION['bestsellerconfirm'];
                
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        $priceSuccess = $rows['price'];
                    }
                }
            }
            
            if (isset($_FILES['bestsellerimgconfirm']) && $_FILES['bestsellerimgconfirm']['error'] == 0) {
                $filePath = UploadFile($_FILES['bestsellerimgconfirm']);
            } elseif (isset($_FILES['bestsellerimgconfirm']) && $_FILES['bestsellerimgconfirm']['error'] > 0) {
                 $sql = "SELECT * FROM tbl_bestseller WHERE id = ".$_SESSION['bestsellerconfirm'];
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        $dirPath = $rows['path'];
                        
                    }
                }
            }
        }
       
        if (isset($filePath) && isset($titleSuccess) &&  isset($DescriptionSuccess) && isset($priceSuccess)) {
        
            $dirPath = $_SESSION['dirpath'];
            $_SESSION['dirpath'] = null;
            $sql = "UPDATE tbl_bestseller SET title = '$titleSuccess', image = '$filePath', caption ='$DescriptionSuccess' , price = $priceSuccess , path =  '$dirPath' WHERE id = ".$_SESSION['bestsellerconfirm'];
            // die($sql);
            $_SESSION['bestsellerconfirm'] = null;
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
        die();
    }
?>