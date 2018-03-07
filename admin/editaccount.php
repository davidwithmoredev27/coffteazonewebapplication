<?php require "connection.php"; ?>
<?php
    $Status = null;
    $_SESSION['idcontinuation'] = null;
    $_SESSION['continuesql'] = null;
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
    session_start();
    // check if there already login admin
    //require "sessiontimeout.php";
    $_SESSION['accountnew'] =  null;
    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    // redirect to users.page if there are no chosen user id

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
       if(isset($_POST['editaccount'])) {
            if (filter_var($_POST['editid'] ,FILTER_VALIDATE_INT)) {
                $userid = sanitizedData($_POST['editid']);
                $preventSQLinjection = mysqli_escape_string($connection , $userid);
                
                

                $sql = "SELECT ID FROM tbl_admin WHERE ID = ". $preventSQLinjection;
                $idResult = mysqli_query($connection , $sql);
                if (mysqli_num_rows($idResult) <= 0) {
                    $_SESSION['accountediterror'] = "
                        <span><strong class=\"white-text\">Username id is not available!</strong></span>\n";
                    header("location:users.php?admin");
                    die();
                } elseif (mysqli_num_rows($idResult) > 0) {
                    $Status = 1;
                    $_SESSION['idcontinuation'] = $Status;
                    while($rows = mysqli_fetch_assoc($idResult)) {
                        $_SESSION['continuesql'] = $rows['ID'];
                    }
                }
               
            } elseif (!filter_var($_POST['editid'] ,FILTER_VALIDATE_INT)) {
                $_SESSION['accountediterror'] = "
                <span><strong class=\"white-text\">Please Enter Valid Id!</strong></span>\n";
                header("location:users.php?admin");
            }
        }

        if (!isset($Status)) {
            $_SESSION['accountediterror'] = "
                <span><strong class=\"white-text\">Please Enter Valid Id!</strong></span>\n";
            header("location:users.php?admin");
        }     
    }else {
        if (!isset($_SESSION['idcontinuation'])) {
            mysql_close($connection);
            header("location:user.php");
            die;
        }
    }
     
   

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
    <title>Admin Account ID: <?php echo $preventSQLinjection; ?></title>
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
        .tooltippedstyle {
            font-size:.8em !important;
        }
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
                <a href="#" class="brand-logo center-align brand-logomobile"><img class="logo-brand" src="../img/logo/cofftealogo.png" width="100px" heigth="100px"></a>
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
             <li>
                <h1 class="center-align white-text usernametextadmin">Admin <?php echo $_SESSION['username'];?></h1>
            </li>
            <li class="logostyle">
                <a href="dashboard.php" class="center-align"><img src="../img/logo/cofftealogo.png" width="80px" height="80px" srcset=""></a>
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
            <li>
                <a href="#!" class="left-align white-text sidenavmainlinks">
                    <span>Maintenance</span>
                    <i class="left material-icons white-text">build</i>
                </a>
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
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header left-align admincolor white-text">
                                                <span>Gallery</span>
                                                <i class="left tiny material-icons white-text">photo_library</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="galleryview.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">View Album
                                           
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="addimages.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Add Images
                                                    
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="galleryalbumadd.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Add Album
                                                       
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="deletealbum.php" class="white-text left-align indentgallery" style="font-size:.8em !important;">Delete Album
                                                            
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </li>
                                    </ul>
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
                               <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header left-align admincolor white-text">
                                                <span>About us</span>
                                                <i class="left tiny material-icons white-text">person_pin</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="history.php" class="white-text left-align indent" style="font-size:.8em !important;">History
                                                            <i class="tiny material-icons  white-text left">access_time</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="historyimages.php" class="white-text left-align indent" style="font-size:.8em !important;">images
                                                            <i class="tiny material-icons  white-text left">access_time</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="vision.php" class="white-text left-align indent" style="font-size:.8em !important;">Vision
                                                            <i class="tiny material-icons  white-text left">remove_red_eye</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="mission.php" class="white-text left-align indent" style="font-size:.8em !important;">Mission
                                                            <i class="tiny material-icons  white-text left">flag</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </li>
                                    </ul>
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
                                    <a href="filter.php" class="white-text left-align">Request
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
                        <a class="collapsible-header left-align admincolor white-text">Admin
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
           
            <div class="row tabletfix">
                <div class="col s12 m12 xl12 l12"></div>
            </div>
            <div class="row tabletfix">
                <div class="col  m12 xl12 l12"></div>
            </div>
            <div class="row">
                <form  method="post" action="editconfirm.php" class="col s12 m12 l6 xl6 offset-l3 offset-xl3">
                    <div class="header col m12 l12 xl12 s12">
                    
                    <?php
                        
                        $sql = "SELECT ID ,username , password FROM tbl_admin WHERE ID =".$_SESSION['continuesql'];
                        $result = mysqli_query($connection , $sql);
        
                        if(mysqli_num_rows($result) > 0) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                echo "<h6 class=\"center-align\">ID:".$rows['ID']."</h6>\n";
                                echo "<h6 class=\"center-align\">USERNAME:".$rows['username']."</h6>\n";
                                $_SESSION['idchange'] = $rows['ID'];
                                $_SESSION['usernamechange'] = $rows['username'];
                                $_SESSION['passwordchange'] = $rows['password'];
                            }
                            
                        }
                    ?>

                </div>
                <div class="row">
                    <div class="col s12 m12 l12 xl12">
                    </div>
                </div>
                    <?php
                        if(isset($_SESSION['accountediterror'])){
                            echo "<div class=\"row\">\n";
                            echo "<div class=\"col s12 m12 l12 xl12 red darken-3 center-align\">\n";
                            echo "". $_SESSION['accountediterror']."";
                            echo "</div>\n";
                            echo "</div>\n";
                        }
                    ?>
                     <div class="row">
                        <div class="col s12 m12 xl12 l12"></div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 xl12 center-align showmobile">
                            <i class="medium dashboardicons material-icons center">account_circle</i>
                        </div>
                        <div class="input-field col s12 m12 l12 xl12">
                            <i class="large dashboardicons material-icons prefix removemobile">account_circle</i>
                            <input class="center-align removeprefix tooltipped" data-position="right" data-delay="50" data-tooltip='<span class="tooltippedstyle">Provide new username!</span>' id="icon_prefix" autocomplete="off" name="newusername" type="text" required class="validate">
                            <label class="removeprefix" for="icon_prefix">New username</label>
                        </div>
                        <div class="col s12 m12 l12 xl12 center-align showmobile">
                            <i class="medium dashboardicons material-icons center">vpn_key</i>
                        </div>
                        <div class="input-field col s12 m12 l12 xl12">
                            <i class="large dashboardicons material-icons prefix removemobile">vpn_key</i>
                            <input class="center-align removeprefix tooltipped" data-position="right" data-delay="50" data-tooltip='<span class="tooltippedstyle">Your old Password</span>' autocomplete="off" id="icon_vpn" name="oldpassword" type="password" required class="validate">
                            <label  class="removeprefix" for="icon_vpn">Old password</label>
                        </div>
                        <div class="input-field col s12 m12 l12 xl12">
                            <i class="large dashboardicons material-icons prefix removemobile">vpn_key</i>
                            <input class="center-align removeprefix tooltipped" data-position="right" data-delay="50" data-tooltip='<span class="tooltippedstyle">Provide new password</span>' autocomplete="off" id="icon_vpn" name="newpassword" type="password" required class="validate">
                            <label  class="removeprefix" for="icon_vpn">New password</label>
                        </div>
                        <div class="col s12 m12 l12 xl12 center-align showmobile">
                            <i class="medium dashboardicons material-icons center">autorenew</i>
                        </div>
                        <div class="input-field col s12 m12 l12 xl12">
                            <i class="large dashboardicons material-icons prefix removemobile">autorenew</i>
                            <input class="center-align removeprefix tooltipped" data-position="right" data-delay="50" data-tooltip='<span class="tooltippedstyle">Provide your 5 digit pin!</span>' maxlength="5" autocomplete="off" id="icon_renew" name="securitypin" type="password" required class="validate">
                            <label  class="removeprefix" for="icon_renew">Security pin</label>
                        </div>
                         <div class="input-field col s12 m12 l12 xl12">
                             <div class="row">
                                <input class="center-align col s6 offset-s3 m6 offset-m3 l5 offset-l4 xl5 offset-xl4  btn wave-light" name="accountchange" value="Update" type="submit">
                             </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
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
    <script type="text/javascript">
    
                        
    </script>
</body>

</html>