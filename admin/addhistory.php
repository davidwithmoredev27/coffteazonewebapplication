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
        
        if (isset($_POST['historyinfosubmit'])) {
            if (isset($_POST['name'])) {
                
                 if (is_numeric($_POST['name'])) {
                    
                    $_SESSION['historyerror'] = "<span class=\"center-align\"><strong class=\"white-text\">History is invalid!</strong></span>\n";
                    header("location:history.php");
                    die;
                 } elseif (!is_numeric($_POST['name'])) {
                      
                     #check for first number
                    if(strlen($_POST['name']) > 0 && is_numeric($_POST['name'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:history.php");
                        die;
                    } elseif (strlen($_POST['name']) > 0 && !is_numeric($_POST['name'][0])) {
                        $title = sanitizedData($_POST['name']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $title);
                        
                        if (strlen($sqlPreventInjection) <= 50 &&  strlen($sqlPreventInjection) !== 0) {
                            if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                $_SESSION['historyerror'] = "<span class=\"center-align\"><strong class=\"white-text\">You cannot use space and special characters and numbers as your first entry!</strong></span>\n";
                                header("location:history.php");
                                die;
                            } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^[[:blank:]]|^[0-9]/" ,$sqlPreventInjection)) {
                                 $_SESSION['historySuccess'] = $sqlPreventInjection
                            }
                             
                        } elseif (strlen($sqlPreventInjection) > 50 ) {
                            mysqli_close($connection);
                            $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 3000!</strong></span>\n";
                            header("location:history.php");
                            die;
                        }
                    }
                }
            }
            if (isset($_POST['description'])) {
                
                 if (is_numeric($_POST['description'])) {
                    
                    $_SESSION['historyerror'] = "<span class=\"center-align\"><strong class=\"white-text\">Description is invalid!</strong></span>\n";
                    header("location:history.php");
                    die;
                 } elseif (!is_numeric($_POST['description'])) {
                      
            
                    if(strlen($_POST['description']) > 0 && is_numeric($_POST['description'][0])) {
                        
                        mysqli_close($connection);
                        $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">First character is a number!</strong></span>\n";
                        header("location:history.php");
                        die;
                    } elseif (strlen($_POST['description']) > 0 && !is_numeric($_POST['description'][0])) {
                        $description = sanitizedData($_POST['description']);
                        $sqlPreventInjection = mysqli_escape_string($connection , $description);
                        
                        if (strlen($sqlPreventInjection) <= 255 &&  strlen($sqlPreventInjection) !== 0) {
                            $_SESSION['descriptionSuccess'] = $sqlPreventInjection; 
                            
                        } elseif (strlen($sqlPreventInjection) > 255 ) {
                            mysqli_close($connection);
                            $_SESSION['historyerror']= "<span class=\"center-align\"><strong class=\"white-text\">Characters is greater than 3000!</strong></span>\n";
                            header("location:history.php");
                            die;
                        }
                    }
                }
            }
            if (isset($_SESSION['historySuccess']) &&  strlen($_SESSION['descriptionSuccess']) !== 0) {

                $historyPass = $_SESSION['historySuccess'];
                $descriptionPass = $_SESSION['descriptionSuccess'];

                $sql = "CREATE TABLE IF NOT EXISTS tbl_about_history(".
                    "id INT NOT NULL AUTO_INCREMENT,".
                    "name VARCHAR(50) NOT NULL,".
                    "description VARCHAR(255) NOT NULL,".
                    "PRIMARY KEY(id)".
                ")";

                mysqli_query($connection, $sql);

                $sql = "INSERT INTO tbl_about_history(name, description)
                    VALUES('$historyPass' , '$descriptionPass')\n";
                mysqli_query($connection , $sql);

                $_SESSION['historysuccess'] = "<span><strong class=\"white-text\">Data successfully added!</strong></span>\n";
                header("location:history.php");
            }   
        }

    } else {
        mysqli_close($connection);
        header("location:history.php");
        die;
    }
?>