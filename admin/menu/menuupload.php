<?php
    
    session_start();
    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    /* $preventSQLInjection = false;
    $DescriptionSuccess =  false;
        $titleSuccess = false;
        $priceSuccess = false;
        $description = false;
        $title = false;
        $price = false;
        $uploadStatus = false;
        $filePath = false;
        $dirPath = false; */
    $_SESSION['title'] = null;
    $_SESSION['price'] = null;
    $_SESSION['description'] = null;
    $_SESSION['titlesuccess'] = null;
    $_SESSION['pricesuccess'] = null;
    $_SESSION['descriptionsuccess'] = null;
    $_SESSION['preventsqlinjection'] = null;
    $_SESSION['menudirpath'] = null;
    $_SESSION['filepath'] = null;
    $_SESSION['uploadstatus'] = null;
    
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
                 $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use a mininum of 1MB of JPG image!</strong>\n".
                                            "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../../". $_SESSION['menupath'] .$filename )) {
                    unlink("../../". $_SESSION['menupath'] .$filename );
                    move_uploaded_file($filetmpname, "../../". $_SESSION['menupath'] . $filename);
                    $_SESSION['menudirpath'] = $_SESSION['menupath'].$filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../../". $_SESSION['menupath'] .$filename);
                    $_SESSION['menudirpath'] =  $_SESSION['menupath'].$filename;
                    $imgPath = $filename;
                    $_SESSION['uploadstatus'] = true;
                    return $filename;
                }
            } else {
                mysqli_close($connection);
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid File Type!</strong>\n".
                                            "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);
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
    function ProcessMenu($menu , $path) {
        require "../connection.php";
        if (isset($menu) && isset($path)) {
            if (isset($_POST['menusubmit'])) {

                if (isset($_POST['menutitle'])) {
                    
                    $_SESSION['title'] = sanitizedData($_POST['menutitle']);
                   
                    $_SESSION['preventsqlinjection'] = mysqli_real_escape_string($connection ,  $_SESSION['title']);
    
                    if (strlen($_SESSION['preventsqlinjection']) < 50 || strlen($_SESSION['preventsqlinjection']) == 50) {
                        
                        $_SESSION['titlesuccess'] = $_SESSION['preventsqlinjection'];
                       
                    } else if (strlen($_SESSION['preventsqlinjection']) > 50) {
                        mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">You cannot use more than 20 characters!</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['pagelink']);
                        die();
                    } 
                } else if (!isset($_POST['menutitle']) || strlen($_POST['menutitle']) == 0) {
                    mysqli_close($connection);
                    $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Please Give a Title for this bestseller</strong>\n".
                                                "</strong>\n";
                    header("location:" .  $_SESSION['pagelink']);die();
                }

                if (isset($_POST['menucaption'])) {
                    $_SESSION['description'] = sanitizedData($_POST['menucaption']);
                    $_SESSION['preventsqlinjection'] = mysqli_real_escape_string($connection , $_SESSION['description']);
        
                    if (strlen($_SESSION['preventsqlinjection']) < 500 || strlen($_SESSION['preventsqlinjection']) == 500) {
                    
                        $_SESSION['descriptionsuccess'] = $_SESSION['preventsqlinjection'];
            
                    } else if (strlen($_SESSION['preventsqlinjection']) > 500) {
                        mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">You cannot use more than 100 characters!</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['pagelink']);
                        die();
                    } 
                } else if (!isset($_POST['menucaption']) || strlen($_POST['menucaption']) == 0) {
                    mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Provide caption!</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['pagelink']);
                        die();
                }

                if (isset($_POST['menuprice'])) {

                    if (is_numeric($_POST['menuprice'])) {
                         if ($_POST['menuprice'] < 0) {
                             $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Negative number is not allowed!</strong>\n".
                                                "</strong>\n";
                            header("location:" .  $_SESSION['pagelink']);
                            die();
                        }
                        $_SESSION['price'] = sanitizedData($_POST['menuprice']);
                        $_SESSION['preventsqlinjection'] = mysqli_real_escape_string($connection , $_SESSION['price']);
                    
                        $_SESSION['pricesuccess'] = $_SESSION['preventsqlinjection'];
        
                    

                    } else if (!is_numeric($_POST['menuprice'])) {
                        mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Use digit for price!</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['pagelink']);;die();
                    }
                    
                } else if (!isset($_POST['menuprice']) || strlen($_POST['menuprice']) == 0) {
                    mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Use digit for price</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['pagelink']);;die();
                }


                if (isset($_FILES['menuimg'])) {
            
                    $_SESSION['filepath'] = UploadFile($_FILES['menuimg']);
                } else if (!isset($_FILES['menuimg'])) {
                    mysqli_close($connection);
                    $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Upload Image!</strong>\n".
                                                "</strong>\n";
                    header("location:" .  $_SESSION['pagelink']);;die();
                }
            }
            if (isset($_SESSION['filepath']) && isset($_SESSION['titlesuccess']) &&
                  isset($_SESSION['descriptionsuccess']) && isset($_SESSION['pricesuccess'])) {
                

    
            
                
                $dirPath = $_SESSION['menudirpath'];
                $titleSuccess = $_SESSION['titlesuccess'];
                $filePath = $_SESSION['filepath'];
                $priceSuccess = $_SESSION['pricesuccess'];
                $DescriptionSuccess = $_SESSION['descriptionsuccess'];
                
                $_SESSION['menudirpath'] = null;
                $sql = "INSERT INTO ".$_SESSION['database_name']." (title, image , caption , price ,  path) 
                        VALUES( '$titleSuccess','$filePath','$DescriptionSuccess' , $priceSuccess ,  '$dirPath')";
                //die($sql);
                //die($sql);
                mysqli_query($connection ,$sql);
               
                mysqli_close($connection);
                $_SESSION['menuuploadsuccess'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">".$_SESSION['pagename']." Succefully updated!</strong>\n".
                                                "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);

                
                unset($_SESSION['title']);
                unset($_SESSION['price']);
                unset($_SESSION['description']);
                unset($_SESSION['titlesuccess']);
                unset($_SESSION['pricesuccess']);
                unset($_SESSION['descriptionsuccess']);
                unset($_SESSION['preventsqlinjection']);
                unset($_SESSION['menudirpath']);
                unset($_SESSION['filepath']);
                unset($_SESSION['uploadstatus']);
                die();
            } else if(!isset($_SESSION['uploadstatus'])  && !isset($_SESSION['titlesuccess']) &&
                  !isset($_SESSION['descriptionsuccess']) && !isset($_SESSION['pricesuccess'])) {
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">There's an error!</strong>\n".
                                                "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);
                unset($_SESSION['title']);
                unset($_SESSION['price']);
                unset($_SESSION['description']);
                unset($_SESSION['titlesuccess']);
                unset($_SESSION['pricesuccess']);
                unset($_SESSION['descriptionsuccess']);
                unset($_SESSION['preventsqlinjection']);
                unset($_SESSION['menudirpath']);
                unset($_SESSION['filepath']);
                unset($_SESSION['uploadstatus']);
                die();
            } else {
                mysqli_close($connection);
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Upload Failed!</strong>\n".
                                                "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);
                die();
            }
        } else {
                
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        for ($index = 1 ; $index <= 200 ; $index++ ) {
            if ($index == $_SESSION['menuid']) {
                ProcessMenu($_SESSION['menuid'] , $_SESSION['menupath']);
                $_SESSION['menuid'] = false;
                break;
            }
        }
    } else {
        mysqli_close($connection);
        header("location:../dashboard.php");
        die;
    }
?>