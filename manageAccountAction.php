<?php
	include("config.php");
   	$error = "";
   	$uploadOk = 1;
   	if($_SERVER["REQUEST_METHOD"] == "POST") {
      	// change username and password form
     	if(isset($_POST['submit'])){
		    $myusername = mysqli_real_escape_string($db,$_POST['username']);
		    $newUsername = mysqli_real_escape_string($db,$_POST['newUsername']);
		    $mypassword = mysqli_real_escape_string($db,$_POST['currentPassword']);
		    $newPassword = mysqli_real_escape_string($db,$_POST['newPassword']);
		    $confirmNewPassword = mysqli_real_escape_string($db,$_POST['confirmPassword']);
		      
		    $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
		    $result = mysqli_query($db,$sql);
		    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		      
		    $count = mysqli_num_rows($result);
		      
		    // If result matched $myusername and $mypassword, table row must be 1 row
				
		    if($count != 1) {
		   		$error .= "Your Login Name or Password is invalid.</br>";
		    }else if($confirmNewPassword != $newPassword){
		      	$error .= "Your new password and  confirm new password does not match.</br>";
		    }else {
		      	$sql = "UPDATE user SET username='$newUsername'";
		      	$db->query($sql);
		      	$sql = "UPDATE user SET password='$newPassword'";
		      	$db->query($sql);
		      	// upload avatar
				if (!empty($_FILES['fileToUpload']['name'])) {
				    $target_dir = "img/avatar/";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			   		// Check if image file is a actual image or fake image
			   		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
					    $uploadOk = 1;
					}else{
						$error .= "File is not an image.</br>";
						$uploadOk = 0;
					}
					// Check file size
					if ($_FILES["fileToUpload"]["size"] > 500000) {
					    $error .= "Sorry, your file is too large.</br>";
					    $uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					    $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
					    $uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 1) {
						//delete previous avatar
						$dir = "img/avatar";
						$files = array_diff(scandir($dir), array('.','..','$target_file')); 
						foreach ($files as $file) { 
						  (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
						}
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							$sql = "UPDATE user SET avatar='$target_file'";
					     	$db->query($sql);
						} else {
						    $error .= "Sorry, there was an error uploading your file.</br>";
						}
					}
				}
				if($uploadOk == 1){
					header("location:index.php");
				}
		    }
		}
		
		// reset button form
	   	if(isset($_POST['reset'])){
	   		$reset = $_POST['resetPassword'];
	   		if($reset == 'whoisyourdaddy'){
			   	$sql = "DROP DATABASE mydb";
			   	$db->query($sql);
				$dir = "img/avatar";
				$files = array_diff(scandir($dir), array('.','..')); 
			    foreach ($files as $file) { 
			      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
			    } 
				rmdir($dir);
			   	header("location:index.php");
		   	}else{
		   		$error = "Reset password incorrect.</br>";
		   	}
	   	}
   	}
?>