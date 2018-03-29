<?php
    require "../connection.php";
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
    $_SESSION['titleconfirmsuccess'] = null;
    $_SESSION['priceconfirmsuccess'] = null;
    $_SESSION['descriptionconfirmsuccess'] = null;
    $_SESSION['confirmpreventsqlinjection'] = null;
    $_SESSION['confirmmenudirpath'] = null;
    $_SESSION['confirmfilepath'] = null;
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
                 $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use jpeg image format!</strong>\n".
                                            "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);
                die();
            }
            if ($size > $maxSize) {
                mysqli_close($connection);
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Use mininum of 1MB!</strong>\n".
                                            "</strong>\n";
                header("location:" .  $_SESSION['pagelink']);
                die();
            }
            if (in_array($filetype , $allowed)) {
                
                if (file_exists("../../". $_SESSION['menupath'] .$filename )) {
                    unlink("../../". $_SESSION['menupath'] .$filename );
                    move_uploaded_file($filetmpname, "../../". $_SESSION['menupath'] . $filename);
                    $_SESSION['confirmmenudirpath'] = $_SESSION['menupath'].$filename;
                    $_SESSION['confirmuploadstatus'] = true;
                    return $filename;
                } else {
                    move_uploaded_file($filetmpname, "../../". $_SESSION['menupath'] .$filename);
                    $_SESSION['confirmmenudirpath'] =  $_SESSION['menupath'].$filename;
                    $imgPath = $filename;
                    $_SESSION['confirmuploadstatus'] = true;
                    return $filename;
                }
            } else {
                mysqli_close($connection);
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                            "<strong class=\"white-text\">Invalid file type!</strong>\n".
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
            if (isset($_POST['menusubtmiconfirm'])) {

                if (isset($_POST['menuconfirmtitle'])) {
                    
                    if (strlen($_POST['menuconfirmtitle']) === 0) {
                        
                        $sql = "SELECT title FROM ".$_SESSION['database_name']. " WHERE id =".$_SESSION['menuconfirm'];
                        
                        $result  = mysqli_query($connection , $sql);
                    
                        if (mysqli_num_rows($result) > 0) {
            
                            while($rows = mysqli_fetch_assoc($result)) {
                                $_SESSION['titleconfirmsuccess'] = $rows['title'];
                            }
                        } 
                    }
                    $_SESSION['confirmtitle'] = sanitizedData($_POST['menuconfirmtitle']);
                  
                    $_SESSION['confirmpreventsqlinjection'] = mysqli_escape_string($connection ,  $_SESSION['confirmtitle']);
    
                    if ((strlen($_SESSION['confirmpreventsqlinjection']) < 50 && strlen($_SESSION['confirmpreventsqlinjection']) !== 0 ) || strlen($_SESSION['confirmpreventsqlinjection']) == 50) {
                        
                        $_SESSION['titleconfirmsuccess'] = $_SESSION['confirmpreventsqlinjection'];
                        //die($_SESSION['confirmpreventsqlinjection']);
                       
                    } elseif (strlen($_SESSION['confirmpreventsqlinjection']) > 50) {
                        mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">You cannot use more than 50 characters!</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['editpage']);
                        die();
                    } 
                } elseif (isset($_POST['menuconfirmtitle']) && strlen($_POST['menuconfirmtitle']) == 0) {
                    //die("title" . $_POST['menuconfirmtitle']);
                    $sql = "SELECT title FROM ".$_SESSION['database_name']. " WHERE id =".$_SESSION['menuconfirm'];
                    $result  = mysqli_query($connection , $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            $_SESSION['titleconfirmsuccess'] = $rows['title'];
                        }
                    } 
                }

                if (isset($_POST['menuconfirmcaption'])) {

                    if (strlen($_POST['menuconfirmcaption']) === 0) {
                        
                        $sql = "SELECT caption FROM ".$_SESSION['database_name']. " WHERE id =".$_SESSION['menuconfirm'];
                        
                        $result  = mysqli_query($connection , $sql);
                    
                        if (mysqli_num_rows($result) > 0) {
            
                            while($rows = mysqli_fetch_assoc($result)) {
                                $_SESSION['descriptionconfirmsuccess'] = $rows['caption'];
                            }
                        } 
                    }
                    $_SESSION['confirmdescription'] = sanitizedData($_POST['menuconfirmcaption']);
                    $_SESSION['confirmpreventsqlinjection'] = mysqli_escape_string($connection , $_SESSION['confirmdescription']);
        
                    if ((strlen($_SESSION['confirmpreventsqlinjection']) < 500 && strlen($_SESSION['confirmpreventsqlinjection']) !== 0 )|| strlen($_SESSION['confirmpreventsqlinjection']) == 500) {
                    
                        $_SESSION['descriptionconfirmsuccess'] = $_SESSION['confirmpreventsqlinjection'];
                        //die($_SESSION['descriptionconfirmsuccess']);
                    } elseif (strlen($_SESSION['confirmpreventsqlinjection']) > 500) {
                        mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">You cannot use more than 100 characters!</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['editpage']);
                        die();
                    } 
                } elseif (!isset($_POST['menuconfirmcaption']) || strlen($_POST['menuconfirmcaption']) == 0) {
                    $sql = "SELECT caption FROM ".$_SESSION['database_name']. " WHERE id =".$_SESSION['menuconfirm'];
                    $result  = mysqli_query($connection , $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            $_SESSION['descriptionconfirmsuccess'] = $rows['caption'];
                        }
                    } 
                }

                if (isset($_POST['menupriceconfirm']) && strlen($_POST['menupriceconfirm']) !== 0) {
                    if (is_numeric($_POST['menupriceconfirm'])) {
                        if ($_POST['menupriceconfirm'] > 0) {
                            mysqli_close($connection);
                            $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Negative number is not allowed!</strong>\n".
                                                "</strong>\n";
                            header("location:" .  $_SESSION['editpage']);
                            die();
                        }
                        $_SESSION['confirmprice'] = sanitizedData($_POST['menupriceconfirm']);
                        $_SESSION['confirmpreventsqlinjection'] = mysqli_escape_string($connection , $_SESSION['confirmprice']);
                    
                        $_SESSION['priceconfirmsuccess'] = $_SESSION['confirmpreventsqlinjection'];
                        


                    } elseif (!is_numeric($_POST['menupriceconfirm'])) {
                        mysqli_close($connection);
                        $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Use a number for the price!</strong>\n".
                                                "</strong>\n";
                        header("location:" .  $_SESSION['editpage']);
                        die();
                    }
                    
                } elseif (!isset($_POST['menupriceconfirm']) || strlen($_POST['menupriceconfirm']) == 0) {
                    $sql = "SELECT price FROM ".$_SESSION['database_name']. " WHERE id =".$_SESSION['menuconfirm'];
                    $result  = mysqli_query($connection , $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            $_SESSION['priceconfirmsuccess'] = $rows['price'];
                        }
                    }
                }


                if (isset($_FILES['menuconfirmimg']) && $_FILES['menuconfirmimg']['error'] === 0) {
                
                    $_SESSION['confirmfilepath'] = UploadFile($_FILES['menuconfirmimg']);
                } elseif (isset($_FILES['menuconfirmimg']) && $_FILES['menuconfirmimg']['error'] !== 0) {
                   $sql = "SELECT image, path FROM ".$_SESSION['database_name']. " WHERE id =".$_SESSION['menuconfirm'];
                   $result = mysqli_query($connection, $sql);
                   if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $_SESSION['confirmfilepath'] = $rows['image'];
                            $_SESSION['confirmmenudirpath'] = $rows['path'];
                        }
                   }
                }
            }
            
            //die($_SESSION['titleconfirmsuccess']);
            if (isset($_SESSION['confirmfilepath']) && isset($_SESSION['titleconfirmsuccess']) &&
                  isset($_SESSION['descriptionconfirmsuccess']) && isset($_SESSION['priceconfirmsuccess'])) {
                

                //die("image:" .$_SESSION['confirmfilepath'] ." ". "title:".$_SESSION['titleconfirmsuccess'] . " ". "path:". $_SESSION['confirmmenudirpath'] . " " ."Caption:" . $_SESSION['descriptionconfirmsuccess'] . " ". "price:" . $_SESSION['priceconfirmsuccess'] . " " .$_SESSION['database_name']);
                
                $dirPath = $_SESSION['confirmmenudirpath'];
                $titleSuccess = $_SESSION['titleconfirmsuccess'];
                $filePath = $_SESSION['confirmfilepath'];
                $priceSuccess = $_SESSION['priceconfirmsuccess'];
                $DescriptionSuccess = $_SESSION['descriptionconfirmsuccess'];
                
                unset($_SESSION['confirmmenudirpath']);

                $sql = "UPDATE ".$_SESSION['database_name']. " SET" .
                 " title = '$titleSuccess' , image = '$filePath' , caption = '$DescriptionSuccess' , price = ".$priceSuccess." ,  path = '$dirPath'".
                 " WHERE id = ".$_SESSION['menuconfirm'];


                // $sql = "INSERT INTO ".$_SESSION['database_name']." (title, image , caption , price ,  path) 
                //         VALUES( '$titleSuccess','$filePath','$DescriptionSuccess' , $priceSuccess ,  '$dirPath')";
                
                mysqli_query($connection ,$sql);
               
                mysqli_close($connection);
                $_SESSION['menuuploadsuccess'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">".$_SESSION['pagename']." Successfully updated!</strong>\n".
                                                "</strong>\n";
                
                
                unset($_SESSION['confirmtitle']);
                unset($_SESSION['confirmprice']);
                unset($_SESSION['confirmdescription']);
                unset($_SESSION['titleconfirmsuccess']);
                unset($_SESSION['priceconfirmsuccess']);
                unset($_SESSION['descriptionconfirmsuccess']);
                unset($_SESSION['confirmpreventsqlinjection']);
                unset($_SESSION['confirmmenudirpath']);
                unset($_SESSION['confirmfilepath']);
                unset($_SESSION['confirmuploadstatus']);
                header("location:" .  $_SESSION['editpage']);
                header("location:" .  $_SESSION['editpage']);
                die();
            } elseif (!isset($_SESSION['confirmuploadstatus'])  && !isset($_SESSION['titleconfirmsuccess']) &&
                  !isset($_SESSION['descriptionconfirmsuccess']) && !isset($_SESSION['priceconfirmsuccess'])) {
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">There's an error!</strong>\n".
                                                "</strong>\n";
                unset($_SESSION['confirmtitle']);
                unset($_SESSION['confirmprice']);
                unset($_SESSION['confirmdescription']);
                unset($_SESSION['titleconfirmsuccess']);
                unset($_SESSION['priceconfirmsuccess']);
                unset($_SESSION['descriptionconfirmsuccess']);
                unset($_SESSION['confirmpreventsqlinjection']);
                unset($_SESSION['confirmmenudirpath']);
                unset($_SESSION['confirmfilepath']);
                unset($_SESSION['confirmuploadstatus']);
                header("location:" .  $_SESSION['editpage']);
                
                die();
            } else {
                mysqli_close($connection);
                unset($_SESSION['confirmtitle']);
                unset($_SESSION['confirmprice']);
                unset($_SESSION['confirmdescription']);
                unset($_SESSION['titleconfirmsuccess']);
                unset($_SESSION['priceconfirmsuccess']);
                unset($_SESSION['descriptionconfirmsuccess']);
                unset($_SESSION['confirmpreventsqlinjection']);
                unset($_SESSION['confirmmenudirpath']);
                unset($_SESSION['confirmfilepath']);
                unset($_SESSION['confirmuploadstatus']);
                $_SESSION['menuuploaderror'] = "<span class=\"center-align\">\n".
                                                "<strong class=\"white-text\">Upload Failed!</strong>\n".
                                                "</strong>\n";
                header("location:" .  $_SESSION['editpage']);
                die();
            }
        } else {
                
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $sql = "SELECT * FROM ". $_SESSION['database_name']. " WHERE id = " . $_SESSION['menuconfirm'];
        //die($sql);
        $query = mysqli_query($connection , $sql);
       // sql($query);
        if (mysqli_num_rows($query) > 0) {
             ProcessMenu($_SESSION['menuconfirm'] , $_SESSION['menupath']);
        } elseif (mysqli_num_rows($query) <= 0 ) {
           // die("Hello world");
            mysqli_close($connection);
            header("location:../dashboard.php");
            
        }
    } else {
        mysqli_close($connection);
        header("location:../dashboard.php");
        die;
    }
?>