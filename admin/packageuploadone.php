<?php require "connection.php";?>
<?php 
    session_start();
    
    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }

    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
    $_SESSION['confirmuploadstatus'] = null;
     function UploadFile($img) {
         $allowed = array('jpg' => 'image/jpeg' ,  'jpeg' => 'image/jpeg' , 'JPG' => 'image/jpg' , 'jp' => 'image/jpeg');
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
                 $_SESSION['error'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:martinasservices.php");
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['error'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use mininum of 1MB!</strong>\n".
                                            "</strong>\n";
                
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../img/services/overlayimages/packageone/".$filename)) {
                    unlink("../img/services/overlayimages/packageone/".$filename);
                    move_uploaded_file($filetmpname, "../img/services/overlayimages/packageone/".$filename);
                    $_SESSION['confirmuploadstatus'] = true;
                    $_SESSION['dirpathconfirm'] = "img/services/overlayimages/packageone/".$filename;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../img/services/overlayimages/packageone/".$filename);
                    $imgPath = $filename;
                    $_SESSION['dirpathconfirm'] = "img/services/overlayimages/packageone/".$filename;
                    $_SESSION['confirmuploadstatus'] = true;
                    return $filename;
                }
            } else {
                mysqli_close($connection);
                $_SESSION['error'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid file type!</strong>\n".
                                            "</strong>\n";
                header("location:martinasservices.php");
                die();
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        if (isset($_POST['btnservicesbtn'])) {
            if (isset($_FILES['roomimg'])) {
                $sql = "SELECT * FROM tbl_services_martinas_package1";
                $result = mysqli_query($connection , $sql);
                if (mysqli_num_rows($result) == 5) {
                    mysqli_close($connection);
                    $_SESSION['error'] = "<span><strong class=\"white-text\">The maximum image for package one is 5!</strong></span>\n";
                    header("location:martinasservices.php");
                }
                $name = UploadFile($_FILES['roomimg']);
            } elseif (!isset($_FILES['roomimg']) && $_FILES['roomimg']['error'] > 0)  {
                 mysqli_close($connection);
                $_SESSION['error'] = "<span><strong class=\"white-text\">Upload image!</strong></span>\n";
                header("location:martinasservices.php");
            }

            if (isset($_SESSION['confirmuploadstatus'])) {
                $path = $_SESSION['dirpathconfirm'];
                $sql= "INSERT INTO tbl_services_martinas_package1(path) VALUES('$path')";
                mysqli_query($connection , $sql);
                 mysqli_close($connection);
                $_SESSION['success'] = "<span><strong class=\"white-text\">Image successfully added!</strong></span>\n";
                header("location:martinasservices.php");
            }
        } elseif (!isset($_POST['btnservicesbtn'])) {
            mysqli_close($connection);
            $_SESSION['error'] = "<span><strong class=\"white-text\">Upload image!</strong></span>\n";
            header("location:martinasservices.php");
        }
    } else {
        header("location:martinasservices.php");
        die();
    }

?>