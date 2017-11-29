<?php
	session_start();
	date_default_timezone_set('America/New_York');
   	include("default.php");
   	createDatabase();
	createTable();
	createAdmin();
	include("indexAction.php");
?>
<html class="html">
	
	<head>
		<title>Login </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/indexAndAccountManageStyle.css">
		<link rel="stylesheet" href="css/star.css">
		<script src="js/star.js"></script>
	</head>
	<body>
		<div id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="wrap">
				<div class="avatar">
					<?php echo '<img src="' . $avatar . '"/>';?>
				</div>
				<input type="text" placeholder="username" name="username" value="admin" required>
				<div class="bar">
					<i></i>
				</div>
				<input type="password" placeholder="password" name="password" value="admin" required>
				<button class="wrapButton">Sign in</button>
				<div class="error">
					<?php echo $error; ?>
				</div>
			</div>
		</form>
		<div class="center">
			<a class="label" href="manageAccount.php">Manage Account</a>
		</div>
		<a class="credit" href="reference.php" target="_blank">credits</a>
		<p class="default">default username:admin</br>default password:admin</p>
	</body>

</html>