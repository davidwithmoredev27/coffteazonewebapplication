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
    $dirPath = null;
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
                    $_SESSION['dirpath'] ="img/home/homepageslider/" .$filename;
                    $uploadStatus = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../img/home/homepageslider/" .$filename);
                    $_SESSION['dirpath'] ="img/home/homepageslider/" .$filename;
                    $imgPath = $filename;
                    $uploadStatus = true;
                    return $filename;
                }
            } else {
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

        if (isset($_POST['submitslider'])) {

            if (isset($_POST['sliderdescription'])) {
                $description = sanitizedData($_POST['sliderdescription']);
                $preventSQLInjection = mysqli_escape_string($connection , $description);

                if (strlen($preventSQLInjection) < 50 || strlen($preventSQLInjection) == 50) {
                    
                    $DescriptionSuccess = $preventSQLInjection;
                    
                } elseif (strlen($preventSQLInjection) > 50) {
                    mysqli_close($connection);
                    $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">You cannot use more than 50 characters!</strong>\n".
                                            "</strong>\n";
                    header("location:slideredit.php");
                    die();
                } 
            } elseif (!isset($_POST['sliderdescription']) || strlen($_POST['sliderdescription']) == 0) {
                $DescriptionSuccess = $_POST['sliderdescription'];
            }

            if (isset($_FILES['sliderimg'])) {
                //print_r($_FILES['sliderimg']);
        
                $filePath = UploadFile($_FILES['sliderimg']);
            } elseif (!isset($_FILES['sliderimg'])) {
                mysqli_close($connection);
                $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload image!</strong>\n".
                                            "</strong>\n";
                header("location:slideredit.php");die();
            }
        }
   
        if ((isset($uploadStatus) && isset($DescriptionSuccess)) || !isset($DescriptionSuccess)) {
            
        
            $dirPath = $_SESSION['dirpath'];
            $_SESSION['dirpath'] = null;
            $sql = "INSERT INTO tbl_slider(img , description , path) 
                    VALUES('$filePath','$DescriptionSuccess' , '$dirPath')";
            mysqli_query($connection ,$sql);
            mysqli_close($connection);
            $_SESSION['uploadsuccess'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Slider Successfully updated!</strong>\n".
                                            "</strong>\n";
            header("location:slideredit.php");
            die();
        } elseif ((!isset($uploadStatus) && isset($DescriptionSuccess)) || !isset($DescriptionSuccess)) {
             $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">There's an error!</strong>\n".
                                            "</strong>\n";
            header("location:slideredit.php");
            die();
        } else {
            mysli_close($connection);
            $_SESSION['slideruploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Failed!</strong>\n".
                                            "</strong>\n";
            die();
        }
    } else {
        header("location:slideredit.php");

    }
?>