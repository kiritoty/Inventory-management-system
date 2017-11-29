<?php
	include('session.php');
    $sql = 'SELECT * FROM comment';
	$result = mysqli_query($db,$sql); 
	$rows = array();
	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;
	}
?>


<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<script>
			var comments = <?php echo json_encode( $rows ) ?>;
		</script>
		<script src="js/comment.js"></script>

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
				<li><a href="#">link2</a></li>
				<li><a href="#">link3</a></li>
			</ul>
			
		</div>

	<div id="main-area">
	</div>

	
		
		
	
	</body>
</html>