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
	date INT(10),
	month INT(10),
	year INT(10)
	)";
	$conn->query($sql);
	
	$sql = "CREATE TABLE sales (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	item VARCHAR(100) NOT NULL,
	quantity int(10),
	revenue int(10), 
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
	}
	$conn->close();	
	$filename = "img/avatar";
	if (!file_exists($filename)) {
		mkdir($filename, 0700);
	}
}
?>