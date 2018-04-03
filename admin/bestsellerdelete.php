<?php require "connection.php"; ?>
<?php
    session_start();
    $preventSqlInjection = null;
      function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    function RemoveAllInformation($sqlid) {
        require "connection.php";
        $path = false;
        $result = mysqli_query($connection , $sqlid);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $path = $rows['path'];
                $id = $rows['id'];
            }
        }
        unlink("../" . $path);
        $sql = "DELETE FROM tbl_bestseller WHERE id =".$id;
        mysqli_query($connection , $sql);
        mysqli_close($connection);
        $_SESSION['bestselleruploadsuccess'] = "<span><strong class=\"white-text\">Data Successfully ]delete!</strong></span>\n";
        header("location:bestseller.php");
        die;

    }   

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['bestsellerdelete'])) {
            if(isset($_POST['bestsellerid'])) {
                if (is_numeric($_POST['bestsellerid'])) {
                    $deleteid = sanitizedData($_POST['bestsellerid']);
                    $preventSqlInjection  = mysqli_escape_string($connection , $deleteid);


                    $sql = "SELECT * FROM tbl_bestseller WHERE id = ". $preventSqlInjection;
                    RemoveAllInformation($sql , $connection);
                    mysqli_close($connection);
                    die;

                } elseif(!is_numeric($_POST['bestsellerid'])) {
                    $_SESSION['bestselleruploaderror'] = "<span><strong>Invalid bestseller id!</strong></span>\n";
                }
            }
        } else {
            mysqli_close($connection);
            $_SESSION['bestselleruploaderror'] = "<span><strong>Select bestseller needs to be deleted!</strong></span>\n";
            header("location:bestseller.php");
        }
    } else {
        mysqli_close($connection);
        header("location:bestseller.php");
        die;
    }

?>


