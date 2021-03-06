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

            if (isset($_POST['editdescriptionconfirm'])) {
                if (is_numeric($_POST['editdescriptionconfirm'])) {
                     mysqli_close($connection);
                    $_SESSION['missionerrror']= "<span class=\"center-align\"><strong class=\"white-text\">Don't use a number!</strong></span>\n";
                    header("location:editmission.php");
                    die;
                } elseif(!is_numeric($_POST['editdescriptionconfirm'])) {
                    if(strlen($_POST['editdescriptionconfirm']) > 0 && is_numeric($_POST['editdescriptionconfirm'][0])) {
                        mysqli_close($connection);
                        $_SESSION['missionerrror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:editmission.php");
                        die;
                    } elseif (strlen($_POST['editdescriptionconfirm']) > 0 && !is_numeric($_POST['editdescriptionconfirm'][0])) {
                        $name = sanitizedData($_POST['editdescriptionconfirm']);
                        $sqlPreventInjection = mysqli_real_escape_string($connection , $name);
                        
                        if (strlen($sqlPreventInjection) <= 1000 &&  strlen($sqlPreventInjection) !== 0) {
                            
                            if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['missionerrror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                                header("location:editmission.php");
                                die();
                            } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['descriptioneditconfirm'] = $sqlPreventInjection;
                            }
                                
                        } elseif (strlen($sqlPreventInjection) > 1000 && strlen($sqlPreventInjection) == 0 ) {
                            mysqli_close($connection);
                            $_SESSION['missionerrror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 255!</strong></span>\n";
                            header("location:editmission.php");
                            die;
                        }
                    } 
                }
              
            } elseif(isset($_POST['editdescriptionconfirm']) && strlen($_POST['editdescriptionconfirm'])  == 0) {
                $sql = "SELECT description FROM tbl_about_mission";
                $result = mysqli_query($connection , $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_num_rows($result)) {
                        $_SESSION['descriptioneditconfirm'] = $rows['description'];
                    }
                }
                
            }

            if (isset($_SESSION['descriptioneditconfirm'])) {
                $descriptiontrue = $_SESSION['descriptioneditconfirm'];
                $oldid = $_SESSION['oldeditid'];
        
                $sql = "UPDATE tbl_about_mission SET  description = '$descriptiontrue' WHERE id  = ".$oldid;
                mysqli_query($connection , $sql);
                mysqli_close($connection);
                $_SESSION['missionsuccess'] = "<span class=\"center-align\"><strong class=\"white-text\">Mission Successfully Updated!</strong></span>\n";
                        header("location:mission.php");
                        die;
            }

        }
    } else {
        mysqli_close($connection);
        header("location:mission.php");
        die();
    }
?>