<?php require "connection.php"; ?>
<?php
    session_start();
     //$_SESSION['idchange'] = $rows['ID'];
    // $_SESSION['usernamechange'] = $rows['username'];
    // $_SESSION['passwordchange'] = $rows['password'];
    if (!isset($_SESSION['username']) && !isset($_POST['password'])) {
        mysqli_close($connection);
        header("location:login.php");
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
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

       //
       //editdescriptionconfirm
       //editconfirmsubmit

        if (isset($_POST['editconfirmsubmit'])) {

            if (isset($_POST['historyimgname'])) {
                if (is_numeric($_POST['historyimgname'])) {
                    mysqli_close($connection);
                    $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Don't use a number for a name!</strong></span>\n";
                    header("location:edithistory.php");
                    die;
                } elseif (!is_numeric($_POST['historyimgname'])) {
                    if (strlen($_POST['historyimgname']) > 0 && is_numeric($_POST['historyimgname'][0])) {
                        mysqli_close($connection);
                        $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:edithistory.php");
                        die;
                    } elseif (strlen($_POST['historyimgname']) > 0 && !is_numeric($_POST['historyimgname'][0])) {
                        $name = sanitizedData($_POST['historyimgname']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $name);
                        
                        if (strlen($sqlPreventInjection) <= 50 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['historyimgnamesuccess'] = $sqlPreventInjection;
                                    
                        } elseif (strlen($sqlPreventInjection) > 50 && strlen($sqlPreventInjection) == 0 ) {
                            mysqli_close($connection);
                            $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 100!</strong></span>\n";
                            header("location:edithistory.php");
                            die;
                        }
                    }
                }
               
            } elseif (!isset($_POST['editnameconfirm'])) {
                $sql = "SELECT name FROM tbl_about_history";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                        $_SESSION['historyeditconfirm'] = $rows['description'];
                    }
                    
                }
            }

            
            if ($_FILES['historyimg']['error'] === 0) {

        
                $filePath = UploadFile($_FILES['historyimg']);
                
            } else if ($_FILES['historyimg']['error'] > 0) {
               
                mysqli_close($connection);
                $_SESSION['historyerror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Upload Image!</strong>\n".
                                            "</strong>\n";
                header("location:historyimages.php");die();
            }

            if (isset($_SESSION['descriptioneditconfirm']) && isset($_SESSION['historyeditconfirm'])) {
                $descriptiontrue = $_SESSION['descriptioneditconfirm'];
                $nameTrue = $_SESSION['historyeditconfirm'];
                $oldid = $_SESSION['oldeditid'];
        
                $sql = "UPDATE tbl_about_history SET name = '$nameTrue' , description = '$descriptiontrue' WHERE id  = ".$oldid;
                mysqli_query($connection , $sql);
                mysqli_close($connection);
                $_SESSION['historysuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">History Successfully Updated!</strong></span>\n";
                        header("location:history.php");
                        die;
            }

        }
    } else {
        mysqli_close($connection);
        header("location:history.php");
        die();
    }
?>