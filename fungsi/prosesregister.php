<?php
session_start();
include 'koneksi.php';	

	//$id_pengguna = $_POST ['id_pengguna'];
	$username = $_POST['username'];
	$no_handphone = $_POST['no_handphone'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$level = "2";

	$query = mysqli_query($mysqli, "INSERT INTO pengguna VALUES ('', '$username', '$password', '$no_handphone', '$email', '$level')");

	$query = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'");
	$user = mysqli_fetch_assoc($query);

	$_SESSION['id_pengguna'] = $user['id_pengguna'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['no_handphone'] = $user['no_handphone'];
	$_SESSION['email'] = $user['email'];
	$_SESSION['level'] = $user['level'];
		
	
	header("location:../index?log=".$_SESSION['id_pengguna']);
	
?>