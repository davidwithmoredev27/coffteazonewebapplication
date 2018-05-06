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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon" />
    <title>Admin | Feedback</title>
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
        <div class="row">
            <div class="col s12 m12 l12 xl12">   
                <nav class="removebreadcrumbsstyle">
                    <div class="nav-wrapper">
                        <div class="col s12 m12 l12 xl12">
                            <a href="#!" class="breadcrumb">Messages</a>
                            <a href="#!" class="breadcrumb">Feedback</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <h5 class="center-align">Feedback Messages</h5>
                <?php 
                    if(isset($_SESSION['feedbackerror'])) {
                        echo "<div class=\"col s12 m12 xl12 m12\">\n";
                        echo "<p class=\"center-align red darken-3\">".$_SESSION['feedbackerror']."</p>\n";
                        echo "</div>\n";
                        $_SESSION['feedbackerror'] = null;
                    }
                    if (isset($_SESSION['feedbacksuccess'])) {
                        echo "<div class=\"col s12 m12 xl12 m12\">\n";
                        echo "<p class=\"center-align green darken-3\">".$_SESSION['feedbacksuccess']."</p>\n";
                        echo "</div>\n";
                        $_SESSION['feedbacksuccess'] =null;
                    }

                ?>
            </div>
            <div class="col s12 m12 l12 xl12">
                <div class="row">
                    <div class="col s12 m12 l12 xl2">
                        <table class="responsive-table bordered feedbacktable" style="table-layout:fixed;">
                            <col class="feedbackcol">
                            <col class="feedbackcol">
                            <col class="feedbackcol">
                            <col class="feedbackcol">
                            <col class="feedbackcol">
                            <col class="feedbackcol">
                            <col class="feedbackcol">
                            <col class="feedbackcol">
                            <thead>
                                <tr>
                                    <th class="center-align">#</th>
                                    <th class="center-align">Name</th>
                                    <th class="center-align">Email</th>
                                    <th class="center-align">Phone</th>
                                    <th class="center-align">Message</th>
                                    <th class="center-align">Date &amp; Time</th>
                                    <th class="center-align" colspan="2">Options</th>
                                </tr>
                            </thead>
                            <tbody id="feedbackdata">
                                <?php    
                                    $sql = "SELECT * FROM tbl_feedback ORDER BY feedbackID DESC";
                                    $result = mysqli_query($connection , $sql);
                                    $number_of_results  = mysqli_num_rows($result);
                                    $results_per_page = 10;
                                    $number_of_pages = ceil ($number_of_results  / $results_per_page);
                                    $counter = 1;

                                    if (!isset($_GET['page'])) {
                                        $page = htmlspecialchars(1);
                                    } elseif (isset($_GET['page'])) {
                                        $page = htmlspecialchars($_GET['page']);
                                    }

                                    $this_page_first_result =  ($page - 1) * $results_per_page;

                                    $sql = "SELECT * FROM tbl_feedback ORDER BY feedbackID DESC LIMIT  ". $this_page_first_result . " , " . $results_per_page;
                                    
                                    $result = @mysqli_query($connection , $sql);
                                    while($rows = @mysqli_fetch_assoc($result)) {
                                        echo "<tr>\n";
                                        echo "<td class=\"center-align\">".$counter."</td>\n";
                                        if (strlen($rows['name']) > 12) {
                                            $name = substr($rows['name'],0,12)."...";
                                        } elseif (strlen($rows['name'] <= 12)) {
                                            $name = $rows['name'];
                                        }
                                        echo "<td class=\"center-align\">".$name."</td>\n";
                                            if (strlen($rows['email']) > 12) {
                                            $email = substr($rows['email'],0,12)."...";
                                        } elseif (strlen($rows['email'] <= 12)) {
                                            $email = $rows['email'];
                                        }
                                        echo "<td class=\"center-align\">".$email."</td>\n";
                                        if (strlen($rows['phone']) >= 7) {
                                            $phone = substr($rows['phone'] , 0 , 7)."...";
                                        }
                                        echo "<td class=\"center-align\">". $phone."</td>\n";
                                        if (strlen($rows['message']) > 35) {
                                            $message = substr($rows['message'],0,35)."...";
                                        } elseif (strlen($rows['message'] <= 35)) {
                                            $message = $rows['message'];
                                        }
                                        echo "<td class=\"center-align\">".$message."</td>\n";
                                        echo "<td class=\"center-align\">".$rows['dateandtime']."</td>\n";
                                    
                                        echo "<td class=\"center-align\">".
                                                "<form method=\"POST\" action=\"viewfeedback.php\">\n".
                                                    "<input type=\"hidden\" name=\"feedbackviewid\" value=\"".$rows['feedbackID'] . "\">\n".
                                                    "<button type=\"submit\" name=\"feedbackview\" class=\"btn waves-effect waves-light\">View</button>\n".
                                                "</form>\n".
                                            "</td>\n";
                                        echo "<td class=\"center-align\">\n".
                                                "<form method=\"POST\" action=\"deletefeedback.php\">\n".
                                                    "<input type=\"hidden\" name=\"feedbackdeleteid\" value=\"".$rows['feedbackID'] . "\">\n".
                                                    "<button type=\"submit\" name=\"feedbackdelete\" class=\"btn red darken-3 waves-effect waves-light\">Delete</button>\n".
                                                "</form>".
                                            "</td>";
                                        echo "</tr>\n";
                                        $counter++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <ul class="pagination">
                                    <?php
                                        if ($page > 10) {
                                             echo "<li class=\"waves-effect\"><a href=\"feedback.php?page=".($page - 1)."\"><i class=\"material-icons\">chevron_left</i></a></li>\n";
                                        }
                                        for ($page = 1 ; $page <= $number_of_pages; $page++) {
                                            //echo $page;
                                            echo "<li class=\"pagelink waves-effect active teal lighten-1\"><a href=\"feedback.php?page=".$page."\">".
                                            $page."</a></li>\n";
                                        }
                                        
                                    ?> 
                                </ul>
                            </div> 
                        </div>
                    </div>
                </div>
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
    <script type="text/javascript">
        (function(){

            var deleteData = function() {
                var click = document.getElementsByClassName("delete");
                for (var x = 0 ; x < click.length ; x++) {
                    click[x].addEventListener("click" , function (e) {
                        var x = confirm("Do you want To delete this data?");
                        if (!x) {
                            e.preventDefault();
                            return false;
                        }
                    } , false);
                }
            };
            var addData = function() {
                var click = document.getElementsByClassName("add");
                for (var x = 0 ; x < click.length ; x++) {
                    click[x].addEventListener("click" , function (e) {
                        var x = confirm("Do you want to add this data?");
                        if (!x) {
                            e.preventDefault();
                            return false;
                        }
                    } , false);
                }
            };

            var updateData = function() {
                var click = document.getElementsByClassName("update");
                for (var x = 0 ; x < click.length ; x++) {
                    click[x].addEventListener("click" , function (e) {
                        var x = confirm("Do you want to update this album?");
                        if (!x) {
                            e.preventDefault();
                            return false;
                        }
                    } , false);
                }
            };
            
            var Pagination = function() {
                var pageLink = document.getELementsByClassName("pagelink");
                console.log(pageLink);
                // var pageLinkLength = pageLink.length;

                // if (pageLinkLength === 1) {
                //     pageLink[0].style.margin = "0 auto !important";
                // }
            };


            window.onload  = function () {
                addData();
                deleteData();
                updateData();
                Pagination();
            };
        })();
    </script>

</body>
</html>