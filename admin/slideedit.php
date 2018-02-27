<?php require "connection.php";?>
<?php
    session_start();
    //require_once "sessiontimeout.php";

     if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("location:login.php");
    }
    $sqlInjectionPrevention = false;
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if($_SERVER['REQUEST_METHOD'] === "POST") {

        if (isset($_POST['editslider'])) {

            if (isset($_POST['sliderid'])) {
                if (!filter_var($_POST['sliderid'], FILTER_VALIDATE_INT)) {
                    $_SESSION['sliderediterror'] = "<span><strong class=\"white-text\">Enter valid Slider id!</strong></span>\n";
                    header("location:slideredit.php");
                    die;
                }  else if (filter_var($_POST['sliderid'], FILTER_VALIDATE_INT)){
                    $slider = sanitizedData($_POST['sliderid']);
                    $sqlInjectionPrevention = mysqli_escape_string($connection , $slider);
            

                    $sql = "SELECT * FROM tbl_slider WHERE id =". $sqlInjectionPrevention;
                    $_SESSION['sliderconfirm'] = $sqlInjectionPrevention;
                    $result = mysqli_query($connection , $sql);
                     if (mysqli_num_rows($result) <= 0) {
                        
                        $_SESSION['sliderediterror'] = "<span><strong class=\"white-text\">Slider id is not available!</strong></span>\n";
                        header("location:slideredit.php");
                        die();
                    }
                     while($row = mysqli_fetch_assoc($result)) {
                        $displaydescription = $row['description'];
                        $displayimg = $row['img'];
                        $displaypath = $row['path'];
                        
                    }
                }
            } else {
                $_SESSION['sliderediterror'] = "<span><strong class=\"white-text\">Select and slider id!</strong></span>\n";
                    header("location:slideredit.php");
                    die();
            }
        } else {
             $_SESSION['sliderediterror'] = "<span><strong class=\"white-text\">Select and slider id!</strong></span>\n";
             header("location:slideredit.php");
                die();
        }
    } else {
        header("location:slideredit.php");
        die();
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
    <title>Slide Settings</title>
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
       <!-- show this on mobile and remove the above form -->
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
        <div class="row showontabletseperator"><div class="col s12 m12 l12 xl12"></div></div>
       
        <div class="container slidereditshowmobile">
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                     <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <table class="filtertable responsive-table">
                                    <thead>
                                        <th>imagename</th>
                                        <th>picture</th>
                                        <th>description</th>
                                    </thead>
                                    <tbody>
                                        <td><?php echo $displayimg;?></td>
                                        <td><?php echo "<img width=\"75px\" height=\"50px\" src=\"../".$displaypath."\">";?></td>
                                        <td><?php echo $displaydescription;?></td>
                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l12 xl12">
                    <?php
                         if(isset($_SESSION['slideruploaderror'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align red darken-3\">".$_SESSION['slideruploaderror']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['slideruploaderror'] = null;
                        }
                        if (isset($_SESSION['uploadsuccess'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align green darken-3\">".$_SESSION['uploadsuccess']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['uploadsuccess'] =null;
                        }

                        if (isset($_SESSION['sliderediterror'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align red darken-3\">".$_SESSION['sliderediterror']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['sliderediterror'] = null;
                        }
                        if (isset($_SESSION['slidereditsuccess'])) {
                            echo "<div class=\"col s12 m12 xl12 m12\">\n";
                            echo "<p class=\"center-align green darken-3\">".$_SESSION['slidereditsuccess']."</p>\n";
                            echo "</div>\n";
                            $_SESSION['slidereditsuccess'] = null;
                        }
                    ?>
                </div>
            </div>
          
            <div class="row">
                <form class="col s12 m12 l12 xl12" method="POST" action="slidereditconfirm.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="file-field input-field col s12 m12 l12 xl12">
                            <div class="btn">
                                <span>upload image</span>
                                <input type="file" name="uploadimageupdate">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 xl12">
                            <textarea data-length="100" maxlength="100" id="slidereditdecription" name="slidereditdecription" class="materialize-textarea"></textarea>
                            <label for="slidereditdecription">Description</label>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-field col s12 m12 l12 xl12">
                            <button type="submit" name="slidersubmit"  class="btn waves-light waves-effect brown darken-3">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      
       <div class="container sliderremovemobile">

            <div class="container">
                 <div class="row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m12 l12 xl12">
                                    <table class="filtertable responsive-table">
                                        <thead>
                                            <th>imagename</th>
                                            <th>picture</th>
                                            <th>description</th>
                                        </thead>
                                        <tbody>
                                            <td><?php echo $displayimg;?></td>
                                            <td><?php echo "<img width=\"75px\" height=\"50px\" src=\"../".$displaypath."\">";?></td>
                                            <td><?php echo $displaydescription;?></td>
                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l12 xl12">
                        <?php
                            if(isset($_SESSION['slideruploaderror'])) {
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align red darken-3\">".$_SESSION['slideruploaderror']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['slideruploaderror'] = null;
                            }
                            if (isset($_SESSION['uploadsuccess'])) {
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align green darken-3\">".$_SESSION['uploadsuccess']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['uploadsuccess'] = null;
                            }

                            if (isset($_SESSION['sliderediterror'])) {
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align red darken-3\">".$_SESSION['sliderediterror']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['sliderediterror'] = null;
                            }
                            if (isset($_SESSION['slidereditsuccess'])) {
                                echo "<div class=\"col s12 m12 xl12 m12\">\n";
                                echo "<p class=\"center-align green darken-3\">".$_SESSION['slidereditsuccess']."</p>\n";
                                echo "</div>\n";
                                $_SESSION['slidereditsuccess'] = null;
                            }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <form class="col s12 m12 l12 xl12" method="POST" action="slidereditconfirm.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="file-field input-field col s12 m12 l12 xl12">
                                <div class="btn">
                                    <span>upload image</span>
                                    <input type="file" name="uploadimageupdate">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="input-field col s12 m12 l12 xl12">
                                <textarea data-length="100"  maxlength="100" id="slidereditdecription" name="slidereditdecription" class="materialize-textarea"></textarea>
                                <label for="slidereditdecription">Description</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <button type="submit" name="slidersubmit"  class="btn waves-light waves-effect brown darken-3">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
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

</body>

</html>


