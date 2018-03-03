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
    // $idcount = 0;
    // $sql = "SELECT ID from tbl_admin";
    // $idResult = mysqli_query($connection , $sql);
    // if (mysqli_num_rows($idResult) > 0) {
    //     while ($idrrow = mysqli_fetch_assoc($idResult)) {
    //         $_SESSION['accountedit'][$idcount] = $idrrow['ID'];
    //         $idcount++;
    //     }
    // }
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
    <title>Admin Filter Page</title>
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
    <!-- <div id="editModal" class="modal">
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
    </div> -->
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
                <a href="dashboard.php" class="center-align"><img src="../img/logo/cofftealogo.png"  width="80px" height="80px" srcset=""></a>
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
        <div class="row">
            <div class="col s12 m12 l12 xl12">   
                <nav class="removebreadcrumbsstyle">
                    <div class="nav-wrapper">
                        <div class="col s12 m12 l12 xl12">
                            <a href="#!" class="breadcrumb">Authetication</a>
                            <a href="#!" class="breadcrumb">Filter</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="header">
                <h4 class="center-align">Requests</h4>
            </div>
            <?php
                if (isset($_SESSION['accountacceptsuccess'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 green darken-3\">\n";
                    echo "".$_SESSION['accountacceptsuccess']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }

                if (isset($_SESSION['accountaccepterror'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 red darken-3\">\n";
                    echo "". $_SESSION['accountaccepterror']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
                if (isset($_SESSION['accountrevokesuccess'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 green darken-3\">\n";
                    echo "".$_SESSION['accountrevokesuccess']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
                if (isset($_SESSION['accountrevokeerror'])) {
                    echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m12 l6 xl6 red darken-3\">\n";
                    echo "". $_SESSION['accountrevokeerror']."";
                    echo "</div>\n";
                    echo "</div>\n";
                }
                ?> 
                 <table class="bordered responsive-table filtertable">
                    <thead>
                        <tr>
                            <th class="left-align">ID</th>
                            <th class="left-align">Username</th>
                            <th class="left-align">Platform</th>
                            <th class="left-align">Created</th>
        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_filter";
                            $result = mysqli_query($connection , $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $counter = 0;
                                while($requestData = mysqli_fetch_assoc($result)) {
                                    
                                    echo "\t\t\t<tr>";
                                    echo "\t\t\t\t<td class=\"left-align\">". $requestData['id']."</td>\n";
                                    echo "\t\t\t\t<td class=\"left-align\">". $requestData['username']."</td>\n";
                                    echo "\t\t\t\t<td class=\"left-align\">". $requestData['platform']."</td>\n";
                                    echo "\t\t\t\t<td class=\"left-align\">". $requestData['timecreated']."</td>\n";
                                    echo "\t\t\t</tr>\n";
                                    $counter++;
                                }
                            }
                        ?>     
                </tbody>
            </table>
                <?php
                    for ($i=0; $i < 5 ; $i++) { 
                        echo "\t\t\t<div class=\"row\">\n";
                        echo "\t\t\t\t<div class=\"col s12 m12 xl12 l12\"></div>\n";
                        echo "\t\t\t</div>\n";                            
                    }
                ?>
           <div class="row">
               <form class="col s12 m12 xl6 l6" action="acceptrequest.php" method="post">
                    <div class="input-field col s12 m12 xl3 l3 removemobile">
                        <div class="row">
                            <button  name="accept" class="btn waves-light waves-effect  col s12 m12" id="accept" type="submit">Accept</button>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 xl6 l6 offset-l1 offset-xl1">
                        <input placeholder="ID" class="center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Select id" autocomplete="off" name="acceptid" id="acceptid" type="text" required>
                    </div>
                    <div class="input-field col s12 m12 xl3 l3 showmobile">
                        <div class="row">
                            <button  name="accept" class="btn waves-light waves-effect  col s12 m12" value="Accept" id="accept" type="submit">Accept</button>
                        </div>
                    </div>
               </form>
               <form class="col s12 m12 xl6 l6" action="revokerequest.php" method="post">
                    <div class="input-field col s12 m12 xl3 l3 removemobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect col s12 m12" name="revoke"  id="Revoke" type="submit">Revoke</button>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 xl6 l6  offset-l1 offset-xl1">
                        <input placeholder="ID" class="center-align tooltipped" data-position="top" data-delay="50" data-tooltip="Select id" autocomplete="off" name="revokeid" id="revokeid" type="text" required>
                    </div>
                    <div class="input-field col s12 m12 xl3 l3 showmobile">
                        <div class="row">
                            <button class="btn waves-light waves-effect  col s12 m12" name="revoke" id="Revoke" type="submit">Revoke</button>
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
                        <?php echo htmlspecialchars(date("Y")) . " "."Coffteazone";?>
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
</body><?php 
    mysqli_close($connection); 
    $_SESSION['accountacceptsuccess'] = null;
    $_SESSION['accountrevokesuccess'] = null;
    $_SESSION['accountrevokeerror'] = null;
    $_SESSION['accountaccepterror'] = null;
    ?>
</html>