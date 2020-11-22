<?php
include 'koneksi.php';
$id_pesanan = $_GET['id'];
$status = $_GET['status'];

mysqli_query($mysqli, "UPDATE pesanan SET status='$status' WHERE id_pesanan='$id_pesanan'");
header("location: ../order/");
?>