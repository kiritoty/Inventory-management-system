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
				<button onclick="edit()">edit</button>
				<button id="addBtn">Add Item</button>
				<form id="submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div id="addModal" onclick="model()" class="modal">
						<div class="modal-content">
							<span class="close">&times;</span>
							<div class="modal-body">
									<table>
										<input type="text" placeholder="itemId" name="itemId">
										<br>
										<input type="text" placeholder="itemName" name="item">
										<br>
										<input type="text" placeholder="storage" name="storage">
										<br>
										<input type="text" placeholder="unitPrice" name="unitPrice">
										<br>
										<input type="text" placeholder="sellPrice" name="sellPrice">
										<br>
										<input type="text" placeholder="date" name="date">
										<br>
										<input type="text" placeholder="month" name="month">
										<br>
										<input type="text" placeholder="year" name="year">
										<br>
										<input type="text" placeholder="quantity" name="quantity">
									</table>
									<button name="add">add</button>
									<button name="delete">delete</button>
									<button name="updateSale">update sales</button>
							</div>
						</div>
					</div>
					<div>
						<?php echo $message; ?>
					</div>
				</form>
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
			
			<form id="submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div id="Product_Panel"><button name="edit">submit change</button></div>
			</form>
		</div>
		</div>
	</body>

</html>