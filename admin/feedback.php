<?php require("template/session.php"); ?>
<!DOCTYPE html>
<html>
<?php require("template/head.php"); ?>
<body>
    <?php require("template/header.php"); ?>
    <main>
        <!-- Main -->
        <div class=" row">
            <div class="col s12 m12 l12 xl12">
                <h5 class="center-align">Feedback Messages</h5>
            </div>
            <div class="col s12 m12 l12 xl12">
                <?php
                    if (isset($_SESSION['feebackmessageerror'])) {
                        echo "<div class=\"row\">\n".
                                "<div class=\"green darken-3 col s12 m12 l12 xl12\">\n".
                                $_SESSION['feebackmessage'].
                                "</div>\n".
                            "</div>\n";
                    }
                ?>
            </div>
            <div class=" col s12 l12 m12 xl10 offset-xl1 l10 offset-l1">
                <table class=" responsive-table ">
                    <thead>
                        <tr >
                            <th >Name</th>
                            <th >Email</th>
                            <th >Message</th>
                            <th colspan="2" class="center-align">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require("template/feedbacktable.php"); 
                        $query = "SELECT* FROM tbl_feedback";
                        viewmessages($query);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require("template/footer.php"); ?>
</body>
</html>