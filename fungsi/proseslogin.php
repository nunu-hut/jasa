<?php
session_start();

include 'koneksi.php';

$username = $_POST ['username'];
$password = md5($_POST ['password']);

	$query = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'");

	$cek = mysqli_num_rows($query);

	if ($cek > 0){
		$user = mysqli_fetch_assoc ($query);

		if ($user['level']=="2"){
							
			//$_SESSION['client'];
			$_SESSION['id_pengguna'] = $user['id_pengguna'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['no_handphone'] = $user['no_handphone'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['level'] = $user['level'];

			header("location: ../dashboard/?log=".$_SESSION['id_pengguna']);

		} elseif ($user['level']=="3") {
			$_SESSION['id_pengguna'] = $user['id_pengguna'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['no_handphone'] = $user['no_handphone'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['level'] = $user['level'];
			
			header("location:../dashboard/?log=".$_SESSION['id_pengguna']);
			
		}
	} else {
		header("location:../login?pesan=gagal");
	}
	
?>