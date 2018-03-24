<?php 
function burgandsandview($query){
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
             $title = $row["title"];
             $price = $row["price"];
             $path = $row["path"];
             //returnpreview($message);
             echo("
             <div class='dished'>
								<figure>
                                    <img src='../$path' alt='' style='width:200px;'>	
									<figcaption class='dishcattitle'>
										<h4 class='dishname'>$title</h4>
										<h5 class='dishprice'>$price</h5>		
                                    </figcaption>
                                    </figure>
							</div>
             ");
             }
         }
         $connection->close();
}
/* function Drinks(){

}

 */
?>

