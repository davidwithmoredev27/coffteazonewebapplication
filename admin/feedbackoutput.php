<?php require "connection.php";?>
<?php    
    $sql = "SELECT * FROM tbl_feedback ORDER BY feedbackID DESC";
    $result = mysqli_query($connection , $sql);
    $number_of_results  = mysqli_num_rows($result);
    $results_per_page = 10;
    $number_of_pages = ceil ($number_of_results  / $results_per_page);
    $counter = 1;

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = htmlspecialchars($_GET['page']);
    }

    $this_page_first_result =  ($page - 1) * $results_per_page;

    $sql = "SELECT * FROM tbl_feedback ORDER BY feedbackID DESC LIMIT  ". $this_page_first_result . " , " . $results_per_page;
    $result = mysqli_query($connection , $sql);
    while($rows = mysqli_fetch_assoc($result)) {
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