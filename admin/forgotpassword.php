<?php require "connection.php"; ?>
<?php
    session_start();
    $_SESSION['loginerror'] = 0;
    unset($_SESSION['passwordattempt']);
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:dashboard.php?admin");
    }
    $username = null;
    $hashed_newpass = null;
    $hashed_confirmpass = null;
    $_SESSION['securityQuestionval'] = null;
    $answer = null;
    $usernameQuery = array();
    $pinQuery = array();
    $usernameCounter = 0;
    $_SESSION['Prevensql'] = null;
    $pinCounter = 0;
    $usernameFind = null;
    $salt  = '$2a$07$usesomassodosrkeoaol1e35958kdafir1rsalt$';
    $userCredentials = array("username" => null , "pin" => null);
    function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }
    //session_unset();
    // //auto redirect to dashboard if you already login
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        header("Location: dashboard.php");
         mysqli_close($connection);
        die();
    }
    
    if (isset($_POST['loginforgot'])) {
        
         if (isset($_POST['username']) && !empty($_POST['username'])) {
            $usernameSanitized = sanitizedData($_POST['username']);
            $username = mysqli_escape_string($connection , $usernameSanitized);
            $sql = "SELECT username FROM tbl_admin";
            $resultQuery = mysqli_query($connection , $sql);
            if (mysqli_num_rows($resultQuery) > 0) {
                while ($usernamerow = mysqli_fetch_assoc($resultQuery)){
                    array_push($usernameQuery, $usernamerow['username']);
                }
                $i = 0;
                while ($i < count($usernameQuery)) {
                    # code...
                    if ($usernameQuery[$i] == $username) {
                        $userCredentials['username'] = $usernameQuery[$i];
                        //$_SESSION['username'] = $userCredentials['username'];
                        break;
                    } 
                    $i++;
                }
                if (!isset($userCredentials['username'])) {
                    $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Looks like your username did not match!</strong></span>\n";
                    header("location:forgotpassword.php");
                    die();
                }
            }
        }
        
        if (isset($_POST['securityquestion']) && !empty($_POST['securityquestion']))  {
            $securityValue = sanitizedData($_POST['securityquestion']);
            $_SESSION['securityQuestionval'] = mysqli_real_escape_string($connection , $securityValue);


            if ($_SESSION['securityQuestionval'] == 1) {
                if (isset($_POST['answer']) && !empty($_POST['answer'])) {
                    $answerValue = sanitizedData($_POST['answer']);
                    $answerpreventSql = mysqli_real_escape_string($connection ,$answerValue);
                    $sql = "SELECT year FROM tbl_admin";
                    $result = mysqli_query($connection , $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $year = $rows['year'];
                    }
                    if ($answerpreventSql === $year) {
                        $answer = true;
                    } elseif ($answerpreventSql !== $year) {
                        $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Wrong answer!</strong></span>\n";
                        header("location:forgotpassword.php");
                        die();
                    }
                }
                $_SESSION['securityQuestionval'] = null;
            } elseif ($_SESSION['securityQuestionval'] == 2) {
                 if (isset($_POST['answer']) && !empty($_POST['answer'])) {
                    $answerValue = sanitizedData($_POST['answer']);
                    $answerpreventSql = mysqli_real_escape_string($connection ,$answerValue);
                    $sql = "SELECT color FROM tbl_admin";
                    $result = mysqli_query($connection , $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $color = $rows['color'];
                    }
                    if ($answerpreventSql === $color) {
                        $answer = true;
                    } elseif ($answerpreventSql !== $color) {
                        $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Wrong answer!</strong></span>\n";
                        header("location:forgotpassword.php");
                        die();
                    }
                }
                $_SESSION['securityQuestionval'] = null;
            } elseif ($_SESSION['securityQuestionval'] == 3) {
                if (isset($_POST['answer']) && !empty($_POST['answer'])) {
                    $answerValue = sanitizedData($_POST['answer']);
                    $answerpreventSql = mysqli_real_escape_string($connection ,$answerValue);
                    $sql = "SELECT pet FROM tbl_admin";
                    $result = mysqli_query($connection , $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $pet = $rows['pet'];
                    }
                    if ($answerpreventSql === $pet) {
                        $answer = true;
                    } elseif ($answerpreventSql !== $pet) {
                        $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Wrong answer!</strong></span>\n";
                        header("location:forgotpassword.php");
                        die();
                    }
                }
                $_SESSION['securityQuestionval'] = null;
            } elseif ($_SESSION['securityQuestionval']) {
                $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Invalid Security Question!</strong></span>\n";
                header("location:forgotpassword.php");
                die();
            }
         
        } elseif (!isset($_POST['securityquestion']) && empty($_POST['securityquestion'])) {
            $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Select Security Question!</strong></span>\n";
            $_SESSION['securityQuestionval'] = null;
            header("location:forgotpassword.php");
            die();
        }
       

        if (isset($_POST['newpassword']) && !empty($_POST['newpassword'])) {
            $newpassword = sanitizedData($_POST['newpassword']);
            $preventSQLInjection = mysqli_escape_string($connection , $newpassword);

            if (preg_match('/\s/' , $preventSQLInjection)) {
                $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Invalid Password!</strong></span>\n";
                header("location:forgotpassword.php");
                die();
            } elseif (!preg_match('/^\s$/', $preventSQLInjection)) {
                if (strlen($preventSQLInjection) < 8) {
                    $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Minimum length of characters is 8!</strong></span>\n";
                    header("location:forgotpassword.php");
                    die();
                } elseif (strlen($preventSQLInjection) >= 8) {
                    $hashed_newpass = crypt($preventSQLInjection , $salt);
                }
            }
        }

        if (isset($_POST['confirmpassword']) && !empty($_POST['confirmpassword'])) {
            $confirmpassword = sanitizedData($_POST['confirmpassword']);
            $preventSQLInjection = mysqli_escape_string($connection , $confirmpassword);

            if (preg_match("/\s/" , $preventSQLInjection)) {
                $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Invalid Password!</strong></span>\n";
                header("location:forgotpassword.php");
                die();
            } elseif (!preg_match("/\s/", $preventSQLInjection)) {
                if (strlen($preventSQLInjection) < 8) {
                    $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Minimum length of characters is 8!</strong></span>\n";
                    header("location:forgotpassword.php");
                    die();
                } elseif (strlen($preventSQLInjection) >= 8) {
            
                    $hashed_confirmpass = crypt($preventSQLInjection, $salt);
            
                    if ($hashed_newpass !== $hashed_confirmpass) {
                        $_SESSION['forgoterror'] = "<span><strong class=\"white-text\">Password Didn't match!</strong></span>\n";
                        header("location:forgotpassword.php");
                        die();
                    }
                }
            }
        }
        if (isset($userCredentials['username']) && isset($hashed_newpass) && isset($hashed_confirmpass) && isset($answer)) {
            $sql ="SELECT ID FROM tbl_admin";
            $result = mysqli_query($connection , $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
                $id = $rows['ID'];
            }
            $sql = "UPDATE tbl_admin SET password = '$hashed_confirmpass' WHERE ID = " .$id;
    
            mysqli_query($connection , $sql);
            $_SESSION['recoveredsuccess'] = "<span><strong class=\"white-text\">Password successfully updated!</strong></span>\n";
            header("location:login.php");
            die();
        }
    } 
   
    mysqli_close($connection);
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
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon"/>
    <title>Admin | Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen , projection">
    <!-- <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen , projection"> -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/logofixed.css">
    <style type="text/css">
        .select-wrapper ul li > span {
            font-weight:bold !important;
        }
        .select-wrapper ul.dropdown-content li.disabled {
            display:none !important;
        }
        .select-wrapper ul.dropdown-content li:hover {
            background-color:#795548 !important;
            
        }
        .select-wrapper ul.dropdown-content li:hover > span {
            color:white !important;
        }
    </style>
</head>
<body id="loginbackground">
    <noscript class="no-js">
       <div class="row">
           <div class="col s12 m12 l12 xl12">
               <h1 class="center-align">Please enable javascript on your web browser!</h1>
                <p class="center-align">Our website will not function correctly if javascript is disabled.</p>
           </div>
       </div>
    </noscript>
    <div class="container">
        <div class="row">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row removeonmedium">
            <div class="col s12 l12 m12 xl12"></div>
        </div>
        <div class="row loginimg" role="coffteazonelogo">
            <div class="col l3 offset-l4 m3 offset-m4 xl3 offset-xl4 s5 offset-s3 loginlogo">
                <img src="../img/logo/cofftealogo.png"  alt="coffteazone logo"  id="logoimage">
            </div>
        </div>
        <?php
            if (isset($_SESSION['forgoterror'])) {
                echo "<div class=\"row\">\n";
                    echo "<div class=\"col s12 m6 offset-m3 l6 offset-l3 xl6 offset-xl3 card-panel red darken-3\">\n";
                        echo "<p class=\"center-align\"><strong class=\"white-text\" >". $_SESSION['forgoterror']."</strong></p>\n";
                        echo "<p class=\"center-align\"><strong class=\"white-text\" >Please try again.</strong></p>\n";
                    echo "</div>\n";
                echo "</div>\n";
                $_SESSION['forgoterror'] = null;
            }
        ?>
    </div>
    <div class="row col s12 m12 l12 xl12">
        <div class="container">
            <div class="container">
                <form class="col s12 m12 l12 x12" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <div class="input-field col s12 m12 l12 xl12">
                        <input id="username" autocomplete="off" role="username" type="text" class="center-align black-text"  required name="username" class="validate">
                        <label for="username" class="white-text">Username</label>
                    </div>
                    <div class="input-field col s12 l12 m12 xl12">
                        <select name="securityquestion">
                            <option value="" id="displaynone" disabled selected></option>
                            <option value="1"><b>What is your birthyear?</b></option>
                            <option value="2"><b>What is your favorite color?</b></option>
                            <option value="3"><b>What is your pet's name?</b></option>
                        </select>
                        <label class="white-text" style="font-size:1rem !important">Recovery Question</label>
                    </div>
                    <div class="input-field col s12 m12 l12 xl12">
                        <input id="answer" autocomplete="off" role="answer" type="text" class="center-align black-text"  required name="answer" class="validate">
                        <label for="answer" class="white-text">Answer</label>
                    </div>
                    <div class="input-field col s12 m12 l12 xl12">
                        <input id="newpassword" autocomplete="off" role="newpassword" type="password" class="center-align black-text"  required name="newpassword" class="validate">
                        <label for="newpassword" class="white-text">New Password</label>
                    </div>
                    <div class="input-field col s12 m12 l12 xl12">
                        <input id="confirmpassword" autocomplete="off" role="confirmpassword" type="password" class="center-align black-text"  required name="confirmpassword" class="validate">
                        <label for="confirmpassword" class="white-text">Confirm Password</label>
                    </div>
                    <div class="input-field col s12 m12 l12 xl12">
        
                        <div class="row">
                            <div class="col s12 l12 m12 xl12"></div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <div class="row">
                                    <button role="login" id="submitbutton" class="waves-effect brown darken-3 waves-light btn col s12 m12 l12 xl12" type="submit" name="loginforgot">Login</button>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </form>
            </div>
        </div>
    </div>
    <!-- for development javascript file -->
    <!-- <script  type="text/javascript" src="../js/jquery.min.js"></script>
    <script  type="text/javascript" src="../js/materialize.min.js"></script> -->

    <!-- for production ready javascript file -->
    <!-- uncomment all the script for production used -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js" type="text/javascript"></script>
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/validation.js" type="text/javascript"></script>
</body>
</html>