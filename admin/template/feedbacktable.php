<?php
function viewmessages($query){
     $server = "localhost";
    $username = "root";
    $password = "";
    $database = "admindb";
    $connection = mysqli_connect($server , $username , $password , $database);
    $result = $connection->query($query);

         if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             //echo "id: " . $row["productID"]. " - Name: " . $row["prodName"]. " <br>";
             $feedbackID = $row["feedbackID"];
             $name = $row["name"];
             $email = $row["email"];
             $message = $row["message"];
             //returnpreview($message);
             
            echo "<div class=\"row\">\n";
            echo "<table class='responsive-table'>\n";
            echo "<div class=\'row\'>\n";
            echo "<div class='input-field col s12 m12 l12 xl12'>\n";
            echo "<tr>\n"; 
            echo "<td>$name</td><td>$email</td><td>$message</td>\n";
            echo "</div>\n <td class='right-align'>
             <form action='view.php' method='post'>
                <input type='hidden' value='$name' name = 'name'/>
                <input type='hidden' value='$feedbackID' name='feedbackID'/>
                <button type='submit' name='activity' class='btn waves-light waves-effect'>View</button>
             </form></td><td class='left-align'>
             <form action='function/delete.php' method='post'>
                <input type='hidden' value='$name' name = 'name'/>
                <input type='hidden' value='$feedbackID' name='feedbackID'/>
                <button type='submit' name='activity' class='btn waves-light waves-effect'>Delete</button>
            </form></td></tr></table>");
             }
         } else {
         echo ("0 results");
         }
         $connection->close();
}

function returnpreview($message){

}

function viewfeedback($feedbackID, $query){
     $server = "localhost";
    $username = "root";
    $password = "";
    $database = "admindb";
    $connection = mysqli_connect($server , $username , $password , $database);
    $result = $connection->query($query);

         if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             //echo "id: " . $row["productID"]. " - Name: " . $row["prodName"]. " <br>";
             $feedbackID = $row["feedbackID"];
             $name = $row["name"];
             $email = $row["email"];
             $message = $row["message"];
             $date = $row["date"];
             $phone = $row['phone'];
             $time = $row["time"];
             //returnpreview($message);
             echo("
             <div class='row'>
                <div class='col s12 l6 xl6 offset-xl3 offset-l3 m12' style='border: solid 1px;'>
                    <label>Name:</label>
                    <h4 style='font-size:1em;'>$name</h4>
                    <label>E-mail:</label>
                    <h5 style='font-size:1em;'>$email</h5>
                    <label>Mobile No.:</label>
                    <h5 style='font-size:1em;'>$phone</h5>
                    <h6 style='font-size:1em;'>$date $time</h6>
                    <div class='row'>
                        <div class='col s12 m12 l12 xl12'>
                        
                        </div>
                    </div>
                    <label>Message</label>
                    <p style='font-size:1em; word-wrap:break-line;'>$message</p>
                </div>
            </div>");
             }
         } else {
         echo ("0 results");
         }
         $connection->close();
}

function showemails($query){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "admindb";
    $connection = mysqli_connect($server , $username , $password , $database);
    $result = $connection->query($query);

         if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
             //echo "id: " . $row["productID"]. " - Name: " . $row["prodName"]. " <br>";
             $email = $row["emailadd"];
             //returnpreview($message);
             echo("<tr><td>$email</td></tr>");
             }
         } else {
         echo ("0 results");
         }
         $connection->close();
}


?>