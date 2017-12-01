<?php
	include('session.php');
	include('inventoryAction.php');
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
					<li><a href="comment.php">Info</a></li>
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
				<button name="edit" onclick="edit()">edit</button>
				<button id="addBtn">Add Item</button>
				<div id="addModal" onclick="model()" class="modal">
					<div class="modal-content">
						<span class="close">&times;</span>
						<div class="modal-body">
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<table>
									<tr>
										<td>Item Name: </td>
										<td><input type="text" placeholder="itemName" name="item" required></td>
									</tr>
									<tr>
										<td>Quantity: </td>
										<td><input type="text" placeholder="storage" name="storage"></td>
									</tr>
									<tr>
										<td>Unit Price: </td>
										<td><input type="text" placeholder="unitPrice" name="unitPrice"></td>
									</tr>
									<tr>
										<td>Sell Price: </td>
										<td><input type="text" placeholder="sellPrice" name="sellPrice"></td>
									</tr>
									<tr>
										<td>Date: </td>
										<td><input type="text" placeholder="date" name="date"></td>
									</tr>
									<tr>
										<td>Month: </td>
										<td><input type="text" placeholder="month" name="month"></td>
									</tr>
									<tr>
										<td>Year: </td>
										<td><input type="text" placeholder="year" name="year"></td>
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
			<div id="Product_Panel"></div>
		</div>
	</body>

</html>