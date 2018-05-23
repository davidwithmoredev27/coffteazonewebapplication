<?php require "connection.php";?>
<?php 
    session_start();
    $_SESSION['uploadstatus'] = null;
    $_SESSION['historySuccess'] = null;
    $_SESSION['descriptionSuccess'] = null;


    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }

    
    function sanitizedData ($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        
        if (isset($_POST['missionsubmits'])) {
            
            if (isset($_POST['description'])) {
                
                 if (is_numeric($_POST['description'])) {
                    
                    $_SESSION['missioneerror'] = "<span class=\"center-align\"><strong class=\"white-text\">Description is invalid!</strong></span>\n";
                    header("location:mission.php");
                    die;
                 } elseif (!is_numeric($_POST['description'])) {
                      
            
                    if(strlen($_POST['description']) > 0 && is_numeric($_POST['description'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['missioneerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:mission.php");
                        die;
                    } elseif (strlen($_POST['description']) > 0 && !is_numeric($_POST['description'][0])) {
                        $description = sanitizedData($_POST['description']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $description);
                        
                        if (strlen($sqlPreventInjection) <= 255 &&  strlen($sqlPreventInjection) !== 0) {
                             if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['missioneerror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                                header("location:mission.php");
                                die();
                            } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                 $_SESSION['descriptionSuccess'] = $sqlPreventInjection; 
                            }
                            
                        } elseif (strlen($sqlPreventInjection) > 255 ) {
                            mysqli_close($connection);
                            $_SESSION['missioneerror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 255!</strong></span>\n";
                            header("location:mission.php");
                            die;
                        }
                    }
                }
            }
            if (strlen($_SESSION['descriptionSuccess']) !== 0) {
                $descriptionPass = $_SESSION['descriptionSuccess'];

                mysqli_query($connection, $sql);

                $sql = "INSERT INTO tbl_about_mission(description)
                    VALUES('$descriptionPass')\n";
                mysqli_query($connection , $sql);

                $_SESSION['missionsuccess'] = "<span><strong class=\"white-text\">Data successfully added!</strong></span>\n";
                header("location:mission.php");
            }   
        }

    } else {
        mysqli_close($connection);
        header("location:mission.php");
        die;
    }
?>