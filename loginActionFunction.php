<?php
	function insert($itemName,$itemStorage,$itemUnitPrice,$itemSellPrice,$itemDate,$itemMonth,$itemYear,$message){
	   	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
		$sql = "INSERT INTO product (item,storage,unitPrice,sellPrice,date,month,year)
		VALUES ('$itemName','$itemStorage','$itemUnitPrice','$itemSellPrice','$itemDate','$itemMonth','$itemYear')";
		if ($conn->query($sql) === TRUE) {
			$message = "New record created successfully";
		} else {
			$message = "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();	
		return $message;
	}
   
   	function delete($itemName,$message){
	   	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
		$sql = "DELETE FROM product WHERE item = '$itemName'";
		if ($conn->query($sql) === TRUE) {
			$message = "item $itemName delete.";
		} else {
			$message = "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		return $message;	
	}
?>