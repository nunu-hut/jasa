<?php
include '../../fungsi/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Export Data Mitra</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Mitra.xls");
	?>
 
	<center>
		<h1>Data Mitra <br/> Aplikasi Layanan Penyedia Jasa <br/> Desa Sidakangen</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Mitra</th>
			<th>No. KTP</th>
			<th>Jenis Kelamin</th>
			<th>Status</th>
			<th>No. Handphone</th>
			<th>Email</th>
			<th>Alamat</th>
		</tr>
		<?php
		$nomor = 1;
		$query= mysqli_query($mysqli, "SELECT * FROM mitra JOIN pengguna ON mitra.id_pengguna=pengguna.id_pengguna");
        while ($data = mysqli_fetch_assoc($query)){
		?>
		<tr>
			<td><?= $nomor++; ?></td>
			<td><?= $data['nama_lengkap']; ?></td>
			<td><?= $data['no_ktp']; ?></td>
			<td><?= $data['jk']; ?></td>
			<td><?= $data['status']; ?></td>
			<td><?= $data['no_handphone']; ?></td>
			<td><?= $data['email']; ?></td>
			<td><?= $data['alamat']; ?></td>
		</tr>
		<?php 
		}
		?>		
	</table>
</body>
</html>