<?php
	 include("dbhelper/db_create.php");
	   include("dbhelper/db_table.php");
	  createSaleDB();
        createSalesHistoryTB();
	
	// Connecting to the sales history database
	$conn = new mysqli('localhost', 'root', '', 'sales_history');
	// check connection 
    if ($conn->connect_error)
    {
    die("Connection failed: " . $conn->connect_error);
    }   
	$name = $_POST['pdt_name'];
	$price =$_POST['sale_price'];
	$quantity = $_POST['sale_qty'];
    $total_price = $price * $quantity;
    $sql = "INSERT INTO sales_history (pdt_name, sale_price, sale_qty,total_price)
	        VALUE('$name','$price','$quantity','$total_price')";
 
		 if($conn->query($sql) === TRUE)
			{
				echo "product name: ", $_POST["pdt_name"],"created successfully";
			}
			else
			{
				echo "Error: ". $sql ."<br>" .$conn -> error;
			} 
			
	  // 当sale成功以后， product里面的数量也要进行对应的减少。这样整个逻辑才说的通	 	
	 $conn2 = new mysqli('localhost', 'root', '', 'products');
	// check connection 
   /**  if ($conn2->connect_error)
    {
    die("Connection failed: " . $conn->connect_error);
    } 
    //update the value of quantity
    $sql = "
            UPDATE product
            
            SET pdt_qty =".$quantity.
            "WHERE pdt_id =1
           ";
    if($conn2->query($sql) === TRUE)
			{
				echo "product name: ", $_POST["pdt_name"],"created successfully";
			}
			else
			{
				echo "Error: ". $sql ."<br>" .$conn -> error;
			}
			**/        
?>



<!doctype html>
<html lang="en">
  <head>
    <title>Sales History Database</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  
  </head>
  <body>
  <div class="container">
    <h1>Sales History Database</h1>
    
  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
    <table  class="table table-striped table-bordered table-hover">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>pdt_name</th>
      <th>sale_price</th>
      <th>sale_qty</th>
      <th>total_price</th>
    </tr>
  </thead>
  <tbody id="myTable">
 <?php 	
  	$sql = "SELECT * FROM sales_history";
		   $result = $conn->query($sql);
		   if ($result->num_rows > 0) {
			    // output data of each row
			while($row = $result->fetch_assoc()) {
				  echo'<tr>';
		          echo' <th scope="row">';   
		          echo $row["pdt_id"];
		          echo '</th>';
		          echo '<td>';
		          echo $row["pdt_name"];
		          echo '</td>';
		          echo '<td>';
		          echo $row["sale_price"];
		          echo '</td>';
		          echo '<td>';
		          echo $row["sale_qty"];
		          echo '</td>';
		          echo '<td>';
		          echo $row["total_price"];
		          echo '</td>';
				  echo '</tr>';
		          
			    }
			} else {
			    echo "0 results";
			}
 ?>			
   
  </tbody>
</table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>