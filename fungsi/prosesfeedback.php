<?php 
include 'koneksi.php'; 

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$query = mysqli_query($mysqli, "INSERT INTO feedback VALUES ('', '$nama', '$email', '$pesan')");

if ($query) {
	echo 'berhasil';
} else{
	echo 'gagal';
}

header('location: ../kontak?help')

?>