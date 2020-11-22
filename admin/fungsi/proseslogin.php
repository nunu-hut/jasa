<?php

include '../../fungsi/koneksi.php';

$username = $_POST ['username'];
$password = md5($_POST ['password']);

	$query = mysqli_query($mysqli, "SELECT * from pengguna where username='$username' and password='$password'");

	$cek = mysqli_num_rows($query);

	if ($cek > 0){
		$user = mysqli_fetch_assoc ($query);

		if ($user['level']== "1"){
			session_start();
			$_SESSION["admin"]=1;

			header ("location: ../dashboard/");
		} 
	} else {
			header("location: ../?pesan=gagal");
	} 	
?>