<?php

function createSalesHistoryTB()
{       
	    $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sales_history";
		
		//sql to create table
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "CREATE TABLE sales_history (
			pdt_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			pdt_name VARCHAR(100) NOT NULL,
			sale_price DECIMAL(18,2) NOT NULL,
			sale_qty  INT(11)  NOT NULL,
			total_price INT(11) NOT NULL
			)";
			
	     //	sale_date DATE NOT NULL,
		 //	pdt_img VARCHAR(100) NOT NULL,
		//	total_price DECIMAL(18,2) NOT NULL
		if ($conn->query($sql) === TRUE) {
		    echo "Table sales_history created successfully";
		} else {
		    echo "Error creating table: " . $conn->error;
		}
		
		
		$conn->close();
}

function createProductTB()
{
	    $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "products";
		
		//sql to create table
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
	
		$sql = "CREATE TABLE product (
			pdt_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			pdt_name VARCHAR(100) NOT NULL,
			pdt_category VARCHAR(100) NOT NULL,
			pdt_price DECIMAL(18,2) NOT NULL,
			pdt_qty  INT(11)  NOT NULL,
			pdt_img  VARCHAR(200) NOT NULL
			)";
			
		
		if ($conn->query($sql) === TRUE) {
		    echo "Table prodcut created successfully";
		} else {
		    echo "Error creating table: " . $conn->error;
		}
		
		
		$conn->close();
}



?>