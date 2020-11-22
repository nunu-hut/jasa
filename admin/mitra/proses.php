<?php
include '../../fungsi/koneksi.php';

if (isset($_POST['tambah'])){

	$id_pengguna = $_POST['id_pengguna'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$no_ktp = $_POST['no_ktp'];
	$jk = $_POST['jk'];
	$status = $_POST['status'];
	$alamat = $_POST['alamat'];

	$foto = $_FILES['foto']['name'];
	$fotosementara = $_FILES['foto']['tmp_name'];
	$format1 = pathinfo($foto, PATHINFO_EXTENSION);
	
	$foto_ktp = $_FILES ['foto_ktp']['name'];
	$fotoktpsementara = $_FILES['foto_ktp']['tmp_name'];
	$format2 = pathinfo($foto_ktp, PATHINFO_EXTENSION);

	$newfoto = 'profil_' . time() . '.' . $format1;
	$newfotoktp = 'ktp_' . time() . '.' . $format2;

	if ($format1 == "jpg" ||$format1 = "png" ||$format1 = "pdf"){
		$folder_tujuan = "../../_assets/images/mitra/";
	
		$uploadgambar = move_uploaded_file($fotosementara, $folder_tujuan.$newfoto);
		move_uploaded_file($fotoktpsementara, $folder_tujuan.$newfotoktp);

		$query = mysqli_query($mysqli, "INSERT INTO mitra VALUES ('', '$id_pengguna', '$nama_lengkap', '$no_ktp', '$jk', '$status', '$alamat', '$newfoto', '$newfotoktp', '1')");

		if($query){
			$query2=mysqli_query($mysqli, "UPDATE pengguna SET level = '3' WHERE id_pengguna = '$id_pengguna'");
			$_SESSION['level']= 3;
		}

		header ("location: index?pesan=add");
		
	}else{
		header ("location: index?pesan=failed");
		exit();
	} 

} else if (isset($_POST['edit'])){

	$id = $_POST['id'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$no_ktp = $_POST['no_ktp'];
	$jk = $_POST['jk'];
	$status = $_POST['status'];
	$alamat = $_POST['alamat'];
	$newfoto ="";
	$newfotoktp="";
	$format="";

	if($_FILES['foto']['size'] == 0){
	$newfoto=$_POST['fotolama'];	
	}else {
	$foto = $_FILES['foto']['name'];
	$tmp1 = $_FILES['foto']['tmp_name'];
	$format = pathinfo($foto, PATHINFO_EXTENSION);

	$newfoto = 'profil_' . time() . '.' . $format;

	$folder_tujuan = "../../_assets/images/mitra/";		

	move_uploaded_file($tmp1, $folder_tujuan.$newfoto);
	}

	if($_FILES['fotoktp']['size'] == 0){
	$newfotoktp=$_POST['fotoktplama'];		
	}else {
	$fotoktp = $_FILES['fotoktp']['name'];
	$tmp2 = $_FILES['fotoktp']['tmp_name'];
	$format2 = pathinfo($fotoktp, PATHINFO_EXTENSION);

	$newfotoktp = 'ktp_' . time() . '.' . $format2;	

	$folder_tujuan = "../../_assets/images/mitra/";		
	move_uploaded_file($tmp2, $folder_tujuan.$newfotoktp);
	}

	$query = mysqli_query($mysqli, "UPDATE mitra SET nama_lengkap='$nama_lengkap', no_ktp='$no_ktp', jk='$jk', status='$status', alamat='$alamat', foto='$newfoto', fotoktp='$newfotoktp'  WHERE id_mitra = '$id' ");
	
	
	header("location: index?pesan=update") ;
	

} else if ($_GET['id']){

	$id = $_GET['id'];

	$query = mysqli_query($mysqli, "DELETE FROM mitra WHERE id_mitra = '$id'");

	if($query){
			$query2=mysqli_query($mysqli, "UPDATE pengguna SET level = '2' WHERE id_pengguna = '$id'");
			$_SESSION['level']= 2;
		}
	
	header("location: index?pesan=delete");
	//*

} elseif (isset($_GET['verifikasi'])) {
	$id_mitra = $_GET['verifikasi'];
	mysqli_query($mysqli, "UPDATE mitra SET verifikasi=1 WHERE id_mitra='$id_mitra'");
	header("location: index");
}
?>