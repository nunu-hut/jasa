<?php
include '../../fungsi/koneksi.php';

if (isset($_POST['tambah'])){

	$nama_kategori = $_POST['nama_kategori'];
	$deskripsi = $_POST['deskripsi'];

	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$format = pathinfo($foto, PATHINFO_EXTENSION);

	$newfoto = 'kategori_' . time() . '.' . $format;
		
	$folder_tujuan = "../../_assets/images/layananicon/";	

	if($format == 'jpg' || $format == 'jpeg' || $format == 'png' || $format == 'JPG' || $format == 'JPEG' || $format == 'PNG'){		
		$upload_gambar = move_uploaded_file($tmp, $folder_tujuan.$newfoto);

		$query=mysqli_query($mysqli, "INSERT INTO kategori_jasa VALUES ('', '$nama_kategori','$deskripsi','$newfoto')");
		
		header("location: index?pesan=add");

	}

} else if (isset($_POST['edit'])){
	
	$id = $_POST['id'];

	$nama_kategori = $_POST['nama_kategori'];
	$deskripsi = $_POST['deskripsi'];
	
	if($_FILES['foto']['size'] == 0){
	$newfoto=$_POST['fotolama'];		
	}else {
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$format = pathinfo($foto, PATHINFO_EXTENSION);
	$newfoto = 'kategori_' . time() . '.' . $format;
	$folder_tujuan = "../../_assets/images/layananicon/";		
		if($format == 'jpg' || $format == 'jpeg' || $format == 'png' || $format == 'JPG' || $format == 'JPEG' || $format == 'PNG'){
			//unlink('../../_assets/images/layananicon/' . $newfoto);
			$upload_gambar = move_uploaded_file($tmp, $folder_tujuan.$newfoto);
		}	
	}

	$query=mysqli_query($mysqli, "UPDATE kategori_jasa SET nama_kategori='$nama_kategori', deskripsi='$deskripsi', foto='$newfoto' WHERE id_kategori = '$id' ");
	
	header("location: index?pesan=update");	

} else if ($_GET['id']){

	$id = $_GET['id'];

	$hapus = mysqli_query($mysqli, "DELETE FROM kategori_jasa WHERE id_kategori = '$id'");

	header ("location: index?pesan=delete");

}

?>