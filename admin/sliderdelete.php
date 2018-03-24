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
        $sql = "DELETE FROM tbl_slider WHERE id =".$id;
        mysqli_query($connection , $sql);
        mysqli_close($connection);
        $_SESSION['uploadsuccess'] = "<span><strong class=\"white-text\">Slider Successfully Updated!</strong></span>\n";
        header("location:slideredit.php");
        die;

    }   

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['deleteslider'])) {
            if(isset($_POST['sliderid'])) {
                if (is_numeric($_POST['sliderid'])) {
                    $deleteid = sanitizedData($_POST['sliderid']);
                    $preventSqlInjection  = mysqli_escape_string($connection , $deleteid);


                    $sql = "SELECT * FROM tbl_slider WHERE id = ". $preventSqlInjection;
                    RemoveAllInformation($sql , $connection);
                    mysqli_close($connection);
                    die;

                } elseif(!is_numeric($_POST['sliderid'])) {
                    $_SESSION['slideruploaderror'] = "<span><strong>Invalid slider id!</strong></span>\n";
                }
            }
        } else {
            mysqli_close($connection);
            $_SESSION['slideruploaderror'] = "<span><strong>Select slider needs to be Deleted!</strong></span>\n";
            header("location:slideredit.php");
        }
    } else {
        mysqli_close($connection);
        header("location:slideredit.php");
        die;
    }

?>


