<?php
  	$message = "";
   	if($_SERVER["REQUEST_METHOD"] == "POST") {

      	if(isset($_POST['add'])){
	      	$itemName = mysqli_real_escape_string($db,$_POST['item']);
	      	$itemStorage = mysqli_real_escape_string($db,$_POST['storage']); 
	      	$itemUnitPrice = mysqli_real_escape_string($db,$_POST['unitPrice']);
	      	$itemSellPrice = mysqli_real_escape_string($db,$_POST['sellPrice']); 
	      	$itemDate = mysqli_real_escape_string($db,$_POST['date']); 
	      	$itemMonth = mysqli_real_escape_string($db,$_POST['month']); 
	      	$itemYear = mysqli_real_escape_string($db,$_POST['year']); 
			$sql = "INSERT INTO product (item,storage,unitPrice,sellPrice,date,month,year)
			VALUES ('$itemName','$itemStorage','$itemUnitPrice','$itemSellPrice','$itemDate','$itemMonth','$itemYear')";
			if ($db->query($sql) === TRUE) {
				$message = "New record created successfully";
				header("Refresh:1");
			} else {
				$message = "Error: " . $sql . "<br>" . $db->error;
			}
      	}else if(isset($_POST['delete'])){
      		$itemName = mysqli_real_escape_string($db,$_POST['item']);
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
	   		$message = "haha";
	   		$sql = 'SELECT * FROM product';
			$result = mysqli_query($db,$sql); 
			$rows = array();
			while($row = mysqli_fetch_array($result)){
		    	$rows[] = $row;	
			}
	   		for($i = 0; $i < count($rows);$i++){
	   			$theId = $rows[$i][0].'myId';
				$theItem = $rows[$i][0].'itemName';
				$theStorage = $rows[$i][0].'itemStorage';
				$theUnitPrice = $rows[$i][0].'itemUnitPrice';
				$theSellPrice = $rows[$i][0].'itemSellPrice';
				$theDate = $rows[$i][0].'itemDate';
				$theMonth = $rows[$i][0].'itemMonth';
				$theYear = $rows[$i][0].'itemYear';
				$id = mysqli_real_escape_string($db,$_POST[$theId]);
		      	$itemName = mysqli_real_escape_string($db,$_POST[$theItem]);
		      	$itemStorage = mysqli_real_escape_string($db,$_POST[$theStorage]); 
		      	$itemUnitPrice = mysqli_real_escape_string($db,$_POST[$theUnitPrice]);
		      	$itemSellPrice = mysqli_real_escape_string($db,$_POST[$theSellPrice]); 
		      	$itemDate = mysqli_real_escape_string($db,$_POST[$theDate]); 
		      	$itemMonth = mysqli_real_escape_string($db,$_POST[$theMonth]); 
		      	$itemYear = mysqli_real_escape_string($db,$_POST[$theYear]); 
	    		$sql = "SELECT * FROM product WHERE id = '$id'";
		      	$result = mysqli_query($db,$sql);
		      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
		      	$count = mysqli_num_rows($result);
		      	if($count == 0) {
		      		$message = $theId." item not exist";
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
						$message = "submit changed.";
					} else {
						$message = "Error: " . $sql . "<br>" . $db->error;
					}
		    	}
	   		}
	   		header("Refresh:1");
    }else if(isset($_POST['updateSale'])){
	      	$itemName = mysqli_real_escape_string($db,$_POST['item']);
	      	$itemDate = mysqli_real_escape_string($db,$_POST['date']); 
	      	$itemMonth = mysqli_real_escape_string($db,$_POST['month']); 
	      	$itemYear = mysqli_real_escape_string($db,$_POST['year']); 
	      	$itemQuantity = mysqli_real_escape_string($db,$_POST['quantity']);
	      	$itemId = mysqli_real_escape_string($db,$_POST['itemId']); 
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
					$message = "id $itemId updated.";
				} else {
					$message = "Error: " . $sql . "<br>" . $db->error;
				}
	      	}
    	}
   	}
?>