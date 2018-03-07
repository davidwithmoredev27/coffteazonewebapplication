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

            if (isset($_POST['editnameconfirm'])) {
                if (is_numeric($_POST['editnameconfirm'])) {
                    mysqli_close($connection);
                    $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Don't use a number for a name!</strong></span>\n";
                    header("location:edithistory.php");
                    die;
                } elseif (!is_numeric($_POST['editnameconfirm'])) {
                    if (strlen($_POST['editnameconfirm']) > 0 && is_numeric($_POST['editnameconfirm'][0])) {
                        mysqli_close($connection);
                        $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:edithistory.php");
                        die;
                    } elseif (strlen($_POST['editnameconfirm']) > 0 && !is_numeric($_POST['editnameconfirm'][0])) {
                        $name = sanitizedData($_POST['editnameconfirm']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $name);
                        
                        if (strlen($sqlPreventInjection) <= 50 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['historyeditconfirm'] = $sqlPreventInjection;
                                    
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
            if (isset($_POST['editdescriptionconfirm'])) {
                if (is_numeric($_POST['editdescriptionconfirm'])) {
                     mysqli_close($connection);
                    $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Don't use a number!</strong></span>\n";
                    header("location:edithistory.php");
                    die;
                } elseif(!is_numeric($_POST['editdescriptionconfirm'])) {
                    if(strlen($_POST['editdescriptionconfirm']) > 0 && is_numeric($_POST['editdescriptionconfirm'][0])) {
                        mysqli_close($connection);
                        $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:edithistory.php");
                        die;
                    } elseif (strlen($_POST['editdescriptionconfirm']) > 0 && !is_numeric($_POST['editdescriptionconfirm'][0])) {
                        $name = sanitizedData($_POST['editdescriptionconfirm']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $name);
                        
                        if (strlen($sqlPreventInjection) <= 255 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['descriptioneditconfirm'] = $sqlPreventInjection;
                                    
                        } elseif (strlen($sqlPreventInjection) > 255 && strlen($sqlPreventInjection) == 0 ) {
                            mysqli_close($connection);
                            $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 255!</strong></span>\n";
                            header("location:edithistory.php");
                            die;
                        }
                    } 
                }
              
            } elseif(isset($_POST['editdescriptionconfirm']) && strlen($_POST['editdescriptionconfirm'])  == 0) {
                $sql = "SELECT description FROM tbl_about_history";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                        $_SESSION['descriptioneditconfirm'] = $rows['description'];
                    }
                }
                
                
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