<?php
   $message = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      	$itemName = mysqli_real_escape_string($db,$_POST['item']);
      	$itemStorage = mysqli_real_escape_string($db,$_POST['storage']); 
      	$itemUnitPrice = mysqli_real_escape_string($db,$_POST['unitPrice']);
      	$itemSellPrice = mysqli_real_escape_string($db,$_POST['sellPrice']); 
      	$itemDate = mysqli_real_escape_string($db,$_POST['date']); 
      	$itemMonth = mysqli_real_escape_string($db,$_POST['month']); 
      	$itemYear = mysqli_real_escape_string($db,$_POST['year']); 
      	if(isset($_POST['add'])){
			$sql = "INSERT INTO product (item,storage,unitPrice,sellPrice,date,month,year)
			VALUES ('$itemName','$itemStorage','$itemUnitPrice','$itemSellPrice','$itemDate','$itemMonth','$itemYear')";
			if ($db->query($sql) === TRUE) {
				$message = "New record created successfully";
			} else {
				$message = "Error: " . $sql . "<br>" . $db->error;
			}
      	}else if(isset($_POST['delete'])){
      	  	$sql = "SELECT * FROM product WHERE item = '$itemName'";
	      	$result = mysqli_query($db,$sql);
	      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
	      	$count = mysqli_num_rows($result);
	      	if($count == 0) {
	      		$message = "item not exist";
	      	}else {
			    $sql = "DELETE FROM product WHERE item = '$itemName'";
				if ($db->query($sql) === TRUE) {
					$message = "item $itemName delete.";
				} else {
					$message = "Error: " . $sql . "<br>" . $db->error;
				}
	      	}
      	}
   }
?>