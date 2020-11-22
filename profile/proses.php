<?php

include '../fungsi/koneksi.php';


	$id_pengguna = $_POST['id_pengguna'];
	$no_handphone = $_POST['no_handphone'];
	$email = $_POST['email']; 


	$id_mitra = $_POST['id_mitra'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$no_ktp = $_POST['no_ktp'];
	$jk = $_POST['jk'];
	$status = $_POST['status'];
	$alamat = $_POST['alamat'];

	if($_FILES['foto']['size'] == 0){
		$newfoto=$_POST['fotolama'];
	} else {
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
		$format1 = pathinfo($foto, PATHINFO_EXTENSION);
		$newfoto = 'profil_' . time() . '.' . $format1;
		$folder_tujuan = "../_assets/images/mitra/";		
	
		if($format1 == 'jpg' || $format1 == 'jpeg' || $format1 == 'png'|| $format1 == 'PNG'){
			//unlink('../_assets/images/mitra/' . $newfoto);		

			$upload_gambar = move_uploaded_file($tmp, $folder_tujuan.$newfoto);
		}		
	}
	
	$edit = mysqli_query($mysqli, "UPDATE mitra SET nama_lengkap='$nama_lengkap', no_ktp='$no_ktp', jk='$jk', status='$status', alamat='$alamat', foto='$newfoto' WHERE id_mitra = '$id_mitra' ");

	$edit2 = mysqli_query($mysqli, "UPDATE pengguna SET no_handphone='$no_handphone', email='$email' WHERE id_pengguna = '$id_pengguna'");
	
	header("location: index?log=".urlencode($id_pengguna)."&update=success");

	

	?>