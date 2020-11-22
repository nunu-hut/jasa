<?php 
include 'koneksi.php'; 

	$id_pengguna = $_POST['id_pengguna'];
	$id_jasa = $_POST['id_jasa'];
	$waktu = $_POST['waktu'];
	$tanggal = $_POST['tanggal'];
	$no_handphone = $_POST['no_handphone'];
	$status = 'Dipesan';

	$query = mysqli_query($mysqli, "INSERT INTO pesanan VALUES ('', '$id_pengguna', '$id_jasa', '$waktu', '$tanggal', '$no_handphone', '$status')");

	//$data_terakhir= mysqli_fetch_array(mysqli_query($mysqli, "SELECT LAST_INSERT_ID();"));
	$id_pesanan=mysqli_insert_id($mysqli);

	header("location: ../confirmation?id=".urlencode($id_pesanan));

	
?>