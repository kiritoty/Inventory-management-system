<?php
  	$message = "";
   	if($_SERVER["REQUEST_METHOD"] == "POST") {

      	if(isset($_POST['add'])){
	      	$itemName = mysqli_real_escape_string($db,$_POST['item']);
	      	$itemStorage = mysqli_real_escape_string($db,$_POST['storage']); 
	      	$itemUnitPrice = mysqli_real_escape_string($db,$_POST['unitPrice']);
	      	$itemSellPrice = mysqli_real_escape_string($db,$_POST['sellPrice']); 
	      	$thedate = date('m/d/Y', strtotime($_POST['date']));
	      	$day = substr($thedate, 3, 2); 
	      	$month = substr($thedate, 0, 2); 
	      	$year = substr($thedate, 6, 4); 
	      	$itemDate = mysqli_real_escape_string($db,$day); 
	      	$itemMonth = mysqli_real_escape_string($db,$month); 
	      	$itemYear = mysqli_real_escape_string($db,$year); 
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
				$id = mysqli_real_escape_string($db,$_POST[$theId]);
		      	$itemName = mysqli_real_escape_string($db,$_POST[$theItem]);
		      	$itemStorage = mysqli_real_escape_string($db,$_POST[$theStorage]); 
		      	$itemUnitPrice = mysqli_real_escape_string($db,$_POST[$theUnitPrice]);
		      	$itemSellPrice = mysqli_real_escape_string($db,$_POST[$theSellPrice]); 
		      	$itemDate = mysqli_real_escape_string($db,$_POST[$theDate]); 
		      	$day = substr($itemDate, 3, 2); 
		      	$month = substr($itemDate, 0, 2); 
		      	$year = substr($itemDate, 6, 4);
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
						    date = '$day',
						    month = '$month',
						    year = '$year'
						  	WHERE id = '$id'";
					if ($db->query($sql) === TRUE) {
						$message = "change submitted.";
					} else {
						$message = "Error: " . $sql . "<br>" . $db->error;
					}
		    	}
	   		}
	   		header("Refresh:1");
    }else if(isset($_POST['updateSale'])){
    		$itemDate = date('m/d/Y', strtotime($_POST['date']));
	      	$day = substr($itemDate, 3, 2); 
	      	$month = substr($itemDate, 0, 2); 
	      	$year = substr($itemDate, 6, 4);
	      	$itemName = mysqli_real_escape_string($db,$_POST['item']); 
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
				VALUES ('$itemId','$itemName','$itemQuantity','$cost','$revenue','$profit','$day','$month','$year')";
				if ($db->query($sql) === TRUE) {
					$message = "id $itemId updated.";
				} else {
					$message = "Error: " . $sql . "<br>" . $db->error;
				}
	      	}
    	}
   	}
?>