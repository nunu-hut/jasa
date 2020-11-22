<?php
$title = 'Layanan Penyedia Jasa - Order'; 
require_once '../_header.php';
?>

<body>

  <!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-content-two jarallax wow fadeInUp" data-wow-delay="100ms">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url."dashboard/?log=".$_SESSION['id_pengguna']; ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->


    <!-- HALAMAN PESANAN MITRA PENYEDIA JASA -->

    <?php if($_SESSION['level']==3){
    ?>

      <section class="rehome-house-sale-area section-padding-100-60">
        <div class="container">
          <div class="row">
            <div class="col-12">
                <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                    <h4><span>Pesanan</span></h4>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card"  style="border-style: none;">
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table class="table table-hover align-items-center">
                      <thead>
                        <tr>
                          <th>Nama Pemesan</th>
                          <th>Jasa yang dipesan</th>
                          <th>Waktu</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>Pilihan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $id_pengguna=$_SESSION['id_pengguna'];
                      $data=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_mitra FROM mitra WHERE id_pengguna='$id_pengguna'"));
                      $id_mitra=$data['id_mitra'];
                      $data=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_jasa FROM jasa WHERE id_mitra='$id_mitra'"));
                      $id_jasa=$data['id_jasa'];

                      $query= mysqli_query($mysqli, "SELECT pesanan.*, pengguna.username, jasa.nama_jasa FROM pesanan JOIN pengguna ON pengguna.id_pengguna=pesanan.id_pengguna JOIN jasa ON jasa.id_jasa=pesanan.id_jasa WHERE pesanan.id_jasa='$id_jasa'");  
                      while ($data = mysqli_fetch_assoc($query)){ 
                      ?>
                      <tr>
                        <td scope="row">
                          <span class="mb-0 text-sm"><?= $data ['username'];?></span>
                        </td>                        
                        <td>
                          <span class="mb-0 text-sm"><?= $data ['nama_jasa'];?></span>
                        </td>
                        <td>
                          <span class="mb-0 text-sm"><?= $data ['waktu'];?></span>
                        </td>
                        <td>
                          <span class="mb-0 text-sm"><?= $data ['tanggal'];?></span>
                        </td>
                        <td>
                          <a href="#" class="badge badge-warning"><?= $data['status'];?></a>
                        </td>  
                        <td>
                          <?php 
                          if (strtolower($data['status'])=='dipesan') {
                            ?>
                            <a href="../fungsi/changestatusbooking.php?id=<?= $data['id_pesanan'] ?>&status=Diterima" class="btn btn-sm btn-primary">Terima</a>
                            <a href="../fungsi/changestatusbooking.php?id=<?= $data['id_pesanan'] ?>&status=Ditolak" class="btn btn-sm btn-danger">Tolak</a>
                            <?php
                          }elseif (strtolower($data['status'])=='diterima' /*|| strtolower($data['status'])=='ditolak'*/) {
                            ?>
                            <a href="../fungsi/changestatusbooking.php?id=<?= $data['id_pesanan'] ?>&status=Selesai" class="btn btn-sm btn-primary">Selesai</a>
                            <?php
                          }
                          ?>
                          
                        </td>                        
                      </tr>
                      <?php } ?>                                         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- HALAMAN PESANAN PELANGGAN -->
      <?php } elseif ($_SESSION['level']==2) {
       
      ?>          
      <section class="rehome-house-sale-area section-padding-100-60">
        <div class="container">
          <div class="row">
            <div class="col-12">
                <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                    <h4><span>Pesanan</span></h4>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card"  style="border-style: none;">
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Jasa yang dipesan</th>
                          <th>Waktu</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>Detail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      $id_pengguna=$_GET['log'];
                      $query= mysqli_query($mysqli, "SELECT * from pesanan WHERE id_pengguna='$id_pengguna'");  
                      while ($data = mysqli_fetch_array($query)){ 
                        $id_jasa=$data['id_jasa'];
                        $jasa = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa WHERE id_jasa='$id_jasa'"));                        
                      ?>
                      <tr>
                        <td scope="row">
                          <div class="avatar-group">
                            <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto1'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 1">
                              <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto1'];?>" class="rounded-circle">
                            </a>
                            <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto2'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 2">
                              <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto2'];?>" class="rounded-circle">
                            </a>
                            <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto3'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 3">
                              <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto3'];?>" class="rounded-circle">
                            </a>
                            <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto4'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 4">
                              <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto4'];?>" class="rounded-circle">
                            </a>
                          </div>  
                          <span class="mb-0 text-sm"><?= $jasa['nama_jasa']; ?></span>                          
                        </td>
                        <td>
                          <span class="mb-0 text-sm"><?= $data ['waktu'];?></span>
                        </td>
                        <td>
                          <span class="mb-0 text-sm"><?= $data ['tanggal'];?></span>
                        </td> 
                        <td>
                          <span class="badge badge-dot mr-4" style="font-size: 15px;">
                            <i class="bg-danger"></i> <?= $data['status']; ?>
                          </span>
                        </td>
                        <td>                 
                          <div class="d-flex fixed-left-content-between">                            
                            <a href="#" style="font-size: 18px;">
                              <i class="arrow_carrot-right_alt2" > </i>
                            </a>                            
                          </div>
                          <div class="mt-50">
                            <span class="btn btn-sm btn-secondary">Berikan Penilaian</span>                            
                          </div>
                        </td>                   
                      </tr>

                      <?php } ?>                                         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


<?php }
  require '../_footer.php';
?>