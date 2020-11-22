<html>
<head>
	
  <!-- CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Aplikasi Layanan Penyedia Jasa</title>
</head>
<body>
 
	<center>
		<h2>MITRA PENYEDIA JASA</h2>
		<h4>APLIKASI LAYANAN PENYEDIA JASA - LADENI.COM</h4>
	</center>
 
	<br/>


	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Nama Lengkap</th>
		    <th scope="col">Nomor KTP</th>
		    <th scope="col">Jenis Kelamin</th>
		    <th scope="col">Status</th>
		    <th scope="col">No Handphone</th>
		    <th scope="col">Email</th>                    
		    <th scope="col">Alamat</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	include '../../fungsi/koneksi.php';
	  	$nomor=1;
	  $query= mysqli_query($mysqli, "SELECT * FROM mitra JOIN pengguna ON mitra.id_pengguna = pengguna.id_pengguna WHERE mitra.verifikasi=1");
	  while($data = mysqli_fetch_assoc($query)){

	    ?>
	    <tr>
	      <th scope="row"><?php echo $nomor++; ?></th>
	      <td><?= $data['nama_lengkap']; ?></td>
	      <td><?= $data['no_ktp']; ?></td>
	      <td><?= $data['jk']; ?></td>
	      <td><?= $data['status']; ?></td>
	      <td><?= $data['no_handphone']; ?></td>
	      <td><?= $data['email']; ?></td>
	      <td><?= $data['alamat']; ?></td>
	    </tr>
	    <?php } ?>    
	  </tbody>
	</table>
 
	
          
</body>
 
	<script>
		window.print();
	</script>
	