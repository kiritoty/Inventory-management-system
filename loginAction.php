<?php
  	$message = "";
   	if($_SERVER["REQUEST_METHOD"] == "POST") {
   		$id = mysqli_real_escape_string($db,$_POST['id']);
      	$itemName = mysqli_real_escape_string($db,$_POST['item']);
      	$itemStorage = mysqli_real_escape_string($db,$_POST['storage']); 
      	$itemUnitPrice = mysqli_real_escape_string($db,$_POST['unitPrice']);
      	$itemSellPrice = mysqli_real_escape_string($db,$_POST['sellPrice']); 
      	$itemDate = mysqli_real_escape_string($db,$_POST['date']); 
      	$itemMonth = mysqli_real_escape_string($db,$_POST['month']); 
      	$itemYear = mysqli_real_escape_string($db,$_POST['year']); 
      	$itemQuantity = mysqli_real_escape_string($db,$_POST['quantity']);
      	$itemId = mysqli_real_escape_string($db,$_POST['itemId']); 
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
    	}else if(isset($_POST['edit'])){
    		$sql = "SELECT * FROM product WHERE id = '$id'";
	      	$result = mysqli_query($db,$sql);
	      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
	      	$count = mysqli_num_rows($result);
	      	if($count == 0) {
	      		$message = "item not exist";
	      	}else {
			    $sql = "UPDATE product SET 
					    item = '$itemName', 
					    storage = '$itemStorage', 
					    unitPrice = '$itemUnitPrice', 
					    sellPrice = '$itemSellPrice', 
					    date = '$itemDate',
					    month = '$itemMonth',
					    year = '$itemYear'
					  	WHERE id = '$id'";
				if ($db->query($sql) === TRUE) {
					$message = "id $id edited.";
				} else {
					$message = "Error: " . $sql . "<br>" . $db->error;
				}
	      	}
    	}else if(isset($_POST['updateSale'])){
    		$sql = "SELECT * FROM product WHERE id = '$itemId'";
    		$result = mysqli_query($db,$sql);
	      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
	      	$count = mysqli_num_rows($result);
	      	if($count == 0) {
	      		$message = "item not exist";
	      	}else{
	      		$cost = $row["unitPrice"] * $itemQuantity;
	      		$revenue = $row["sellPrice"] * $itemQuantity;
	      		$profit = $revenue - $cost;
	      		$sql = "INSERT INTO sales(itemId,item,quantity,cost,revenue,profit,date,month,year)
				VALUES ('$itemId','$itemName','$itemQuantity','$cost','$revenue','$profit','$itemDate','$itemMonth','$itemYear')";
				if ($db->query($sql) === TRUE) {
					$message = "id $itemId edited.";
				} else {
					$message = "Error: " . $sql . "<br>" . $db->error;
				}
	      	}
    	}
   	}
?>