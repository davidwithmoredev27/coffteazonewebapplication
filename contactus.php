<?php 
    require "admin/connection.php";
    session_start();

    $_SESSION['timeZone'] = null;
    $_SESSION['clientIP'] = null;
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
        $_SESSION['clientIP'] = $clientIp;
    }

    function GetDateAndTime() {
        GetClient();
        $clientipaddress = $_SESSION['clientIP'];
        if (ini_get('allow_url_fopen')) {
            $details = json_decode(file_get_contents("http://ip-api.com/json/{$clientipaddress}") ,true);
            @$timeZone = $details['timezone'];
            $_SESSION['timeZone'] = $timeZone;
        }
    }
    $nameValid = null;
    $emailValid = null;
    $messageValid = null;
    
    if (isset($_POST['Submit'])) {

        if (isset($_POST['name'])) {
            $name = sanitizedData($_POST['name']);
            $preventSQLInjection = mysqli_escape_string($connection ,$name);
            if (strlen($preventSQLInjection) > 100)  {
                $_SESSION['contactuserror'] = "<b>Maximum name characters is 100!</b>\n";
                header("location:contactus.php");
                die();
            } elseif (strlen($preventSQLInjection) <= 100) {
                 if (preg_match('/^[0-9]/' , $preventSQLInjection)) {
                    $_SESSION['contactuserror'] = "<b>Your name is invalid because the first Character is a number!</b>\n";
                    header("location:contactus.php");
                    die();
                } elseif (!preg_match('/^[0-9]/' , $preventSQLInjection)) {
                    $nameValid = $preventSQLInjection;   
                }
            }
        }

        if (isset($_POST['email'])) {
            $email = sanitizedData($_POST['email']);
            $preventSQLInjection = mysqli_escape_string($connection , $email);
            if (filter_var($preventSQLInjection , FILTER_VALIDATE_EMAIL)) {
                if (strlen($preventSQLInjection) > 50) {
                    $_SESSION['contactuserror'] = "<b>Maximum email characters is 50!</b>\n";
                        header("location:contactus.php");
                        die();
                } elseif (strlen($preventSQLInjection) <= 50) {
                    if (preg_match('/(^\d|\s)|^\s$/' , $preventSQLInjection)) {
                        $_SESSION['contactuserror'] = "<b>Please put a valid email address!</b>\n";
                        header("location:contactus.php");
                        die();
                    } elseif (!preg_match('/(^\d|\s)|^\s$/' , $preventSQLInjection)) {
                        $emailValid = $preventSQLInjection;
                    }
                }
                 
            } elseif (!filter_var($preventSQLInjection , FILTER_VALIDATE_EMAIL)) {
                $_SESSION['contactuserror'] = "<b>Please put a valid email address!</b>\n";
                header("location:contactus.php");
                die();
            }
        }

        if (isset($_POST['message'])) {
            $message = sanitizedData($_POST['message']);
            $preventSQLInjection = mysqli_escape_string($connection , $message);
            if (strlen($preventSQLInjection) > 1000) {
                $_SESSION['contactuserror'] = "<b>Maximum Message characters is 1000!</b>\n";
                 header("location:contactus.php");
                die();
            } elseif (strlen($preventSQLInjection) <= 1000) {
                $messageValid = $preventSQLInjection;
            }
        }

        if (isset($_POST['contactno'])) {
            $contactnumber = sanitizedData($_POST['contactno']);
            $preventSQLInjection = mysqli_escape_string($connection , $contactnumber);
            if (strlen($preventSQLInjection) > 20) {
                $_SESSION['contactuserror'] = "<b>Maximum number characters is 20!</b>\n";
                header("location:contactus.php");
                die();
            } elseif (strlen($preventSQLInjection) <= 20) {
                $contactnoValid = $preventSQLInjection;
            }
        }
    }
    if (isset($nameValid) && isset($email) && isset($messageValid)) {
        GetDateAndTime();
        $timezone = $_SESSION['timeZone'];
        @date_default_timezone_set($timezone);
        $timeCreated = date('Y/m/d h:i:sa');
        $sql = "INSERT INTO tbl_feedback(name, email , phone , message , dateandtime)".
                "VALUES('$nameValid' , '$emailValid' , '$contactnoValid' , '$messageValid','$timeCreated')";
        //die($sql);
        mysqli_query($connection , $sql);
        $_SESSION['contactussuccess'] = "<b>Your Feedback Successfully sent!</b>\n";
        header("location:contactus.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo/favicon.ico" type="image/x-icon"/>
    <title>Contact Us | Coffteazone</title>
    <meta property="og:url" content="http://coffteazone.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="coffteazone Cavite City">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/paddingfixed.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        .indicator-item:active {
            background-color:red;
        }
        .menutitle {
            padding-left:30px;
        }
        .titlecontactus {
            font-size:1.2em !important;
            font-weight:bold;
        }
        .border {
            background-color:rgba(255 , 255 ,255 ,0.6);
            box-shadow:0px 0px 15px #000;
            color:black;
        }
        label {
            color:#26a69a !important;
            font-size:1.5em !important;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: black;
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: black;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            color: black;
        }
    </style>
</head>
<body>
   <header>
        <nav class="brown darken-4">
            <div class="nav-wrapper z-depth-5">
                <a href="index.php"  class="brand-logo uplogo" role="coffteazonelogo">
                    <img src="img/logo/cofftealogo.png" width="100px" height="100px" alt="">
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">             
                    <li class="white-text"><a href="index.php" style="color:brown;">HOME</a></li>
                    <li class="white-text" id="showdropdown"><a href="menu.php">OUR MENU</a>
                         <div id="megadropdown" style="height:400px;left:-1px;" class="row" role="coffteazonemenu">
                            <div class="dropdowndevider col l3 xl3 offset-l1 offset-xl1">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Foods</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12"><a href="menu/starter.php">Starter</a></li>
                                        <li class="col l12 xl12"><a href="menu/burger_and_sandwiches.php">Burger and Sandwiches</a></li>
                                        <li class="col l12 xl12"><a href="menu/pizza.php">Pizza</a></li>
                                        <li class="col l12 xl12"><a href="menu/soup.php">Soup</a></li>
                                        <li class="col l12 xl12"><a href="menu/maincourse.php">Main Course</a></li>
                                        <li class="col l12 xl12"><a href="menu/groupmeals.php">Group Meals</a></li>
                                        <li class="col l12 xl12"><a href="menu/platter.php">Platter</a></li>
                                        <li class="col l12 xl12"><a href="menu/pasta.php">Pasta</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col l4 xl4 offset-l1 offset-xl1">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Drinks</h3>
                                </div>
                                <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li class="col l12 xl12"><a href="menu/signaturedrinks.php">Signature Drinks</a></li>
                                        <li class="col l12 xl12"><a href="menu/italliansoda.php">Italian Soda</a></li>
                                        <li class="col l12 xl12"><a href="menu/fruittea.php">Fruit Tea</a></li>
                                        <li class="col l12 xl12"><a href="menu/hotdrinks.php">Hot Drinks</a></li>
                                        <li class="col l12 xl12"><a href="menu/icedcoffee.php">Iced Coffee</a></li>
                                        <li class="col l12 xl12"><a href="menu/frappucino.php">Frappucino</a></li>
                                        <li class="col l12 xl12"><a href="menu/yakultdrinks.php">Yakult Drinks</a></li>
                                        <li class="col l12 xl12"><a href="menu/milktea.php">Milk Tea</a></li>
                                        <li class="col l12 xl12"><a href="menu/smoothies.php">Smoothies</a></li>
                                        <li class="col l12 xl12"><a href="menu/cocktails.php">Cocktails</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="dropdowndevider col xl1 l1">
                                <div class="col l12 xl12 menutitle">
                                    <h3>Desserts</h3>
                                </div>
                                 <nav class="dropdowndishcategory col l12 xl12">
                                    <ul>
                                        <li><a href="menu/muffins">Muffins</a></li>
                                        <li><a href="menu/cakes.php">Cakes</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </li>
                    <li class="white-text"><a href="services.php">SERVICES</a></li>
                    <li class="white-text"><a href="gallery.php">GALLERY</a></li>
                    <li class="white-text"><a href="aboutus.php">ABOUT US</a></li>
                    <li class="white-text"><a href="faq.php">FAQ'S</a></li>
                    <li class="white-text"><a href="contactus.php">CONTACT US</a></li>
                </ul>
                 <ul class="side-nav brown darken-3" id="mobile-demo">
                    <li><a style="color:brown;" href="index.php">HOME</a></li>
                    <li><a class="white-text" href="menu.php">OUR MENU</a></li>
                    <li><a class="white-text" href="services.php">SERVICES</a></li>
                    <li><a class="white-text" href="gallery.php">GALLERY</a></li>
                   <li><a class="white-text" href="aboutus.php">ABOUT US</a></li>
                    <li><a class="white-text" href="faq.php">FAQ'S</a></li>
                    <li><a class="white-text" href="contactus.php">CONTACT US</a></li>
                </ul>
            </div> 
        </nav>

    </header>

    <!-- Feedback Form -->
    <main>
        <?php
            $sql = "SELECT * FROM tbl_contact_details";

            $result = mysqli_query($connection , $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
                $CurrentAddress = $rows['address'];
                $mobileone = $rows['mobileone'];
                $telephone = $rows['telephone'];
                $mobiletwo = $rows['mobiletwo'];
                $currentemail = $rows['email'];
            }
        ?>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 m12 l4 xl4 offset-l1 offset-xl1 border">
                <div class="row">
                    <?php
                        if(isset($_SESSION['contactuserror'])) {
                            echo "\t\t\t\t\t\t\t<div class=\" red darken-3 col s12 m12 l12 xl12 feedbackerrormessage\">\n".
                                 "\t\t\t\t\t\t\t\t<p class=\"white-text\">".$_SESSION['contactuserror']."</p>\n".
                                 "\t\t\t\t\t\t</div>\n";
                            $_SESSION['contactuserror'] = null;
                        }
                        if (isset($_SESSION['contactussuccess'])) {
                             echo "\t\t\t\t\t\t\t<div class=\"green darken-3 col s12 m12 l12 xl12 feedbacksuccessmessage\">\n".
                                 "\t\t\t\t\t\t\t\t<p class=\"white-text\">".$_SESSION['contactussuccess']."</p>\n".
                                 "\t\t\t\t\t\t</div>\n";
                            $_SESSION['contactussuccess'] = null;
                        }   
                    ?>
                </div>
                <div class="row">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12"></div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12"></div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12"></div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input style="font-size:.9em !important" required autocomplete="off" type="text" placeholder="Enter your name!" name="name" id="mailname" maxlength="100">
                                <label for="mailname"><b>Name:</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 x12">
                                <input type="email" required autocomplete="off" style="font-size:.9em !important" placeholder="Enter your email!" name="email" id="email" maxlength="50">
                                <label for="email"><b>Email:</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 x12">
                                <input type="text" autocomplete="off" style="font-size:.9em !important" placeholder="Enter your mobile number!" name="contactno" id="contactno" maxlength="20">
                                <label for="contactno"><b>Phone:</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 x12">
                                <textarea name="message" required autocomplete="off" style="font-size:.9em !important" placeholder="Write your feedback here!" id="message" maxlength="1000" class="materialize-textarea"></textarea>
                                <label for="message"><b>Message:</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6 xl6 offset-l4 offset-xl4">
                                <button type="submit" name="Submit" class="btn waves-light waves-effect">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12 m12 l4 xl4 offset-l2 offset-xl2 border">
                <div class="row">
                    <div class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <h3 class="center-align titlecontactus" style="font-size: 1em important!" >Address</h3>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                                <address class="center-align"><?php echo $CurrentAddress; ?></address>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <h3 class="center-align titlecontactus" style="font-size: 1em important!">Contact Number</h3>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                                <p class="center-align">Telephone: <?php echo $telephone;?></p>
                                <p class="center-align">Mobile: <?php echo $mobileone ."/" .$mobiletwo; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <h3 class="center-align titlecontactus">Email address</h3>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                               <p class="center-align">Email: <?php echo $currentemail; ?></p>
                            </div>
                        </div>
                    </div>
                     <div class="col s12 m12 l12 xl12">
                            <div class="col s12 m12 l12 xl12">
                                <h3 class="center-align titlecontactus">Operating Time</h3>
                            </div>
                            <div class="col s12 m12 l12 xl12">
                               <p class="center-align" style="font-size:.9em">Cofftea Zone: Monday to Sunday 11:00 AM to 12:00 AM</p>
                               <p class="center-align" style="font-size:.9em">Martinaz: Monday to Sunday 9:00 AM to 12:00 AM</p>
                               <p class="center-align" style="font-size:.9em">KTV Bar: Monday to Sunday 9:00 AM to 12:00 AM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col s12 m12 l12 xl12">
                <iframe
                    width="100%"
                    height="300px"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDlctK8KGs8NrfnkK_qAnY89c2PZDVx-HU&q=Cofftea+Zone&zoom=17&maptype=satellite" allowfullscreen>
                </iframe>
            </div>
        </div>
    </main>
    <?php 
        $sql = "SELECT * FROM tbl_contact_details";
        $result = mysqli_query($connection , $sql);
        
        while ($rows = mysqli_fetch_assoc($result)) {
            $address = $rows['address'];

        }
    
    ?>
    <footer  class="page-footer brown darken-4">
        <div class="row">
            <span class="col s12 m12 l4 xl4 offset-xl1 offset-l1">&copy; <?php echo htmlspecialchars(date("Y")) . " "."Coffteazone";?></span>
            <span class="col s12 m12 xl4 l4"><?php echo $address; ?></span>
            <a href="https://www.facebook.com/CoffteaZone" class="col s12 m2 l3 xl3 center-align"><img src="img/logo/FACEBOOKLOGO.png" width="30px" height="100%" alt=""></a>
        </div>
    </footer>
    <!-- for development javascript file -->
    <script  type="text/javascript" src="js/jquery.min.js"></script>
    <script  type="text/javascript" src="js/materialize.min.js"></script>

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    <!-- 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
     -->
    <script src="js/main.js" type="text/javascript"></script>
    <script type="text/javascript">
        
    </script>

</body>
</html>