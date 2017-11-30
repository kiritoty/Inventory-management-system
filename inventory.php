<?php
	include('session.php');
	include('loginAction.php');
    $sql = 'SELECT * FROM product';
	$result = mysqli_query($db,$sql); 
	$rows = array();
	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;
	}
	
?>


<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Inventory</title>
		<link rel="stylesheet" type="text/css" href="css/inventory.css">
		<script src="js/dashboard.js"></script>

	</head>
	<body>
		
		<script>
			//看这个code拿数据，那个alert只是展示
			var products = <?php echo json_encode( $rows ) ?>;
			//我的的第一个物品是id=1,item=apple,income=1,expend=1; 这里alert会出现apple
			//alert(products[0][1]);
			for(var sum; sum < products.lengh; sum++){
				
			}
		</script>
		
	<div id="top-bar">
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Info</a></li>
				<li><a href="#">About</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			
			
		</nav>
	</div>	
		

		<div id = "side-navagate-bar">
			<div class = "toggle-btn" onclick="toggleSideBar()">
				<span></span>
				<span></span>
				<span></span>
				
			</div>
			
			<ul>
				<li><h1 id="logo">Logo</h1></li>
				<li><a href="#">link1</a></li>
				<li><a href="inventory.php">Inventory</a></li>
				<li><a href="#">link3</a></li>
			</ul>
			
		</div>
		
		<div id="block"></div>

		<div id="main-area">
			
			<div id="welcome">
				<h1>Inventory</h1>
			</div>
			
			<div id="addItem">
				<button id="addBtn">Add Item</button>
				
				<div id="addModal" class="modal">
				
				  <div class="modal-content">
				    <span class="close">&times;</span>
				    <div class="modal-body">
				    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<table>
							<tr>
								<td>Item Name: </td><td><input type="text" placeholder="itemName" name="item" required></td>
							</tr>
							<tr>
								<td>Quantity: </td><td><input type="text" placeholder="storage" name="storage"></td>
							</tr>
							<tr>
								<td>Unit Price: </td><td><input type="text" placeholder="unitPrice" name="unitPrice"></td>
							</tr>
							<tr>
								<td>Sell Price: </td><td><input type="text" placeholder="sellPrice" name="sellPrice"></td>
							</tr>
							<tr>
								<td>Date: </td><td><input type="text" placeholder="date" name="date"></td>
							</tr>
							<tr>
								<td>Month: </td><td><input type="text" placeholder="month" name="month"></td>
							</tr>
							<tr>
								<td>Year: </td><td><input type="text" placeholder="year" name="year"></td>
						</table>
						<button name="add">add</button>
						<button name="delete">delete</button>
						<button name="update">update sales</button>
					</form>
					</div>
				  </div>
				
				</div>
				<div>
					<?php echo $message; ?>
				</div>
			</div>
			<br>
			
			<script>
			// Get the modal
			var modal = document.getElementById("addModal");
			
			// Get the button that opens the modal
			var btn = document.getElementById("addBtn");
			
			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];
			
			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			    modal.style.display = "block";
			}
			
			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modal.style.display = "none";
			}
			
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
			</script>
			
			<div id="Product_Panel">
				<script type="text/javascript">
					// Create table.
					var table = document.createElement("table");
					var row1 = table.insertRow(0);
					var row1col1 = row1.insertCell(0);
					row1col1.innerHTML = "id";
					var row1col2 = row1.insertCell(1);
					row1col2.innerHTML = "Item Name";
					var row1col3 = row1.insertCell(2);
					row1col3.innerHTML = "# In-Stock";
					var row1col4 = row1.insertCell(3);
					row1col4.innerHTML = "Unit Price";
					var row1col5 = row1.insertCell(4);
					row1col5.innerHTML = "Sell Price";
					var row1col6 = row1.insertCell(5);
					row1col6.innerHTML = "Date";
					var row1col7 = row1.insertCell(6);
					row1col7.innerHTML = "Month";
					var row1col8 = row1.insertCell(7);
					row1col8.innerHTML = "Year";
					for(var i = 0; i < products.length; i++ ) {
					    var row = table.insertRow(i+1);
					    for(var j = 0; j < 8; j++ ) {
					    	var rowcol = row.insertCell(j);
					    	rowcol.innerHTML = products[i][j];
					    }
					}
					var div = document.getElementById("Product_Panel");
					div.appendChild(table);
				</script>
					
			</div>
		</div>

	
		
		
	
	</body>
</html>