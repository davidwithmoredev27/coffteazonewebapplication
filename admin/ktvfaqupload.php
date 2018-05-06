<?php require "connection.php";?>
<?php
    session_start();
    if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        mysqli_close($connection);
        header("location:login.php");
    }
   
     function sanitizedData($data) {
        $triminput  = trim($data);
        $striplashesinput = stripslashes($triminput);
        $htmlcharscape = htmlspecialchars($striplashesinput);
        $sanitizedData = $htmlcharscape;
        return $sanitizedData;
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['submitfaq'])) {
            if (isset($_POST['faqquestion'])) {
                $question = sanitizedData($_POST['faqquestion']);
                $preventSQlInjection = mysqli_real_escape_string($connection , $question);
                if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^\s/" , $preventSQlInjection)) {
                    mysqli_close($connection);
                    $_SESSION['faqerror'] = "<span><strong class=\"white-text\">Special character is invalid  as a first character!!</strong></span>\n";
                    header("location:ktvfaq.php");
                    die();
                }  elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^\s/" , $preventSQlInjection)) {
                   $questionTrue = $preventSQlInjection;
                }
            } elseif (!isset($_POST['faqquestion'])) {
                mysqli_close($connection);
                 $_SESSION['faqerror'] = "<span><strong class=\"white-text\">Add Question!</strong></span>\n";
                header("location:ktvfaq.php");
                die();
            }

            if (isset($_POST['faqanswer'])) {
                $answer = sanitizedData($_POST['faqanswer']);
                $preventSQlInjection = mysqli_real_escape_string($connection , $question);
                if (preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^\s/" , $preventSQlInjection)) {
                    mysqli_close($connection);
                    $_SESSION['faqerror'] = "<span><strong class=\"white-text\">Special character is invalid as a first character!!</strong></span>\n";
                    header("location:ktvfaq.php");
                    die();
                } elseif (!preg_match("/^[\'^£$%&*()}{@#~?><>,.|=_+¬-]|^\s/" , $preventSQlInjection)) {
                   $answerTrue = $preventSQlInjection;
                }
            } elseif (!isset($_POST['faqanswer'])) {
                mysqli_close($connection);
                 $_SESSION['faqerror'] = "<span><strong class=\"white-text\">Add Answer!</strong></span>\n";
                header("location:ktvfaq.php");
                die();
            }
            if (isset($answerTrue) && isset($questionTrue)) {
                $sql = "INSERT INTO tbl_ktvfaq(question, answer) VALUES('$questionTrue' , '$answerTrue')";
                mysqli_query($connection , $sql);
                $_SESSION['faqsuccess'] = "<span><strong class=\"white-text\">Data Successfully added!</strong></span>\n";
                header("location:ktvfaq.php");
                die();
            }
        }
    } else {
        header("location:dashboard.php");
        die();
    }

?>