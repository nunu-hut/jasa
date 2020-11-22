<?php 
include '../../fungsi/koneksi.php'; 

	$id = $_GET['id'];

	$query = mysqli_query($mysqli, "DELETE FROM penilaian WHERE id_penilaian='$id' ");

	header("location: index?pesan=delete");

?>