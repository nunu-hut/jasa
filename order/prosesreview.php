<?php 
include '../fungsi/koneksi.php';
session_start();


	$id_pengguna = $_SESSION['id_pengguna'];

	$id_pesanan = $_POST['id_pesanan'];
	$rating = $_POST['rating']; 
	$komentar = $_POST['komentar']; 


	$query=mysqli_query($mysqli, "INSERT INTO penilaian VALUES ('', '$id_pesanan', now(), '$rating', '$komentar')");


	header("location: index?log=".$id_pengguna);

?>