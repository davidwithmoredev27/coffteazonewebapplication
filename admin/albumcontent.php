<?php require "connection.php"; ?>

<?php 
    session_start();
    // check if there already login admin
    //require "sessiontimeout.php";

    $_SESSION['accountnew'] = false;

    if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="../js/html5shiv.min.js"></script>
    <![endif]-->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <title>Album <?php echo $_SESSION['selectedtitle'];?></title>
    <script type="text/javascript">
        window.onload = function() {
            var AjaxCall = function () {
                var ajax;
                if (window.XMLHttpRequest) {
                    ajax = new XMLHttpRequest();
                } else if (!window.XMLHttpRequest) {
                   ajax = new ActiveXObject("Microsoft.XMLHTTP");
                }
                return ajax;
            };

            var searchBox = document.getElementById("searchbox");
            
            var showImage = function() {
                var outputmessage = document.getElementById("outputmessage");
               var ajaxhttp =  AjaxCall();
                
               ajaxhttp.onreadystatechange = function () {
                   if (this.status == 200 && this.readyState == 4) {
                       outputmessage.innerHTML = this.responseText;
                       console.log(outputmessage);
                   }
               };
               ajaxhttp.open("POST" , "test.php?q"  , true);
               ajaxhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               ajaxhttp.send();
            };
            searchBox.addEventListener("keydown" , showImage , false);
        };
    </script>
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
                                                <i class="tiny material-icons left white-text">arrow_drop_down</i>
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
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="row">
                    <div class="col s12 m12 l12 xl12 center-align">
                        <h3><?php echo $_SESSION['selectedtitle']?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 xl12 l12">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12 xl5 offset-xl7">
                            <label for="searchbox">Search</label>
                            <input type="text" id="searchbox">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 xl5 offset-xl7">
                            <div id="outputmessage"></div>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <?php 
                        if (isset($_SESSION['albumimagesuccess'])) {
                            echo "<div class=\"row\">\n".
                                    "<div class=\"green darken-3  center-align col s12 m12 l12 xl12\">\n".
                                        $_SESSION['albumimagesuccess'].
                                    "</div>\n".
                                "</div>\n";
                            $_SESSION['albumimagesuccess'] = null;
                        }
                        if (isset($_SESSION['albumimageerror'])) {
                            echo "<div class=\"row\">\n".
                                    "<div class=\" red darken-3 center-align col s12 m12 l12 xl12\">\n".
                                        $_SESSION['albumimageerror'].
                                    "</div>\n".
                                "</div>\n";
                            $_SESSION['albumimageerror'] = null;
                        }
                
                    ?>
                    <table class="responsive-table bordered">
                        <thead>
                            <tr>
                                <th class="center-align">Id</th>
                                <th class="center-align">Name</th>
                                <th class="center-align">Picture</th>
                                <th class="center-align">Delete</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM tbl_gallery_album_".$_SESSION['selectedtitle'];
                                $result = mysqli_query($connection , $sql);
                                $counter = 1;
                                if (mysqli_num_rows($result) > 0) {
                                    while($rows = mysqli_fetch_assoc($result)) {
                                        $_SESSION['deleteiccollection'][$counter] = $counter; 
                                        echo "\n\t\t\t\t\t\t\t<tr>\n".
                                            "\t\t\t\t\t\t\t<td class=\"center-align\">".$counter."</td>\n".
                                            "\t\t\t\t\t\t\t<td class=\"center-align \" style=\"font-size:.9em;\">\n".
                                                "\t\t\t\t\t\t\t\t<img width=\"100px\" height=\"60px\" src=\"../".$rows['path']."\">\n".
                                            "\t\t\t\t\t\t\t</td>\n".
                                            "\t\t\t\t\t\t\t<td  class=\"center-align\">\n".
                                                "\t\t\t\t\t\t\t\t<form action=\"deleteimage.php\" method=\"post\">\n".
                                                    "\t\t\t\t\t\t\t\t\t<input type=\"hidden\"  name=\"deleteid\" value=\"".$rows['id']."\">\n".
                                                    "\t\t\t\t\t\t\t\t\t<button name=\"deletesubmit\" type=\"submit\" style=\"font-size:.8em;\"class=\"btn waves-light waves-effect\">Delete</button>\n".
                                                "\t\t\t\t\t\t\t\t</form>\n"
                                            ."\t\t\t\t\t\t\t</td>\n".
                                        "\n\t\t\t\t\t\t\t\t</tr>\n";
                                        $counter++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
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
        <script src="https://cdnjsi.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="../js/main.js" type="text/javascript"></script>
    
</body>

</html>