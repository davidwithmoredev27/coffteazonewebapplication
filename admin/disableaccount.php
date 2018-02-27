<?php require "connection.php";?>
<?php
    session_start();
    $userID = false;
    $preventSQLInjection = false;

    $username = false;
    $password = false;
    $securityQ = false;
    $ID = false;
     function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['disableaccount'])) {
            
            if (isset($_POST['disableid'])) {
                if (filter_var($_POST['disableid'] , FILTER_VALIDATE_INT)) {

                    $userID = sanitizedData($_POST['disableid']);
                    $preventSQLInjection = mysqli_escape_string($connection , $userID);

                    $sql = "SELECT * FROM tbl_admin WHERE ID =". $preventSQLInjection;
                    $result = mysqli_query($connection  ,$sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($user = mysqli_fetch_assoc($result)) {
                            $ID = $user['ID'];
                            $username = $user['username'];
                            $password = $user['password'];
                            $securitypin = $user['pin'];
                        } 
                      
                       
                        $sql = "INSERT INTO tbl_admin_disable(id ,username , password ,pin)
                                VALUES( $ID , '$username' , '$password' ," . $securitypin .")";
                        //die($sql);        
                        mysqli_query($connection , $sql);
                        // $sql = "ALTER TABLE tbl_admin_disable AUTO_INCREMENT = 1";
                        // mysqli_query($connection , $sql);

                        $sql = "SELECT * FROM tbl_admin_disable  WHERE id =".$preventSQLInjection;
                        $result_disable_admin = mysqli_query($connection , $sql);

                        if (mysqli_num_rows($result_disable_admin) > 0) {
                            $sql = "DELETE FROM tbl_admin WHERE ID =". $preventSQLInjection;
                            mysqli_query($connection , $sql);
                            mysqli_close($connection);
                    
                            $_SESSION['disablesuccess'] = "<span><strong class=\"white-text\">ID: ".$preventSQLInjection." Successfully Revoked!</strong></span>\n";
                            header("location:users.php?admin");
                        } elseif (mysqli_num_rows($result_disable_admin) <= 0) {
                            header("location:users.php?admin");
                        }
                    } elseif (mysqli_num_rows($result) <= 0) {
                        $_SESSION['disableerror'] = "<span><strong class=\"white-text\">Admin ids is not available</strong></span>\n";
                        mysqli_close($connection);
                        header("location:users.php?admin");
                    }

                } elseif (!filter_var($_POST['disableid'] , FILTER_VALIDATE_INT)) {
                    mysqli_close($connection);
                    $_SESSION['disableerror'] = "<span><strong class=\"white-text\">Use a valid admin id!</strong></span>\n";
                    header("location:users.php?admin");
                }
            } else {
                $_SESSION['disableerror'] = "<span><strong class=\"white-text\">Use a valid admin id!</strong></span>\n";
                header("location:users.php?admin");
            }
        }
    }

?>