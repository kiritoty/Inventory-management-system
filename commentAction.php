<?php
   	$error = "";

   	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myComment = mysqli_real_escape_string($db,$_POST['comment']);
		$hour = date('H');
		$minute = date('i');
		$date = date('d');
		$month = date('m');
		$year = date('Y');
      	if(isset($_POST['submit'])){
	      	$sql = "INSERT INTO comment (comment, hour, minute, date, month, year)
	   		VALUES ('$myComment', '$hour', '$minute', '$date', '$month', '$year')";
	   		if ($db->query($sql) === TRUE) {
				$message = "New record created successfully";
				header("comment.php");
			} else {
				$message = "Error: " . $sql . "<br>" . $db->error;
			}
	    }
   	}
?>