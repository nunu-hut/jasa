<?php
session_start();
include '../fungsi/koneksi.php';

if(isset($_POST['submit'])){
	$id_pengguna=$_POST['id_pengguna'];
	$password_lama=md5($_POST['password_lama']);
	$password_baru=md5($_POST['password_baru']);

	$query=mysqli_query($mysqli, "SELECT password FROM pengguna WHERE password='$password_lama' && id_pengguna='$id_pengguna'");
	$num=mysqli_fetch_array($query);
	if($num>0) {
		$con=mysqli_query($con,"UPDATE pengguna SET password= '$password_baru' WHERE id_pengguna='$id_pengguna'");
		$_SESSION['msg1']="Password berhasil diganti !!";
	} else {
		$_SESSION['msg1']="Password tidak sama !!";
	}
	header("location: change-password?log=".$id_pengguna);
}
?>