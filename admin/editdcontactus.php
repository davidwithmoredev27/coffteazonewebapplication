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
    $sql = "SELECT * FROM tbl_contact_details";
    $result = mysqli_query($connection , $sql);

    while ($rows = mysqli_fetch_assoc($result)) {
        $_SESSION['contactoldid'] = $rows['id'];
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
        if (isset($_POST['contactupdate'])) {
        
            if (isset($_POST['address'])) {
            
                if (is_numeric($_POST['address'])) {
                     mysqli_close($connection);
                    $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Don't use a number!</strong></span>\n";
                    header("location:contactus.php");
                    
                    die;
                } elseif(!is_numeric($_POST['address'])) {
                     $name = sanitizedData($_POST['address']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $name);
                        
                        if (strlen($sqlPreventInjection) <= 100 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['addressSuccess']  = $sqlPreventInjection;
                            
                        } elseif (strlen($sqlPreventInjection) > 100 && strlen($sqlPreventInjection) == 0 ) {
                            mysqli_close($connection);
                            $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 100!</strong></span>\n";
                            header("location:contactus.php");
                            die;
                        }
                    
                }
              
            } elseif(isset($_POST['address'])) {
                $sql = "SELECT address FROM tbl_contact_details";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                
                        $_SESSION['addressSuccess'] = $rows['address'];
                    }
                }
                
            }
            if (isset($_POST['telephone'])) {
                if (is_numeric($_POST['telephone'])) {
                    mysqli_close($connection);
                    $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">use Number!</strong></span>\n";
                    header("location:contactus.php");
                    die;
                    
                } elseif(!is_numeric($_POST['telephone'])) {
                    
                    $name = sanitizedData($_POST['telephone']);
                    $sqlPreventInjection = mysqli_escape_string($connection , $name);
                    
                    if (strlen($sqlPreventInjection) <= 15 &&  strlen($sqlPreventInjection) !== 0) {
                        $_SESSION['telephoneSuccess'] = $sqlPreventInjection;
                    } elseif (strlen($sqlPreventInjection) > 15 && strlen($sqlPreventInjection) == 0 ) {
                        mysqli_close($connection);
                        $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 15!</strong></span>\n";
                        header("location:contactus.php");
                        die;
                    }
                }
              
            } elseif(isset($_POST['telephone'])) {
                $sql = "SELECT telephone FROM tbl_contact_details";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                        $_SESSION['telephoneSuccess'] = $rows['telephone'];
                    }
                }
            }
            if (isset($_POST['mobileone'])) {
                if (is_numeric($_POST['mobileone'])) {

                    $name = sanitizedData($_POST['mobileone']);
                    $sqlPreventInjection = mysqli_escape_string($connection , $name);
                    
                    if (strlen($sqlPreventInjection) <= 15 &&  strlen($sqlPreventInjection) !== 0) {
                        $_SESSION['phoneoneSuccess'] = $sqlPreventInjection;
                        
                    } elseif (strlen($sqlPreventInjection) > 15 && strlen($sqlPreventInjection) == 0 ) {
                        mysqli_close($connection);
                        $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 15!</strong></span>\n";
                        header("location:contactus.php");
                        die;
                    }
        

                } elseif(!is_numeric($_POST['mobileone'])) {
                    mysqli_close($connection);
                    $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">use Number!</strong></span>\n";
                    header("location:contactus.php");
                    die;
                }
              
            } elseif(isset($_POST['mobileone'])) {
                $sql = "SELECT mobileone FROM tbl_contact_details";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                        $_SESSION['phoneoneSuccess'] = $rows['mobileone'];
                    }
                }
                
            }


            if (isset($_POST['mobiletwo'])) {
                if (is_numeric($_POST['mobiletwo'])) {

                    $name = sanitizedData($_POST['mobiletwo']);
                    $sqlPreventInjection = mysqli_escape_string($connection , $name);
                    
                    if (strlen($sqlPreventInjection) <= 15 &&  strlen($sqlPreventInjection) !== 0) {
                        $_SESSION['phonetwoSuccess'] = $sqlPreventInjection;
            
                    } elseif (strlen($sqlPreventInjection) > 15 && strlen($sqlPreventInjection) == 0 ) {
                        mysqli_close($connection);
                        $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 15!</strong></span>\n";
                        header("location:contactus.php");
                        die;
                    }
        

                } elseif(!is_numeric($_POST['mobiletwo'])) {
                    mysqli_close($connection);
                    $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">use Number!</strong></span>\n";
                    header("location:contactus.php");
                    die;
                }
              
            } elseif(isset($_POST['mobileone']) && strlen($_POST['mobileone'])  == 0) {
                $sql = "SELECT mobiletwo FROM tbl_contact_details";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                        $_SESSION['phonetwoSuccess'] = $rows['mobileone'];
                    }
                }
                
            }
             if (isset($_POST['email'])) {
                if (is_numeric($_POST['email'])) {
                    mysqli_close($connection);
                    $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Don't use a number!</strong></span>\n";
                    header("location:contactus.php");
                    die;
                } elseif(!is_numeric($_POST['email'])) {
                    if(strlen($_POST['email']) > 0 && is_numeric($_POST['email'][0])) {
                        mysqli_close($connection);
                        $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:contactus.php");
                        die;
                    } elseif (strlen($_POST['email']) > 0 && !is_numeric($_POST['email'][0])) {
                        $name = sanitizedData($_POST['email']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $name);
                        
                        if (strlen($sqlPreventInjection) <= 100 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['emailSuccess'] = $sqlPreventInjection;
                
                        } elseif (strlen($sqlPreventInjection) > 100 && strlen($sqlPreventInjection) == 0 ) {
                            mysqli_close($connection);
                            $_SESSION['contactuserror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 100!</strong></span>\n";
                            header("location:contactus.php");
                            die;
                        }
                    } 
                }
              
            } elseif(isset($_POST['email']) && strlen($_POST['email'])  == 0) {
                $sql = "SELECT email FROM tbl_contact_details";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                        $_SESSION['emailSuccess'] = $rows['email'];
                    }
                }
                
            }
            if (isset($_SESSION['addressSuccess']) && isset($_SESSION['emailSuccess']) && isset($_SESSION['phoneoneSuccess'])
                && isset($_SESSION['phonetwoSuccess']) && isset($_SESSION['telephoneSuccess'])) {
                $addressTrue = $_SESSION['addressSuccess'];
                $emailTrue = $_SESSION['emailSuccess'];
                $telephoneTrue = $_SESSION['telephoneSuccess'];
                $phoneoneTrue = $_SESSION['phoneoneSuccess'];
                $phonetwoTrue = $_SESSION['phonetwoSuccess'];
                
    
                $oldid = $_SESSION['contactoldid'];
        
                $sql = "UPDATE tbl_contact_details SET  address = '$addressTrue' , telephone = '$telephoneTrue' , mobileone = ".$phoneoneTrue." , mobiletwo = ".$phonetwoTrue. ", email = '$emailTrue' WHERE id  = ".$oldid;
               
                mysqli_query($connection , $sql);
                mysqli_close($connection);
                $_SESSION['contactussuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">Contact details Successfully Updated!</strong></span>\n";
                        header("location:contactus.php");
                        die;
            }

        }
    } else {
        mysqli_close($connection);
        header("location:contactus.php");
        die();
    }
?>