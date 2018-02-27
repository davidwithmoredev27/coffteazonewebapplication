<?php require "connection.php"; ?>
<?php 
    session_start();
    require_once "detectos.php";
    // check if there already login admin
    //require "sessiontimeout.php";
    
    $_SESSION['accountnew'] = false;

    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }


    $securityPin = false;
    $NewAccountconfirmPass = false;
    $NewAccountPassword = false;
    $NewUsername = false;
    $passwordPreventSql = false;
    $usernamePreventSql = false;
    $usernamenewPass = false;
    $passwordnewPass = false;
    $hashed_password = "";
    $hash_available  = "";
    $salt  = '$2a$07$usesomassodosrkeoaol1e35958kdafir1rsalt$';
    $usernameList = array();
    $passwordList = array();
    $passwordSuccess = false;
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
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
        

        // check if username is already available in the database 
        $sql = "SELECT username FROM tbl_admin";
        $availableResult = mysqli_query($connection , $sql);

        if (mysqli_num_rows($availableResult) > 0) {
            while($usernameavailable = mysqli_fetch_assoc($availableResult)) {
                array_push($usernameList , $usernameavailable['username']);
            }
            
            for ($i = 0 ; $i < count($usernameList) ; $i++) {
                if ($usernameList[$i] === $usernamePreventSql) {
                    $_SESSION['registrationerror'] = "<span ><strong class=\"white-text center-align\">Username is already available!</strong></span>\n";
                    header("location: registrationadmin.php");
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
                    $_SESSION['registrationerror'] = "<span><strong class=\"white-text\">Password is already available!</strong></span>\n";
                     header("location: registrationadmin.php");
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
                    $_SESSION['registrationerror'] = "<span><strong class=\"white-text\">Password Confirmation Mismatch!</strong></span>\n";
                    header('location:registrationadmin.php');
                    die();

            }

        } elseif ((!isset($confirmpasswordPreventSql) || empty($confirmpasswordPreventSql)) &&
             (!isset($passwordPreventSql) || empty($passwordPreventSql))) {
                header("location: newpassworderr.php");
                die(1);
        }

        // get the value of security options
        if (isset($_POST['securitypin'])) {
            if (filter_var($_POST['securitypin'], FILTER_VALIDATE_INT)) {
                $userPin = sanitizedData($_POST['securitypin']);
                $userPinPreventSQLInjection =  mysqli_escape_string($connection , $userPin);

                if (strlen($userPinPreventSQLInjection) > 5 || strlen($userPinPreventSQLInjection) < 5) {
                    header("location:registrationadmin.php");
                    $_SESSION['registrationerror'] = "<span><strong class=\"white-text\">Provide 5 digit pin!</strong></span>\n";
                    die();
                } else if (strlen($userPinPreventSQLInjection) == 5) {
                     $securityPin = $userPinPreventSQLInjection;
                }
            } elseif (!filter_var($_POST['securitypin'] , FILTER_VALIDATE_INT)) {
                $_SESSION['registrationerror'] = "<span><strong class=\"white-text\">Invalid pin!</strong></span>\n";
                header("location:registrationadmin.php");
                die();
            }
        }
        

        if (isset($usernamenewPass) &&  $passwordSuccess == true  && isset($securityPin)) {
            // $sql = "INSERT INTO tbl_admin(username , password  , securityquestion)
            // VALUES('$usernamenewPass' ,'$hashed_password', '$securityQuestion')";
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
                $timecreated = date('Y/m/d-h:i:sa');
                $OS = getOS($_SERVER['HTTP_USER_AGENT']);
                $sql = "INSERT INTO tbl_filter(username , password , pin, timecreated , platform , ip , location, isp , city , region , country)
                    VALUES('$usernamenewPass' ,'$hashed_password', ". $securityPin . " , '$timecreated' ,'$OS' , '$ipaddress' , '$location' , '$isp' , '$city' , '$region' , '$country')";
    
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
                $OS = getOS($_SERVER['HTTP_USER_AGENT']);
                $Time = $details['timezone'];
                date_default_timezone_set($Time);
                $timecreated = date('Y/m/d-h:i:sa');
                $sql = "INSERT INTO tbl_filter(username , password , pin, timecreated , platform , ip , location, isp , city , region , country)
                    VALUES('$usernamenewPass' ,'$hashed_password', ". $securityPin . " , '$timecreated' ,'$OS' , '$ipaddress' , '$location' , '$isp' , '$city' , '$region' , '$country')";

                mysqli_query($connection , $sql);
            }
            
            
            $_SESSION['newaccount'] = $passwordSuccess;

            $_SESSION['registrationsuccess'] = "<span><strong class=\"white-text\">Account Created Succefully!</strong></span>\n";
            header("location:dashboard.php?admin");
          
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen, projection"> -->
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <?php 
        if(isset($_SESSION['sessionexpnotifacation'])) {
            echo $_SESSION['sessionexpnotifacation'];
            $_SESSION['sessionexpnotifacation'] = null;
            header("location:login.php");
        }       
    ?>
    <style type="text/css">
    </style>
</head>

<body>
    <header class="headerstyle">
        <ul id="dropdown1" class="dropdown-content admincolor adminlinks">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper adminnavbar admincolor">
                <a href="#" class="brand-logo center-align brand-logomobile"><img src="../img/logo/cofftealogo.png" width="50%" heigth="50%" alt=""></a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">admin
                            <i class="material-icons right white-text">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <ul id="slide-out" class="side-nav admincolor fixed  sidenavstyle">
            <li class="logostyle">
                <a href="dashboard.php" class="center-align"><img src="../img/logo/cofftealogo.png" width="70%" height="100%" srcset=""></a>
            </li>
            <li>
                <a href="dashboard.php" class="left-align white-text sidenavmainlinks">
                    <span>Dashboard</span><i class="left material-icons white-text">dashboard</i>
                </a>
            </li>
            <li>
                <a href="users.php" class="left-align white-text sidenavmainlinks">
                    <span>Users</span>
                    <i class="left material-icons white-text">person</i>
                </a>
            </li>
            <li class="no-padding">
                <ul class="collasible collapsible-accordion">
                    <li>
                         <a href="#!" class="left-align white-text sidenavmainlinks">
                            <span>Maintenance</span>
                            <i class="left material-icons white-text">build</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="securityquestion.php" class="white-text left-align">Inbox
                                        <i class="tiny material-icons  white-text left">inbox</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
               
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header left-align admincolor white-text">Pages
                            <i class="material-icons left white-text">description</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="homepage.php" class="white-text left-align">Home
                                        <i class="tiny material-icons left white-text">home</i>
                                    </a>
                                </li>
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header white-text left-align">Our Menu
                                                <i class="tiny material-icons left white-text">local_cafe</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="drinks.php" class="white-text left-align indent">Drinks
                                                            <i class="tiny material-icons left white-text">local_bar</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="foods.php" class="white-text left-align indent">Foods
                                                            <i class="tiny material-icons left white-text">local_dining</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="dessert.php" class="white-text left-align indent">Dessert
                                                            <i class="tiny material-icons left white-text">cake</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="services.php" class="white-text left-align">Services
                                        <i class="tiny material-icons left white-text">style</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="gallery.php" class="white-text left-align">Gallery
                                        <i class="tiny material-icons left white-text">photo_library</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="contactus.php" class="white-text left-align">Contact Us
                                        <i class="tiny material-icons left white-text">local_phone</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.php" class="white-text left-align">FAQ
                                        <i class="tiny material-icons left white-text">help</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="aboutus.php" class="white-text left-align">About Us
                                        <i class="tiny material-icons left white-text">person_pin</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a href="#!" class="collapsible-header left-align admincolor white-text sidenavmainlinks">
                            <span>Messages</span>
                            <i class="left material-icons white-text">contact_mail</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="inbox.php" class="white-text left-align">Inbox
                                        <i class="tiny material-icons  white-text left">inbox</i>
                                    </a>
                                </li>
                            </ul>
                        </div>    
                    </li>
                </ul>
            </li>
             <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header left-align admincolor white-text">authetication
                            <i class="material-icons left white-text">fingerprint</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="filter.php" class="white-text left-align">Filter
                                        <i class="tiny material-icons  white-text left">blur_circular</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="registrationadmin.php" class="white-text left-align">Registration
                                        <i class="tiny material-icons white-text left">person_add</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding admincolor adminprofilemobile">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a  class="collapsible-header left-align admincolor white-text">Admin
                            <i class="material-icons left white-text">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="profile.php" class="white-text left-align">Profile
                                        <i class="tiny material-icons  white-text left">face</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php" class="white-text left-align">Logout
                                        <i class="tiny material-icons white-text left">input</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i class="material-icons brown-text text-darken-4 adminmenu">menu</i>
        </a>
    </header>
    <main>
        <div class="container">
            <div class="header row">
                <div class="col s12 m12 l12 xl12 mobilecenter">
                    <h4 class="center-align">Registration</h4>
                </div>  
            </div>
            <div class="row">
                <div class="col s12 l12 m12 xl12"></div>
            </div>
            <div class="row">
                <div class="col s12 l12 m12 xl12"></div>
            </div>
             <?php
                if (isset($_SESSION['registrationerror'])) {
                    echo "<div class=\"row red darken-3 center-align\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 red darken-3\">\n";
                    echo "". $_SESSION['registrationerror']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
            ?>
        </div>
       
        <div class="row col s12 m12 l12 xl12">
            <div class="container">
                <form class="col s12 m12 l12 x12" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <div class="input-field col s12 m12 l12 xl12">
                        <input id="usernamenew" autocomplete="off" type="text" class="brown-text text-darken-3 center-align" name="usernamenew" required class="validate">
                        <label for="usernamenew" class="brown-text text-darken-3">Username</label>
                    </div>
                    <div class="input-field col s12 m12  l6 xl6">
                        <input id="passwordnew" type="password" class="brown-text text-darken-3 center-align" name="passwordnew" required class="validate">
                        <label for="passwordnew" class="brown-text text-darken-3" >Password</label>
                    </div>
                    <div class="input-field col s12 m12 l6 xl6">
                        <input id="confirmpassword" role="confirmpassword" type="password" class="brown-text text-darken-3 center-align" name="confirmpassword" required class="validate">
                        <label for="confirmpassword" class="brown-text text-darken-3" >Confirm Password</label>
                    </div>
                    <div class="input-field col s12 m6 xl7 l7 offset-m4 offset-l3 offset-xl3">
                        <div class="row">
                            <div class="col s12 m9 xl9 l9">
                                <input id="securitypin" maxlength="5" autocomplete="off" role="securitypin" type="password" class="brown-text text-darken-3 center-align" name="securitypin" required class="validate">
                                <label for="securitypin" class="brown-text text-darken-3 " >Security Pin</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 l12 xl12">
                        
                        <div class="row">
                            <div class="col s12 l12 m12 xl12"></div>
                        </div>
                        <div class="row">
                            <button role="addaccount" id="addsubmit" class="waves-effect brown darken-3 waves-light btn col s6 offset-s3 m6 offset-m3 l3 offset-l4" type="submit" name="addaccount">Add Account</button>
                            <div  id="loginbtnseperator"class="row">
                                <div class="col s12 m12 xl12 l12"></div>
                            </div>
                        </div> 
                    </div> 
                </form>
            </div>
        </div>
    </main>
    <!-- <footer class="page-footer brown darken-4">
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <span class="col s12 m12 l6 xl6 center-align white-text">&copy;
                        <?php// echo htmlspecialchars(date("Y")) . " "."Coffteazone";?>
                    </span>
                    <a class="white-text col s12 m12 l6 xl6 center-align" href="#!">http://www.coffteazone.com</a>
                </div>
            </div>
        </div>
    </footer> -->
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
<?php $_SESSION['registrationerror'] = null?>
</html>