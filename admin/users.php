<?php require "connection.php"; ?>
<?php 
    session_start();
    //require "sessiontimeout.php";
    $_SESSION['accountedit'] = array();
    // check if there already login admin
    $_SESSION['accountnew'] = false;
    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
    $idcount = 0;
    $sql = "SELECT ID from tbl_admin";
    $idResult = mysqli_query($connection , $sql);
    if (mysqli_num_rows($idResult) > 0) {
        while ($idrrow = mysqli_fetch_assoc($idResult)) {
            $_SESSION['accountedit'][$idcount] = $idrrow['ID'];
            $idcount++;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="../js/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <title>Admin Users Page</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen, projection">
    <!-- <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen, projection"> -->
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
    <noscript class="no-js">
       <div class="row">
           <div class="col s12 m12 l12 xl12">
               <h1 class="center-align">Please enable javascript on your web browser!</h1>
                <p class="center-align">Our website will not function correctly if javascript is disabled.</p>
           </div>
       </div>
    </noscript>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h3>Proceed</h3>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            <a href="editaccount.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
        </div>
    </div>
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3>Change's cannot undone!</h3>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            <a href="deleteaccount.php" class="waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    <header class="headerstyle">
        <ul id="dropdown1" class="dropdown-content admincolor adminlinks">
            <li><a href="editaccount.php">Change Password</a></li>
            <li><a href="logout.php">Log Out</a></li> 
        </ul>
        <nav>
            <div class="nav-wrapper adminnavbar admincolor">
                <a href="#" class="brand-logo center-align brand-logomobile"><img class="logo-brand" src="../img/logo/cofftealogo.png" width="100px" heigth="100px" alt=""></a>
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
                <h1 class="center-align white-text usernametextadmin">Coffteazone Admin</h1>
            </li>
            <li class="logostyle">
                <a href="dashboard.php" class="center-align"><img src="../img/logo/cofftealogo.png" width="80px" height="80px" srcset=""></a>
            </li>
            <li>
                <a href="dashboard.php" class="left-align white-text sidenavmainlinks">
                    <span>Dashboard</span><i class="left material-icons white-text">dashboard</i>
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
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                             <a href="#!" class="collapsible-header left-align admincolor white-text">Home
                                                <i class="tiny material-icons left white-text">home</i>
                                             </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                    <li>
                                                        <a href="slideredit.php" class="white-text left-align indent" style="font-size:.7em !important;">Slider
                                                            <i class="tiny material-icons left white-text">slideshow</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="bestseller.php" class="white-text left-align indent" style="font-size:.7em !important;">Bestseller
                                                            <i class="tiny material-icons left white-text">monetization_on</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="newproduct.php" class="white-text left-align indent" style="font-size:.6em !important;">New Prod.
                                                            <i class="tiny material-icons left white-text">fiber_new</i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="promos.php" class="white-text left-align indent" style="font-size:.7em !important;">Promos
                                                            <i class="tiny material-icons left white-text">new_releases</i>
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
                                 <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header white-text left-align">Services
                                                <i class="tiny material-icons left white-text">motorcycle</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                     <li>
                                                         <a href="ktvservices.php" class="white-text left-align" style="font-size:.8em !important;">KTV
                                                            <i class="tiny material-icons left white-text">mic</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="martinasservices.php" class="white-text left-align" style="font-size:.8em !important;">Martinas
                                                            <i class="tiny material-icons left white-text">cake</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="termsandcondition.php" class="white-text center-align" style="font-size:.7em !important;">Terms &amp; Conditions
                                                
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
                                <li class="no-padding">
                                    <ul class="collapsible collapsible-accordion">
                                        <li>
                                            <a href="#!" class="collapsible-header white-text left-align">FAQ
                                                <i class="tiny material-icons left white-text">question_answer</i>
                                            </a>
                                            <div class="collapsible-body admincolor">
                                                <ul>
                                                     <li>
                                                         <a href="ktvfaq.php" class="white-text left-align" style="font-size:.8em !important;">KTV
                                                            <i class="tiny material-icons left white-text">mic</i>
                                                        </a>
                                                    </li>
                                                     <li>
                                                         <a href="martinasfaq.php" class="white-text left-align" style="font-size:.8em !important;">Martinas
                                                            <i class="tiny material-icons left white-text">cake</i>
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
                                            <a href="#!" class="collapsible-header left-align admincolor white-text">
                                                <span>About us</span>
                                                <i class="left tiny material-icons white-text">photo_library</i>
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
                                    <a href="feedback.php" class="white-text left-align">Feedback
                                        <i class="tiny material-icons  white-text left">inbox</i>
                                    </a>
                                </li>
                            </ul>
                        </div>       
                    </li>
                </ul>
            </li>
             <!-- <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header left-align admincolor white-text">authetication
                            <i class="material-icons left white-text">fingerprint</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="../filter.php" class="white-text left-align">Request
                                        <i class="tiny material-icons  white-text left">blur_circular</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="../registrationadmin.php" class="white-text left-align">Registration
                                        <i class="tiny material-icons white-text left">person_add</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li> -->
            <li class="no-padding admincolor adminprofilemobile">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a  class="collapsible-header left-align admincolor white-text">Admin
                            <i class="material-icons left white-text">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body admincolor">
                            <ul>
                                <li>
                                    <a href="editaccount.php" class="white-text left-align" style="font-size:.8em !important;">Change Pass.
                                        <i class="tiny material-icons white-text left">fingerprint</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php" class="white-text left-align" style="font-size:.8em !important;">Logout
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

            <div class="row rowtablet">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row rowtablet">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
             <div class="row rowtablet">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row rowtablet">
                <div class="col s12 m12 l12 xl12"></div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                    <h3 class="center-align">Account's Settings</h3>
                </div>
            </div>
            <div class="row">
                <h4 style="font-size:1.5em !important" class="col s12 m12 center-align centeronmobile fontsize">Activated Accounts</h4>
            </div>
            <?php
                if (isset($_SESSION['accountdeletesuccess'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 green darken-3\">\n";
                    echo "".$_SESSION['accountdeletesuccess']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }

                if (isset($_SESSION['accountdeleteerror'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 red darken-3\">\n";
                    echo "". $_SESSION['accountdeleteerror']."";
                    echo "</div>\n";
                    echo "</div>\n";
                } 
               if (isset($_SESSION['accounteditsuccess'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 green darken-3\">\n";
                    echo "".$_SESSION['accounteditsuccess']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }

                if (isset($_SESSION['accountediterror'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 red darken-3\">\n";
                    echo "". $_SESSION['accountediterror']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
                 
                 if (isset($_SESSION['disablesuccess'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 green darken-3\">\n";
                    echo "".$_SESSION['disablesuccess']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }

                if (isset($_SESSION['disableerror'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 red darken-3\">\n";
                    echo "". $_SESSION['disableerror']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
                 if (isset($_SESSION['enablesuccess'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 green darken-3\">\n";
                    echo "".$_SESSION['enablesuccess']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }

                if (isset($_SESSION['enableerror'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 red darken-3\">\n";
                    echo "". $_SESSION['enableerror']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
                ?> 
        </div>
        <div class="row">
            <div class="col s12 m12 l10 xl10 offset-l1 offset-xl1">
                <table class="userstable responsive-table z-depth-4">
                    <thead>
                        <tr>
                            <th class="center-align">ID</th>
                            <th class="center-align">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_admin";
                            $result = mysqli_query($connection , $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $counter = 0;
                                while($usernameData = mysqli_fetch_assoc($result)) {
                                    
                                    echo "\t\t\t<tr>";
                                    echo "\t\t\t\t<td class=\"center-align\">". $usernameData['ID']."</td>\n";
                                    echo "\t\t\t\t<td class=\"center-align\">". $usernameData['username']."</td>\n";
                                    echo "\t\t\t</tr>\n";
                                    $counter++;
                                }
                            }
                        ?>     
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <h4 style="font-size:1.5em !important" class="col s12 m12 centeronmobile   center-align fontsize">Deactivated Accounts</h4>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l10 xl10 offset-l1 offset-xl1">
                <table class="responsive-table userstable  z-depth-4">
                    <thead>
                        <tr>
                            <th class="center-align">ID</th>
                            <th class="center-align">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_admin_disable";
                            $result = mysqli_query($connection , $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $counter = 0;
                                while($usernameData = mysqli_fetch_assoc($result)) {
                                    
                                    echo "\t\t\t<tr>";
                                    echo "\t\t\t\t<td class=\"center-align\">". $usernameData['id']."</td>\n";
                                    echo "\t\t\t\t<td class=\"center-align\">". $usernameData['username']."</td>\n";
                                    echo "\t\t\t</tr>\n";
                                    $counter++;
                                }
                            }
                        ?>     
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="container">
              <?php
                for ($i=0; $i < 5 ; $i++) { 
                    echo "<div class=\"row\ removemobile\">\n";
                    echo "<div class=\"col s12 m12 xl12 l12\"></div>\n";
                    echo "</div>\n";                            
                }
            ?>
            <div class="row">
                <div class="col s12 m12 l12 x12"></div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 x12"></div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 x12"></div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 x12"></div>
            </div>  
           <div class="row">
               <form class="col s12 m12 xl3 l3" action="editaccount.php" method="post">
                    <div class="input-field col s12 m12 xl5 l5 removemobile">
                        <div class="row">
                            <button  name="editaccount" class="btn waves-light col s12 m12 l12 xl12 accountbtn" id="edit" type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 xl6 l6 offset-l1 offset-xl1">
                        <input placeholder="ID" class="center-align tooltipped" name="editid" id="editid" data-position="top" data-delay="50" data-tooltip="Select id" type="text" required>
                    </div>
                    <div class="input-field col s6 m6 offset-s3 offset-m3 xl5 l5 showmobile">
                        <div class="row">
                            <button  name="editaccount" class="btn waves-light waves-effect  col  s12 m12 l12 xl12 accountbtn"  id="edit" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
                <form class="col s12 m12 xl3 l3" action="enableaccount.php" method="post">
                    <div class="input-field col s6 m6 offset-s3 offset-m3 xl5 l5 removemobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect  col s12 m12 l12 xl12 accountbtn" name="enableaccount"  id="enable" type="submit">Enable</button>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 xl6 l6  offset-l1 offset-xl1">
                        <input placeholder="ID" class="center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Select id" name="enableid" id="enableid" type="text" required>
                    </div>
                    <div class="input-field col s6 m6 offset-s3 offset-m3 xl5 l5 showmobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect  col s12 m12 l12 xl12 accountbtn" name="enableaccount"  id="enable" type="submit">Enable</button>
                        </div>
                    </div>
               </form>
               <form class="col s12 m12 xl3 l3" action="disableaccount.php" method="post">
                    <div class="input-field col s6 m6 xl5 l5 removemobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect col s12 m12 l12 xl12 accountbtn" name="disableaccount" id="disable" type="submit">Disable</button>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 xl6 l6  offset-l1 offset-xl1">
                        <input placeholder="ID" class="center-align tooltipped" name="disableid" data-position="top" data-delay="50" data-tooltip="Select id" id="disableid" type="text" required>
                    </div>
                    <div class="input-field col s6 m6 offset-s3 offset-m3 xl5 l5 showmobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect  col s12 m12 l12 xl12 accountbtn" name="disableaccount" id="disable" type="submit">Disable</button>
                        </div>
                    </div>
               </form>
               <form class="col s12 m12 xl3 l3" action="deleteaccount.php" method="post">
                    <div class="input-field col s6 m6 xl5 l5 removemobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect  col s12 m12 l12 xl12 accountbtn" name="deleteaccount"  id="delete" type="submit">Delete</button>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 xl6 l6  offset-l1 offset-xl1">
                        <input placeholder="ID" class="center-align tooltipped" name="deleteid" data-position="top" data-delay="50" data-tooltip="Select id" id="deleteid" type="text" required>
                    </div>
                    <div class="input-field col s6 m6 offset-s3 offset-m3 xl5 l5 showmobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect  col s12 m12 l12 xl12 accountbtn" name="deleteaccount"  id="delete" type="submit">Delete</button>
                        </div>
                    </div>
               </form>
           </div>
        </div>
    </main>
  
    <!-- for development javascript file -->
    <!-- <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script> -->

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>

    <script src="../js/main.js" type="text/javascript"></script>
</body><?php 
    mysqli_close($connection); 
    $_SESSION['accountdeletesuccess'] = null;
    $_SESSION['accountdeleteerror'] = null;
    $_SESSION['accounteditsuccess'] = null;
    $_SESSION['accountediterror'] = null;
    $_SESSION['disablesuccess'] = null;
    $_SESSION['disableerror'] = null;
    $_SESSION['enablesuccess'] = null;
    $_SESSION['enableerror'] = null;
    // $_SESSION['accountdisablesuccess'] = null;
    // $_SESSION['accountdisableerror'] = null;
    ?>
</html>