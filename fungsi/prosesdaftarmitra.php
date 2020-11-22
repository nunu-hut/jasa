<?php 	
	session_start();
	include 'koneksi.php';
	/*echo '<pre>';
	var_dump($_POST);
	var_dump($_FILES);
	echo '</pre>';
	die();
	*/
	


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
		$folder_tujuan = "../_assets/images/mitra/";
	
		$uploadgambar = move_uploaded_file($fotosementara, $folder_tujuan.$newfoto);
		move_uploaded_file($fotoktpsementara, $folder_tujuan.$newfotoktp);

		$query = mysqli_query($mysqli, "INSERT INTO mitra VALUES ('', '$id_pengguna', '$nama_lengkap', '$no_ktp', '$jk', '$status', '$alamat', '$newfoto', '$newfotoktp', '0')");

		if($query){
			$query2=mysqli_query($mysqli, "UPDATE pengguna SET level = '3' WHERE id_pengguna = '$id_pengguna'");
			$_SESSION['level']= 3;
		}

		
		header ("location: ../dashboard/"); 
	}
?>