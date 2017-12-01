<?php
	include('session.php');
	include('commentAction.php');
    $sql = 'SELECT * FROM comment';
	$CommentResult = mysqli_query($db,$sql); 
	$CommentRows = array();
	while($row = mysqli_fetch_array($CommentResult)){
    	$CommentRows[] = $row;
	}
?>


<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="css/comment.css">
		<script>
			var comments = <?php echo json_encode( $CommentRows ) ?>;
		</script>
		<script src="js/comment.js"></script>

	</head>
	<body>
	<div id="top-bar">
		<nav>
			<ul>
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="comment.php">Message</a></li>
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
				<li><h2 id="logo">Inventory Sales Management</h2></li>
				<li><a href="#">Sales</a></li>
				<li><a href="inventory.php">Inventory</a></li>
				<li><a href="#">link3</a></li>
			</ul>
			
		</div>

	<div id="block">
		<div id="main-area">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div id="Tasks_Panel-info">
					<div id="comment"></div>
				</div>	
				<div class= "submit">
					<textarea class ="comment" type="text" name="comment" required></textarea>
					<button name="submit">submit</button>
				</div>
			</form>
		</div>
	</div>
	
	</body>
</html>