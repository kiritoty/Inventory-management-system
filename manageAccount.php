<?php
	include("manageAccountAction.php");
?>
<html>
	
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login </title>
		<link rel="stylesheet" href="css/indexAndAccountManageStyle.css">
		<link rel="stylesheet" href="css/star.css">
		<script src="js/star.js"></script>
	</head>
	<body>
		<div id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>
		<div class="wrap">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<label class="label">avatar upload(not required)</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<label class="label">Current Username</label>
			<input type="text" name="username" required/>
			<div class="bar">
				<i></i>
			</div>
			<label class="label">New Username</label>
			<input type="text" name="newUsername" required/>
			<div class="bar">
				<i></i>
			</div>
			<label class="label">Current Password</label>
			<input type="password" name="currentPassword" required/>
			<div class="bar">
				<i></i>
			</div>
			<label class="label">New Password</label>
			<input type="password" name="newPassword" required/>
			<div class="bar">
				<i></i>
			</div>
			<label class="label">Confirm new Password</label>
			<input type="password" name="confirmPassword" required/>
			<button class="wrapButton" name="submit">submit</button>
			<div class="error">
				<?php echo $error; ?>
			</div>
			</form>
		</div>
		<div class="center">
			<a class="label" href="index.php">return to index</a>
		</div>
		</br>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="center">
				<label class="label">reset password</br></label>
				<input type="password" name="resetPassword" required/></br>
				<label class="label">(reset to default username and password and delete all data)</br></label>
				<button class="resetButton" name="reset">reset all</button>
			</div>
		</form>
		
	</body>

</html>