<?php require "connection.php"; ?>
<?php
    require "detectos.php";
    session_start();
    $securityPin = false;
    $NewAccountconfirmPass = false;
    $NewAccountPassword = false;
    $NewUsername = false;
    $passwordPreventSql = false;
    $usernamePreventSql = false;
    $fnamePreventSql = false;
    $lnamePreventSql = false;
    $usernamenewPass = false;
    $passwordnewPass = false;
    $firstnamenewPass = false;
    $lastnamenewPass = false;
    $hashed_password = "";
    $hash_available  = "";
    $salt  = '$2a$07$usesomassodosrkeoaol1e35958kdafir1rsalt$';
    $usernameList = array();
    $passwordList = array();
    $passwordSuccess = false;
     function GetClient() {
        $clientIp = "";
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $clientIp = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $clientIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $clientIp = $_SERVER['REMOTE_ADDR'];
        }
        return $clientIp;
    }
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if (isset($_POST['addaccount'])) {
        
        // check for new user account if its not empty
        if (isset($_POST['usernamenew'])  || !empty($_POST['usernamenew'])) {
            $NewUsername = sanitizedData($_POST['usernamenew']);
            $usernamePreventSql = mysqli_escape_string($connection,$NewUsername);
            

        } elseif (!isset($_POST['usernamenew']) || empty($_POST['usernamenew'])) {
            //header("location:newusererror.php");
            die('username is empty');
        }

        // check if password has a value
        if (isset($_POST['passwordnew']) || !empty($_POST['passwordnew'])) {
            $NewAccountPassword = sanitizedData($_POST['passwordnew']);
            $passwordPreventSql = mysqli_escape_string($connection,$NewAccountPassword);
        
            
            // check if password has value
            if (isset($_POST['confirmpassword']) || !empty($_POST['confirmpassword'])) {
                $NewAccountconfirmPass = sanitizedData($_POST['confirmpassword']);
                $confirmpasswordPreventSql = mysqli_escape_string($connection ,  $NewAccountconfirmPass);
            } elseif (!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])) {
                //header("location: confirmpassworderr.php");
                die("confirmpassword is empty");
            }
        } elseif (!isset($_POST['passwordnew']) || empty($_POST['passwordnew'])) {
            //header("location: newpassworderr.php");
            die("password is empty");
        }

        if (isset($_POST['firstnamenew'])) {
            if (!is_numeric($_POST['firstnamenew'])) {
                
                if (preg_match('/^[1-9][0-9]*$/',$_POST['firstnamenew'])) {
                    mysqli_close($connection);
                    $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Invalid firstname!</strong></span>\n";
                    header("location:registration.php");
                    die();
                } elseif (!preg_match('/^[1-9][0-9]*$/' , $_POST['firstnamenew'])) {
                    $firstname = sanitizedData($_POST['firstnamenew']);
                    $fnamePreventSql = mysqli_escape_string($connection , $firstname);

                    $firstnamenewPass = $fnamePreventSql;
                }
            } elseif (is_numeric($_POST['firstnamenew'])) {
                mysqli_close($connection);
                $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Firstname needs to be a combination of characters without numbers!</strong></span>\n";
                header("location:registration.php");
                die();
            }
        } elseif (!isset($_POST['firstnamenew'])) {
            mysqli_close($connection);
            $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Provide username!</strong></span>\n";
            header('location:registration.php');
            die();
        }
        
         if (isset($_POST['lastnamenew'])) {
            if (!is_numeric($_POST['lastnamenew'])) {
                
                if (preg_match('/^[1-9][0-9]*$/',$_POST['lastnamenew'])) {
                    mysqli_close($connection);
                    $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Invalid lastname!</strong></span>\n";
                    header("location:registration.php");
                    die();
                } elseif (!preg_match('/^[1-9][0-9]*$/' , $_POST['lastnamenew'])) {
                    $lastname = sanitizedData($_POST['lastnamenew']);
                    $lnamePreventSql = mysqli_escape_string($connection , $lastname);

                    $lastnamenewPass = $lnamePreventSql;
                }
            } elseif (is_numeric($_POST['lastnamenew'])) {
                mysqli_close($connection);
                $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Lastname needs to be a combination of characters without numbers!</strong></span>\n";
                header("location:registration.php");
                die();
            }
        } elseif (!isset($_POST['lastnamenew'])) {
            mysqli_close($connection);
            $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Provide lastname!</strong></span>\n";
            header('location:registration.php');
            die();
        }

        // check if username is already available in the database 
        $sql = "SELECT username FROM tbl_admin";
        $availableResult = mysqli_query($connection , $sql);

        if (mysqli_num_rows($availableResult) > 0) {
            while($usernameavailable = mysqli_fetch_assoc($availableResult)) {
                array_push($usernameList , $usernameavailable['username']);
            }
            
            for ($i = 0 ; $i < count($usernameList) ; $i++) {
                if ($usernameList[$i] === $usernamePreventSql) {
                    $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Username is already available!</strong></span>";
                    header("location:registration.php");
                    die();
                }
            }
        }
        // check if password is already taken in the database
        $sql = "SELECT password FROM tbl_admin";
        $availableResult = mysqli_query($connection , $sql);

        if (mysqli_num_rows($availableResult) > 0) {
            while($passwordavailable = mysqli_fetch_assoc($availableResult)) {
                array_push($passwordList , $passwordavailable['password']);
            }
            
            for ($i = 0 ; $i < count($passwordList) ; $i++) {
                $hash_available = crypt($passwordPreventSql , $salt);
                if ($passwordList[$i] === $hash_available) {
                    $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Password is already available!</strong></span>";
                    header("location:registration.php");
                    die();
                }
            }
        }


        // check if usernamepreventSQl has a value
        if (isset($usernamePreventSql) || !empty($usernamePreventSql)) {
            $usernamenewPass = $usernamePreventSql;
           
        } elseif (!isset($usernamePreventSql) || empty($usernamePreventSql)) {
            //header("location:newusernameerr.php");
            die("Hello world1");
        }

        // check if confirmpassword and new password is match
        if ((isset($confirmpasswordPreventSql) || !empty($confirmpasswordPreventSql)) &&
             (isset($passwordPreventSql) || !empty($passwordPreventSql))) {

            if ($passwordPreventSql === $confirmpasswordPreventSql) {
                // check the password length !
                if (strlen($passwordPreventSql) >= 8) {
                    $passwordnewPass = $passwordPreventSql;
                    // hash the password of admin panel
                    $hashed_password = crypt($passwordnewPass , $salt);
                    $passwordSuccess = true;
                }
            } elseif ($passwordPreventSql !== $confirmpasswordPreventSql) {
                    $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Password Confirmation Mismatch!</strong></span>\n";
                    header('location:registration.php');
                    die();

            }

        } elseif ((!isset($confirmpasswordPreventSql) || empty($confirmpasswordPreventSql)) &&
             (!isset($passwordPreventSql) || empty($passwordPreventSql))) {
                header("location: newpassworderr.php");
                die(1);
        }

        // get the value of check the value of security pin
        if (isset($_POST['securitypin'])) {
            if (filter_var($_POST['securitypin'], FILTER_VALIDATE_INT)) {
                $userPin = sanitizedData($_POST['securitypin']);
                $userPinPreventSQLInjection =  mysqli_escape_string($connection , $userPin);

                if (strlen($userPinPreventSQLInjection) >  5 || strlen($userPinPreventSQLInjection) < 5) {
                    header("location:registration.php");
                    $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Provide 5 digit pin!</strong></span>\n";
                    die();
                } elseif (strlen($userPinPreventSQLInjection) == 5) {
                     $securityPin = $userPinPreventSQLInjection;
                }
            } else if (!filter_var($_POST['securitypin'] , FILTER_VALIDATE_INT)) {
                $_SESSION['registrationoutside'] = "<span><strong class=\"white-text\">Invalid pin!</strong></span>\n";
                header("location:registration.php");
                die();
            }
        }
        

        if (isset($usernamenewPass) &&  $passwordSuccess == true && isset($securityPin) ) {
            // $sql = "INSERT INTO tbl_admin(username , password  , securityquestion)
            // VALUES('$usernamenewPass' ,'$hashed_password', '$securityQuestion')";
           

            // check if allow_url_fopen is enabled in my webserver by default

            $clientIP = GetClient();
            if (ini_get('allow_url_fopen')) {
                $details = json_decode(file_get_contents("http://ip-api.com/json/{$clientIP}") ,true);

                $ipaddress = $details['query'];
                $location = "Latitude: ".$details['lat']. "Longitude: ". $details['lon'];
                $isp = $details['org'];
                $city = $details['city'];
                $region = $details['regionName'];
                $country = $details['country'];
                $Time = $details['timezone'];
                date_default_timezone_set($Time);
                $timecreated = date('Y/m/d h:i:s a');
                $OS = getOS($_SERVER['HTTP_USER_AGENT']);
                $sql = "INSERT INTO tbl_filter(username , password , pin, firstname ,lastname ,  timecreated , platform , ip , location, isp , city , region , country)
                    VALUES('$usernamenewPass' ,'$hashed_password', ".$securityPin. ",'$firstnamenewPass', '$lastnamenewPass', '$timecreated' ,'$OS' , '$ipaddress' , '$location' , '$isp' , '$city' , '$region' , '$country')";
    
                mysqli_query($connection , $sql);
            } else  {
                // use curl 
                $curl = curl_init();
                curl_setopt($curl , CURLOPT_URL , "http://ip-api.com/json/".$clientIP);
                curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                $details = json_decode(curl_exec($curl));
                curl_close($curl);
                $ipaddress = $details['query'];
                $location = "Latitude: ".$details['lat']. "Longitude: ". $details['lon'];
                $isp = $details['org'];
                $city = $details['city'];
                $region = $details['regionName'];
                $country = $details['country'];
                $Time = $details['timezone'];
                date_default_timezone_set($Time);
                $timecreated = date('Y/m/d h:i:s a');
                $OS = getOS($_SERVER['HTTP_USER_AGENT']);
                $sql = "INSERT INTO tbl_filter(username , password  ,  pin, firstname , lastname, timecreated , platform , ip , location, isp , city , region , country)
                    VALUES('$usernamenewPass' ,'$hashed_password', " .$securityPin . " , '$firstnamenewPass' ,'$lastnamenewPass' ,'$timecreated' ,'$OS' , '$ipaddress' , '$location' , '$isp' , '$city' , '$region' , '$country')";

                mysqli_query($connection , $sql);
            }
    
            $_SESSION['newaccount'] = $passwordSuccess;


            header("location:registrationsuccess.php");
          
        }
    }
    mysqli_close($connection);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="../js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <title>Create New Admin Account</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <meta property="og:site_name" content="Coffteazone">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"
        media="screen , projection">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row loginimg" role="coffteazonelogo">
            <div class="col l3 offset-l5 m3 offset-m5 xl3 offset-xl5 s5 offset-s4">
                <img src="../img/logo/cofftealogo.png"  width="70%" height="70%" alt="coffteazone logo">
            </div>
        </div>
        <?php
            if(isset($_SESSION['registrationoutside'])) {
                echo "<div class=\"row\">\n";
                echo "<div class=\"col s12 m6 offset-m3 l6 offset-l3 xl6 offset-xl3 card-panel red darken-3\" role=\"registrationsuccessbanner\">\n";
                echo "<p class=\"center-align\"><strong class=\"white-text\" >". $_SESSION['registrationoutside'] . "</strong></p>\n";
                echo "<p class=\"center-align\"><strong class=\"white-text\" >Try Again!</strong></p>\n";
                echo "</div>\n";
                echo "</div>\n";
            }
            
        ?>
    </div>
    <div class="row">
        <form class="col s12 m12 l12 xl12" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="row">
                <div class="input-field col s12 m12 l12 xl12">
                    <input id="usernamenew" autocomplete="off" type="text" class="brown-text text-darken-3 center-align" required name="usernamenew" class="validate">
                    <label for="usernamenew" class="brown-text text-darken-3">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6 xl6">
                    <input id="passwordnew" type="password" role="password" autocomplete="off" class="brown-text text-darken-3 center-align" name="passwordnew" required class="validate">
                    <label for="passwordnew" class="brown-text text-darken-3">Password</label>
                </div>
                <div class="input-field col s12 m12 l6 xl6">
                    <input id="confirmpassword" role="confirmpassword" type="password" class="brown-text text-darken-3 center-align" required name="confirmpassword" class="validate">
                    <label for="confirmpassword" class="brown-text text-darken-3" >Confirm Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6 xl6">
                    <input id="firstname" role="firstname" maxlength="25" type="text" class="tooltipped brown-text text-darken-3 center-align" position="top" data-delayed="50" data-tooltip="Fillup Firstname field!" required name="firstnamenew" class="validate">
                    <label for="firstname" class="brown-text text-darken-3" >Firstname</label>
                </div>
                    <div class="input-field col s12 m12  l6 xl6">
                    <input id="lastname" type="text" maxlength="25" class="tooltipped brown-text text-darken-3 center-align" position="top" data-delayed="50" data-tooltip="Fillup Lastname field!" name="lastnamenew" required class="validate">
                    <label for="lastname" class="brown-text text-darken-3" >Lastname</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 xl6 l6 offset-m3 offset-l3 offset-xl3">
                    <input id="securitypin" maxlength="5" autocomplete="off" role="securitypin" type="password" class="brown-text text-darken-3 center-align" required name="securitypin" class="validate">
                    <label for="securitypin" class="brown-text text-darken-3">Security Pin</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12 xl12">
                    <div class="row">
                        <div class="col s12 l12 m12 xl12"></div>
                    </div>
                    <button role="addaccount" id="addsubmit" class="waves-effect brown darken-3 waves-light btn col s6 offset-s3 m6 offset-m3 l3 xl3 offset-l2 offset-xl2" type="submit" name="addaccount">Add Account</button>
                    <div  id="loginbtnseperator" class="row">
                        <div class="col s12 m12 xl12 l12"></div>
                    </div>
                   <a role="addaccount"  href="login.php" class="waves-effect brown darken-3 waves-light btn col s6 offset-s3 m6 offset-m3 l3 xl3 offset-l2 offset-xl2" >Log In</a>
                </div> 
            </div>
        </form>
    </div>
    <!-- for development javascript file -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    <!-- 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/validation.js" type="text/javascript"></script>
</body>
    <?php $_SESSION['registrationoutside'] = null;?>
</html>