<?php require "connection.php";?>
<?php
    session_start();
    $userID = false;
    $preventSQLInjection = false;

    $username = false;
    $password = false;
    $securityQ = false;

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
        if (isset($_POST['enableaccount'])) {
            
            if (isset($_POST['enableid'])) {
                if (is_numeric($_POST['enableid'])) {

                    $userID = sanitizedData($_POST['enableid']);
                    $preventSQLInjection = mysqli_real_escape_string($connection , $userID);

                    $sql = "SELECT * FROM tbl_admin_disable WHERE id =". $preventSQLInjection;
                    $result = mysqli_query($connection  ,$sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($user = mysqli_fetch_assoc($result)) {
                            $username = $user['username'];
                            $password = $user['password'];
                            $securityPin = $user['pin'];
                        } 
                      
                        $sql = "INSERT INTO tbl_admin (username , password , pin)
                                VALUES('$username' , '$password' , ". $securityPin .")";
                        //die($sql);        
                        mysqli_query($connection , $sql);
                        $sql = "DELETE FROM tbl_admin_disable WHERE id =". $preventSQLInjection;
                        mysqli_query($connection , $sql);
                        mysqli_close($connection);
                        $_SESSION['enablesuccess'] = "<span><strong class=\"white-text\">ID: ".$preventSQLInjection." Successfully Enabled!</strong></span>\n";
                        header("location:users.php?admin");
    
                    } elseif (mysqli_num_rows($result) <= 0) {
                        $_SESSION['enableerror'] = "<span><strong class=\"white-text\">Admin id is not available</strong></span>\n";
                        mysqli_close($connection);
                        header("location:users.php?admin");
                    }

                } elseif (!is_numeric($_POST['disableid'])) {
                    mysqli_close($connection);
                    $_SESSION['enableerror'] = "<span><strong class=\"white-text\">enter valid admin id!</strong></span>\n";
                    header("location:users.php?admin");
                }
            } else {
                $_SESSION['enableerror'] = "<span><strong class=\"white-text\">enter valid admin id!</strong></span>\n";
                header("location:users.php?admin");
            }
        }
    }

?>