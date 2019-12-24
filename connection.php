<?php

      $servername = "localhost";
	  $username = "root";
	  $password = "";
	  $database = "skp";
	  
	  //create connection
	  $conn = mysqli_connect($servername, $username, $password, $database);
	  
	  //check connection
	  if ($conn->connect_error){
	  	die("conection failed: " . $conn->connect_error);
	  }   
	  //start session
	  //session_start();
?>