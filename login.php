<?php
	include('session.php');
	include('loginAction.php');
?>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Welcome</title>
	</head>

	<body>
		<h1>Welcome <?php echo $login_session; ?></h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="text" placeholder="itemName" name="item" required>
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
			<button name="add">add</button>
			<button name="delete">delete</button>
		</form>
		<div>
			<?php echo $message; ?>
		</div>
		<h2><a href = "dashboard.php">dashboard</a></h2>
		<h2><a href = "logout.php">Sign Out</a></h2>
	</body>

</html>