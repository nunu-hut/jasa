<?php
include '../../fungsi/koneksi.php';

	
if (isset($_POST['tambah'])){

	//$id = $_GET ['id'];
	$username = $_POST['username'];
	$no_handphone = $_POST['no_handphone'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$level = "2";

	$query = mysqli_query($mysqli, "INSERT INTO pengguna VALUES ('', '$username', '$password', '$no_handphone', '$email', '$level')");

	

	header ("location: index?pesan=add"); 

} elseif (isset($_POST['edit'])){

	$id = $_POST['id'];
	$username = $_POST['username'];
	$no_handphone = $_POST['no_handphone'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$query = mysqli_query($mysqli, "UPDATE pengguna SET username='$username', password='$password', no_handphone='$no_handphone', email='$email' WHERE id_pengguna = '$id' ");

	header("location: index?pesan=update") ;

} elseif ($_GET['id']){

	$id = $_GET['id'];
	
	$query = mysqli_query($mysqli, "DELETE FROM pengguna WHERE id_pengguna = '$id'");
	
	header ("location: index?pesan=delete");
}

?>