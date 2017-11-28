<?php

/*  The code above is used for conneting the server*/




function createSaleDB() {
		//create database
		$conn = new mysqli('localhost', 'root', '');
		// Create database
		$sql = "CREATE DATABASE sales_history";
		if($conn ->query($sql)=== TRUE)
		{
			echo "Sale Database created successfully";
		}
		else
		{
			echo "Error creating database". $conn ->error;
			
		   	
		}
		
		$conn -> close();
}

function createProductDB() {
		//create database
		$conn = new mysqli('localhost', 'root', '');
		// Create database
		
		$sql = "CREATE DATABASE products";
		if($conn ->query($sql)=== TRUE)
		{
			echo "Product Database created successfully";
		}
		else
		{
			echo "Error creating database". $conn ->error;
			
		   	
		}
		
		$conn -> close();
}

?>  