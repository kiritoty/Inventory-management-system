<?php
	include('session.php');
    $sql = 'SELECT * FROM product';
	$result = mysqli_query($db,$sql); 
	$rows = array();
	
	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;	
	}
	include('inventoryAction.php');
?>

<html>

	<head>
		<title>Inventory</title>
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="css/inventory.css">
		<script type="text/javascript">
			var products = <?php echo json_encode( $rows ) ?>;
		</script>
		<script src="js/dashboard.js"></script>
		<script src="js/inventory.js"></script>
	</head>

	<body>
		<div id="top-bar">
			<nav>
				<ul>
					<li><a href="dashboard.php">Home</a></li>
					<li><a href="comment.php">Message</a></li>
					<li><a href="reference.php" target="_blank">About</a></li>
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
				<li><h2 id="logo">Inventory Sales Management</h2></li>
				<li><a href="sales.php">Sales</a></li>
				<li><a href="inventory.php">Inventory</a></li>
				<li><a href="#">link3</a></li>
			</ul>
		</div>

		<div id="block">
			<div id="main-area">
				<div id="welcome">
					<h1>Welcome <?php echo $login_session; ?></h1>
				</div>
				<div id="addItem">
					<button id="editBtn" onclick="edit()">Edit</button>
					<button id="addBtn" class="Btn">Add/Delete Item</button>
					<button id="updateBtn" class="Btn">Update Sale</button>
					<form id="submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<div id="addModal" onclick="model()" class="modal">
							<div class="modal-content">
    							<span class="close">&times;</span>
								<div class="modal-body">
									<table>
										<tr><td>Item Id: </td><td><input type="text" placeholder="itemId" name="itemId"></td></tr>
										<tr><td>Item Name: </td><td><input type="text" placeholder="itemName" name="item"></td></tr>
										<tr><td>#In-Stock: </td><td><input type="text" placeholder="storage" name="storage"></td></tr>
										<tr><td>Unit Price: </td><td><input type="text" placeholder="unitPrice" name="unitPrice"></td></tr>
										<tr><td>Sell Price: </td><td><input type="text" placeholder="sellPrice" name="sellPrice"></td></tr>
										<tr><td>Date: </td><td><input type="date" placeholder="date" name="date"></td></tr>
									</table>
									<br>
									<button id="addBtn" name="add">Add</button>
									<button id="addBtn" name="delete">Delete</button>
								</div>
							</div>
						</div>
						<div>
							<?php echo $message; ?>
						</div>
					</form>
				</div>
				
				<br>
				
				<form id="submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div id="Product_Panel">
						<button name="edit" id="editBtn">Submit Change</button>
						<div id="updateModal" onclick="model()" class="modal">
							<div class="modal-content">
								<span class="close">&times;</span>
								<div class="modal-body">
									<table>
										<tr><td>Item Id: </td><td><input type="text" placeholder="itemId" name="itemId"></td></tr>
										<tr><td>Item Name: </td><td><input type="text" placeholder="itemName" name="item"></td></tr>
										<tr><td>Date: </td><td><input type="date" placeholder="date" name="date"></td></tr>
										<tr><td>Quantity: </td><td><input type="text" placeholder="quantity" name="quantity"></td></tr>
									</table>
									<br>
									<button id="editBtn" name="updateSale">Update Sale</button>
								</div>
							</div>
						</div>
						<div>
							<?php echo $message; ?>
						</div>
						<br>
					</div>	
				</form>
				
				
				<script>
					// Get the modal
					var modal = document.getElementsByClassName("modal");
					
					// Get the button that opens the modal
					var btn = document.getElementsByClassName("Btn");
					
					// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close");
					
					// When the user clicks the button, open the modal 
					btn[0].onclick = function() {
					    modal[0].style.display = "block";
					}
					
					btn[1].onclick = function() {
					    modal[1].style.display = "block";
					}
					
					// When the user clicks on <span> (x), close the modal
					span[0].onclick = function() {
					    modal[0].style.display = "none";
					}
					
					span[1].onclick = function() {
					    modal[1].style.display = "none";
					}
					
					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
					    if (event.target == modal) {
					        modal.style.display = "none";
					    }
					}
				</script>
			</div>
		</div>
	</body>
</html>