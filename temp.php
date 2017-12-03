<?php
	include('session.php');
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
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<script src="js/dashboard.js"></script>

	</head>
	<body>
		
		<script>
			//看这个code拿数据，那个alert只是展示
			var products = <?php echo json_encode( $rows ) ?>;
			//我的的第一个物品是id=1,item=apple,income=1,expend=1; 这里alert会出现apple
			//alert(products[0][1]);
			for(var sum = 0; sum < products.length; sum++){
				
			}
		</script>
		
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
				<li><h1 id="logo">Logo</h1></li>
				<li><a href="#">link1</a></li>
				<li><a href="#">link2</a></li>
				<li><a href="#">link3</a></li>
			</ul>
			
		</div>

		<div id="block">
			<div id="main-area"></div>

		</div>
		
		
	
	</body>
</html>