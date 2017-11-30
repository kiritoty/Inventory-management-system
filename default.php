<?php
//run this to create user database and table


function createDatabase(){
	$conn = new mysqli('localhost', 'root', '');
	// Create database
	$sql = "CREATE DATABASE mydb";
	$conn->query($sql);
	$conn->close();	
}

function createTable(){
	$conn = new mysqli('localhost', 'root', '','mydb');
	$sql = "CREATE TABLE user (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	avatar VARCHAR(255) NOT NULL
	)";
	$conn->query($sql);
	
	$sql = "CREATE TABLE product (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	item VARCHAR(100) NOT NULL,
	storage INT(10),
	unitPrice INT(10),
	sellPrice INT(10),
	date INT(10),
	month INT(10),
	year INT(10)
	)";
	$conn->query($sql);

	$sql = "CREATE TABLE comment (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	comment VARCHAR(255) NOT NULL,
	hour VARCHAR(255) NOT NULL,
	minute VARCHAR(255) NOT NULL,
	date VARCHAR(255) NOT NULL,
	month VARCHAR(255) NOT NULL,
	year VARCHAR(255) NOT NULL
	)";
	$conn->query($sql);
	
	$sql = "CREATE TABLE sales (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	itemId int(11),
	item VARCHAR(100) NOT NULL,
	quantity int(10),
	cost int(10),
	revenue int(10), 	
	profit int(10),
	date INT(10),
	month INT(10),
	year INT(10)
	)";
	$conn->query($sql);

	$conn->close();		
}

function createAdmin(){
	$conn = new mysqli('localhost', 'root', '','mydb');
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id = '1'");
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
	// If result matched username, table row must be 1 row		
	if($count == 0) {
		$sql = "INSERT INTO user (username, password, avatar)
	   	VALUES ('admin', 'admin','img/admin.png')";
		$conn->query($sql);
		
		$hour = date('H');
		$minute = date('i');
		$date = date('d');
		$month = date('m');
		$year = date('Y');
		$wrongYear = $year - 5;
		$wrongMonth = ($month-1 > 0)?($month - 1) : $month;
		$wrongDate = ($date-10 > 0)?($month - 10) : $date;
		$sql = "INSERT INTO comment (comment, hour, minute, date, month, year)
	   		VALUES ('我是林琰.', '$hour', '$minute', '$date', '$month', '$wrongYear')";
		$conn->query($sql);
		
		$sql = "INSERT INTO comment (comment, hour, minute, date, month, year)
	   		VALUES ('我不是林琰.', '$hour', '$minute', '$date', '$wrongMonth', '$year')";
		$conn->query($sql);
		
		$sql = "INSERT INTO comment (comment, hour, minute, date, month, year)
	   		VALUES ('你猜我是不是林琰.', '$hour', '$minute', '$wrongDate', '$month', '$year')";
		$conn->query($sql);
		
		$sql = "INSERT INTO comment (comment, hour, minute, date, month, year)
	   		VALUES ('哈哈猜错了吧.', '$hour', '$minute', '$date', '$month', '$year')";
		$conn->query($sql);
	}
	$conn->close();	
	$filename = "img/avatar";
	if (!file_exists($filename)) {
		mkdir($filename, 0700);
	}
}
?>