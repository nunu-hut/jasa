<?php 
 
	$base_url = "http://localhost/jasa/";
	$mysqli = mysqli_connect("localhost:3309","root","","jasa");
	
	if (mysqli_connect_errno()){
		echo "Database tidak ditemukan." . mysqli_connect_error();
	}
 
?>