<?php 

include '../fungsi/koneksi.php';

if (isset($_POST['tambah'])){

	$id_pengguna=$_POST['id_pengguna'];

	$id_mitra = $_POST ['id_mitra'];
	$id_kategori = $_POST ['id_kategori'];

	$nama_usaha = $_POST ['nama_usaha'];
	$nama_jasa = $_POST ['nama_jasa'];	
	$harga = $_POST ['harga'];
	$jadwal = $_POST ['jadwal'];
	$informasi = $_POST ['informasi'];
	$keterangan = $_POST ['keterangan'];
	$latitude = $_POST ['latitude'];
	$longitude = $_POST ['longitude'];

	$foto1 = $_FILES ['foto1']['name'];
	$fotosementara1 = $_FILES['foto1']['tmp_name'];
	$format1 = pathinfo($foto1, PATHINFO_EXTENSION);

	$foto2 = $_FILES ['foto2']['name'];
	$fotosementara2 = $_FILES['foto2']['tmp_name'];
	$format2 = pathinfo($foto2, PATHINFO_EXTENSION);

	$foto3 = $_FILES ['foto3']['name'];
	$fotosementara3 = $_FILES['foto3']['tmp_name'];
	$format3 = pathinfo($foto3, PATHINFO_EXTENSION);

	$foto4 = $_FILES ['foto4']['name'];
	$fotosementara4 = $_FILES['foto4']['tmp_name'];
	$format4 = pathinfo($foto4, PATHINFO_EXTENSION);

	$newfoto1 = 'layanan' . time() . '(1)' . '.' . $format1;
	$newfoto2 = 'layanan' . time() . '(2)' .  '.' . $format2;
	$newfoto3 = 'layanan' . time() . '(3)' . '.' . $format3;
	$newfoto4 = 'layanan' . time() . '(4)' . '.' . $format4;

	$gabung_foto = $newfoto1 . "-" . $newfoto2 . "-" . $newfoto3 . "-" . $newfoto4;

	if ($format1 == "jpg" || $format1="jpeg" || $format1 = "png" ){
		$folder_tujuan = "../_assets/images/layanan/";
	
		$uploadgambar = move_uploaded_file($fotosementara1, $folder_tujuan.$newfoto1);
		move_uploaded_file($fotosementara2, $folder_tujuan.$newfoto2);
		move_uploaded_file($fotosementara3, $folder_tujuan.$newfoto3);
		move_uploaded_file($fotosementara4, $folder_tujuan.$newfoto4);

		$query = mysqli_query($mysqli, "INSERT INTO jasa VALUES ('', '$id_mitra','$id_kategori', '$nama_usaha', '$nama_jasa', '$harga', '$jadwal', '$informasi', '$keterangan', '$latitude', '$longitude', '$gabung_foto', '0')");

		if($query){
			echo 'berhasil';
		} else {
			echo 'gagal';
		}
		header ("location: index?pesan=add"); 
	}


} else if (isset($_POST['edit'])) {

	//Deklarasi Variabel dan Folder upload
	$id_pengguna=$_POST['id_pengguna'];

	$id_kategori = $_POST ['id_kategori'];

	$nama_usaha = $_POST ['nama_usaha'];
	$nama_jasa = $_POST ['nama_jasa'];	
	$harga = $_POST ['harga'];
	$jadwal = $_POST ['jadwal'];
	$informasi = $_POST ['informasi'];
	$keterangan = $_POST ['keterangan'];
	$latitude = $_POST ['latitude'];
	$longitude = $_POST ['longitude'];

	$id=$_POST['id_jasa'];
	$newfoto1="";
	$newfoto2="";
	$newfoto3="";
	$newfoto4="";

	$folder_tujuan = "../_assets/images/layanan/";

	//Foto Pertama
	if($_FILES['foto1']['size'] == 0){ 	//Kalo ga upload foto baru
		$newfoto1=$_POST['fotolama1'];		
	}else {								//Kalo upload foto baru
		$foto1 = $_FILES ['foto1']['name'];
		$fotosementara1 = $_FILES['foto1']['tmp_name'];
		$format1 = pathinfo($foto1, PATHINFO_EXTENSION);
		$newfoto1 = 'layanan' . time() . '(1)' . '.' . $format1;
		if($format1 == 'jpg' || $format1 == 'jpeg' || $format1 == 'png' || $format1 == 'JPG' || $format1 == 'JPEG' || $format1 == 'PNG'){		
			move_uploaded_file($fotosementara1, $folder_tujuan.$newfoto1);
		}
	}

	//Foto Kedua
	if($_FILES['foto2']['size'] == 0){ 	//Kalo ga upload foto baru
		$newfoto2=$_POST['fotolama2'];		
	}else {								//Kalo upload foto baru
		$foto2 = $_FILES ['foto2']['name'];
		$fotosementara2 = $_FILES['foto2']['tmp_name'];
		$format2 = pathinfo($foto2, PATHINFO_EXTENSION);
		$newfoto2 = 'layanan' . time() . '(2)' . '.' . $format2;
		if($format2 == 'jpg' || $format2 == 'jpeg' || $format2 == 'png' || $format2 == 'JPG' || $format2 == 'JPEG' || $format2 == 'PNG'){		
			move_uploaded_file($fotosementara2, $folder_tujuan.$newfoto2);
		}
	}

	//Foto Ketiga
	if($_FILES['foto3']['size'] == 0){ 	//Kalo ga upload foto baru
		$newfoto3=$_POST['fotolama3'];		
	}else {								//Kalo upload foto baru
		$foto3 = $_FILES ['foto3']['name'];
		$fotosementara3 = $_FILES['foto3']['tmp_name'];
		$format3 = pathinfo($foto3, PATHINFO_EXTENSION);
		$newfoto3 = 'layanan' . time() . '(3)' . '.' . $format3;
		if($format3 == 'jpg' || $format3 == 'jpeg' || $format3 == 'png' || $format3 == 'JPG' || $format3 == 'JPEG' || $format3 == 'PNG'){		
			move_uploaded_file($fotosementara3, $folder_tujuan.$newfoto3);
		}
	}

	//Foto Keempat
	if($_FILES['foto4']['size'] == 0){ 	//Kalo ga upload foto baru
		$newfoto4=$_POST['fotolama4'];		
	}else {								//Kalo upload foto baru
		$foto4 = $_FILES ['foto4']['name'];
		$fotosementara4 = $_FILES['foto4']['tmp_name'];
		$format4 = pathinfo($foto4, PATHINFO_EXTENSION);
		$newfoto4 = 'layanan' . time() . '(4)' . '.' . $format4;
		if($format4 == 'jpg' || $format4 == 'jpeg' || $format4 == 'png' || $format4 == 'JPG' || $format4 == 'JPEG' || $format4 == 'PNG'){		
			move_uploaded_file($fotosementara4, $folder_tujuan.$newfoto4);
		}
	}

	$gabung_foto = $newfoto1 . "-" . $newfoto2 . "-" . $newfoto3 . "-" . $newfoto4;
	$edit = mysqli_query($mysqli, "UPDATE jasa SET id_kategori='$id_kategori', nama_usaha='$nama_usaha', nama_jasa='$nama_jasa', harga='$harga', jadwal='$jadwal', informasi='$informasi', keterangan='$keterangan', latitude='$latitude', longitude='$longitude', foto='$gabung_foto' WHERE id_jasa = '$id' ");

	if ($edit) {
		echo "berhasil";
	} else {
		echo "gagal";
	}

	header ("location: index?pesan=update"); 
}
 ?>