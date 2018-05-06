<?php require "connection.php";?>
<?php 
    session_start();
    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
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
            // $_SESSION['faqerror'] = "<span><strong class=\"white-text\"></strong></span>\n";
            // header("location:ktvfaq.php");
            // die;

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['faqsubmitdelete'])) {
            if (isset($_POST['faqdeleteid'])) {
                $deleteid = sanitizedData($_POST['faqdeleteid']);
                $idpreventSQlInjection = mysqli_real_escape_string($connection , $deleteid);

                if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^\s/" , $idpreventSQlInjection)) {
                    mysqli_close($connection);
                    $_SESSION['faqerror'] = "<span><strong class=\"white-text\">Special character is invalid  as a first character!!</strong></span>\n";
                    header("location:martinasfaq.php");
                    die();
                } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^\s/" , $idpreventSQlInjection)) {
                    if (is_numeric($idpreventSQlInjection)) {

                        $sql = "SELECT * FROM tbl_martinasfaq WHERE id = ". $idpreventSQlInjection;
                        $result = mysqli_query($connection , $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $sql = "DELETE FROM tbl_martinasfaq WHERE id = ".$idpreventSQlInjection;
                            mysqli_query($connection , $sql);
                            
                            mysqli_close($connection);
                            $_SESSION['faqsuccess'] = "<span><strong class=\"white-text\">Data sucessfully deleted!</strong></span>\n";
                            header("location:martinasfaq.php");
                            die();
                        } elseif (mysqli_num_rows($result) == 0) {
                            mysqli_close($connection);
                            $_SESSION['faqerror'] = "<span><strong class=\"white-text\">'invalid ID!!</strong></span>\n";
                            header("location:martinasfaq.php");
                            die();
                        }
        
                    } elseif (!is_numeric($idpreventSQlInjection)) {
                        mysqli_close($connection);
                        $_SESSION['faqerror'] = "<span><strong class=\"white-text\">'invalid ID!!</strong></span>\n";
                        header("location:martinasfaq.php");
                        die();
                    }
                }
            } elseif (!isset($_POST['faqdeleteid'])) {
                 mysqli_close($connection);
                    $_SESSION['faqerror'] = "<span><strong class=\"white-text\">ID is empty!!</strong></span>\n";
                    header("location:martinasfaq.php");
                    die();
            }
        }
    } else {
        header("location:ktvfaq.php");
        die;
    }
?>