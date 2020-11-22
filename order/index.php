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

                      $query=mysqli_query($mysqli, "SELECT id_jasa FROM jasa WHERE id_mitra='$id_mitra'");
                      while ($data=mysqli_fetch_assoc($query)){

                        $id_jasa=$data['id_jasa'];

                        $query2= mysqli_query($mysqli, "SELECT pesanan.*, pengguna.username, jasa.nama_jasa FROM pesanan JOIN pengguna ON pengguna.id_pengguna=pesanan.id_pengguna JOIN jasa ON jasa.id_jasa=pesanan.id_jasa WHERE pesanan.id_jasa='$id_jasa'");

                        while ($data = mysqli_fetch_assoc($query2)){ 
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
                      <?php } } ?>                                         
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

      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Jasa yang dipesan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $id_pengguna=$_GET['log'];
                $query= mysqli_query($mysqli, "SELECT * from pesanan WHERE id_pengguna='$id_pengguna'"); 

                while ($data = mysqli_fetch_array($query)){ 
                  $id_jasa=$data['id_jasa'];
                  $jasa = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa WHERE id_jasa='$id_jasa'"));

                  $id_pesanan = $data['id_pesanan'];
                  $penilaian = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM penilaian WHERE id_pesanan = '$id_pesanan'"));



                ?>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="d-flex">
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
                        </div>
                        <div class="media-body">
                          <p><?= $jasa['nama_jasa']; ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5><?= $jasa['harga']; ?></h5>
                    </td>
                    <td>
                      <h5><?= $data['waktu']; ?></h5>
                    </td>
                    <td>
                      <h5><?= $data['tanggal']; ?></h5>
                    </td>
                    <td>
                      <h5 class="badge badge-warning"><?= $data['status']; ?></h5>
                    </td>
                    <td>
                      <?php if ($data['status']=='Selesai' && !isset($penilaian['id_penilaian'])) {
                      ?>
                      <!--  -->
                      <a href="<?php echo $base_url.'order/review?id='.$data['id_pesanan']; ?>"><span class="btn btn-sm btn-info">Berikan penilaian</span></a>
                      <?php } if (isset($penilaian['id_penilaian'])){ ?>
                      <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-review<?= $penilaian['id_penilaian']; ?>">Lihat penilaian</span>                         
                      <?php } ?>
                    </td> 

                     <div id="view-review<?= $penilaian['id_penilaian']; ?>" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Penilaian Layanan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>                   
                          </div>
                          <div class="modal-body">
                            <div class="card-body">
                              <div class="form-group">              
                                <div class="col-lg-12">
                                  <div class="review_box">
                                    <div class="media">
                                      <div class="d-flex">
                                        <div class="avatar-group">
                                          <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto1'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 1" style="width: 50px; height: 50px;">
                                            <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto1'];?>" class="rounded-circle">
                                          </a>
                                          <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto2'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 2" style="width: 50px; height: 50px;">
                                            <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto2'];?>" class="rounded-circle">
                                          </a>
                                          <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto3'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 3" style="width: 50px; height: 50px;">
                                            <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto3'];?>" class="rounded-circle">
                                          </a>
                                          <a href="<?= $base_url.'_assets/images/layanan/'.$jasa['foto4'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 4" style="width: 50px; height: 50px;">
                                            <img alt="Image placeholder" src="<?= $base_url.'_assets/images/layanan/'.$jasa['foto4'];?>" class="rounded-circle">
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="media-body">
                                      <p><?= $jasa['nama_jasa']; ?></p>
                                    </div>
                                  </div>
                                
                                  <div class="review-box">
                                    <p><br><?php echo $penilaian['waktu']; ?></p>
                                  </div>
                                  <div class="review_box">
                                    <p>
                                      <?php if ($penilaian['rating']==1) {?> 
                                        <i class="fa fa-star text-yellow"></i> 
                                      <?php } elseif ($penilaian['rating']==2) { ?>
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star text-yellow"></i> 
                                      <?php } elseif ($penilaian['rating']==3) { ?>
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star text-yellow"></i> 
                                      <?php } elseif ($penilaian['rating']==4) { ?>
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star text-yellow"></i> 
                                      <?php } elseif ($penilaian['rating']==5) { ?>
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star text-yellow"></i>                                            
                                        <i class="fa fa-star text-yellow"></i>                                            
                                        <i class="fa fa-star text-yellow"></i>                                            
                                        <i class="fa fa-star text-yellow"></i>   
                                    <?php } ?>
                                    </p>
                                  </div>
                                  <div class="text-sm">
                                    <p>
                                      <?php echo $penilaian['komentar']; ?>
                                    </p>
                                  </div>
                                </div> 
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <?php } ?> 
                    </tr>                                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </section>
<?php  
  require '../_footer.php';
?>