<?php
	include("config.php");
   	$error = "";

   	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$itemName = mysqli_real_escape_string($db,$_POST['comment']);
      	if(isset($_POST['submit'])){
	   		$sql = "SELECT * FROM product WHERE item = '$itemName'";
	      	$message = insert($itemName,$itemStorage,$itemUnitPrice,$itemSellPrice,$itemDate,$itemMonth,$itemYear,$message);
	    }
   	}
?>