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
        
        if (isset($_POST['visionsubmits'])) {
            
            if (isset($_POST['description'])) {
                
                 if (is_numeric($_POST['description'])) {
                    
                    $_SESSION['visionerror'] = "<span class=\"center-align\"><strong class=\"white-text\">Description is invalid!</strong></span>\n";
                    header("location:vision.php");
                    die;
                 } elseif (!is_numeric($_POST['description'])) {
                      
            
                    if(strlen($_POST['description']) > 0 && is_numeric($_POST['description'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['visionerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:vision.php");
                        die;
                    } elseif (strlen($_POST['description']) > 0 && !is_numeric($_POST['description'][0])) {
                        $description = sanitizedData($_POST['description']);
                        $sqlPreventInjection = mysqli_real_escape_string($connection , $description);
                        
                        if (strlen($sqlPreventInjection) <= 1000 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['descriptionSuccess'] = $sqlPreventInjection; 
                            
                        } elseif (strlen($sqlPreventInjection) > 1000 ) {
                            mysqli_close($connection);
                            $_SESSION['visionerrror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 255!</strong></span>\n";
                            header("location:vision.php");
                            die;
                        }
                    }
                }
            }
            if (strlen($_SESSION['descriptionSuccess']) !== 0) {
                $descriptionPass = $_SESSION['descriptionSuccess'];

                mysqli_query($connection, $sql);

                $sql = "INSERT INTO tbl_about_vision(description)
                    VALUES('$descriptionPass')\n";
                mysqli_query($connection , $sql);

                $_SESSION['visionsuccess'] = "<span><strong class=\"white-text\">Data successfully added!</strong></span>\n";
                header("location:vision.php");
            }   
        }

    } else {
        mysqli_close($connection);
        header("location:vision.php");
        die;
    }
?>