<?php
$title = 'Layanan Penyedia Jasa - Business'; 
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
                                <li class="breadcrumb-item active" aria-current="page">Jasa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->

  <!-- Table -->
    <section class="rehome-house-sale-area section-padding-100-60">
      <div class="container">
        <div class="row">
          <div class="col-12">
              <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                  <h4><span>Jasa</span> Saya</h4>
              </div>
          </div>
          <div class="container-fluid">
          <div class="l_w_title">
            <a href="<?= $base_url."business/new?log=".$_SESSION['id_pengguna']; ?>" class="btn_3">Tambah</a>
          </div>    
            <div class="row mt-5" >
        
              <div class="col">
                <?php 
                if(isset($_GET['pesan'])){
                  echo ' <div class="alert alert-secondary alert-dismissable wow fadeInUp" data-wow-delay="200ms">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ';
                  if($_GET['pesan'] == "add"){
                    echo "&nbsp; Jasa berhasil ditambahkan.";
                  } elseif($_GET['pesan'] == "update"){
                    echo "&nbsp; Jasa berhasil diperbarui";
                  }
                  echo '</div>';
                }
                ?>
                <div class="table-responsive table-hover">
                  <table class="table align-items-center table-flush">
                    <thead class="">
                      <tr>
                        <th scope="col">Nama Usaha</th>
                        <th scope="col">Nama Jasa</th>
                        <th scope="col">Bidang Jasa</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>                    
                        <th scope="col">Rating</th>                    
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $id_pengguna = $_SESSION['id_pengguna'];
                      $query= mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_pengguna = '$id_pengguna'");
                      $data = mysqli_fetch_assoc($query);
                      $id_mitra = $data['id_mitra'];

                      $query2= mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa WHERE id_mitra = '$id_mitra'");
                      while($data = mysqli_fetch_assoc($query2)){
                        $id_kategori = $data['id_kategori'];
                        $kategori = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT nama_kategori FROM kategori_jasa WHERE id_kategori = '$id_kategori'"));
                        $nama_kategori=$kategori['nama_kategori'];

                        $id_jasa= $data['id_jasa'];

                        $query=(mysqli_query($mysqli, "SELECT *, sum(rating)/count(rating) AS hasil FROM pesanan JOIN penilaian ON pesanan.id_pesanan=penilaian.id_pesanan WHERE pesanan.id_jasa='$id_jasa'"));

                        while ($penilaian=mysqli_fetch_assoc($query)) {


                      ?>
                      <tr>
                        <td scope="row">  
                          <span class="mb-0 text-sm"><?= $data ['nama_usaha'];?></span>
                        </td>
                        <td>
                          <div class="avatar-group">
                            <a href="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto1'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 1">
                              <img alt="Image placeholder" src="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto1'];?>" class="rounded-circle">
                            </a>
                            <a href="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto2'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 2">
                              <img alt="Image placeholder" src="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto2'];?>" class="rounded-circle">
                            </a>
                            <a href="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto3'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 3">
                              <img alt="Image placeholder" src="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto3'];?>" class="rounded-circle">
                            </a>
                            <a href="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto4'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 4">
                              <img alt="Image placeholder" src="<?php echo $base_url ?>_assets/images/layanan/<?= $data['foto4'];?>" class="rounded-circle">
                            </a>
                          </div>
                          <span class="mb-0 text-sm"><?= $data ['nama_jasa'];?></span>
                        </td>
                        <td>
                          <span class="mb-0 text-sm"><?= $nama_kategori;?></span>
                        </td>
                        <td>
                          <span class="mb-0 text-sm"><?= $data ['harga'];?></span>
                        </td>
                        <td>
                          <?php 
                          if($data['status']==0){
                            echo '<a href="proses.php?status='.$data['id_jasa'].'" class="badge badge-danger">Belum Aktif</a>';
                          } else {
                            echo '<a class="badge badge-warning">Aktif</a>';
                          }
                          ?>
                        </td>                                                    
                        <td>                 
                          <div class="d-flex fixed-left-content-between">
                          <span data-toggle="tooltip" data-original-title="klik untuk  selengkapnya">                            
                            <a href="<?= $base_url; ?>business/detail?id=<?= $data['id_jasa'] ?>" style="font-size: 18px;">
                              <i class="arrow_carrot-right_alt2 mr-4" > </i>
                            </a></span>                          
                          </div>
                        </td>
                        <td>
                          <div class="d-flex fixed-left-content-between">
                            <!----><span data-toggle="tooltip" data-original-title="klik untuk selengkapnya">
                            <a href="<?= $base_url.'business/review?code='.$data['id_jasa'];?>">
                            <span data-toggle="modal" data-target="#view-review"><h3><?php echo $penilaian['hasil']; ?></h3></span></span></a>                        
                          </div>
                        </td>
                        <?php } } ?> 
                      </tr>               
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>


<!-- Modal Rating -->

<div id="view-review" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Penilaian</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>                   
      </div>
      <div class="modal-body">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6 pb-4">
                  
                </div>
              </div>
              <div class="review_list">
                <?php

                $id_pengguna = $_SESSION['id_pengguna'];
                $query= mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_pengguna = '$id_pengguna'");
                $data = mysqli_fetch_assoc($query);
                $id_mitra = $data['id_mitra'];

                $query2= mysqli_query($mysqli, "SELECT * FROM jasa WHERE id_mitra = '$id_mitra'");
                while($data = mysqli_fetch_assoc($query2)){
                  $id_jasa=$data['id_jasa'];

                $query_review=mysqli_query($mysqli, "SELECT * FROM jasa JOIN pesanan ON jasa.id_jasa=pesanan.id_jasa JOIN penilaian ON pesanan.id_pesanan=penilaian.id_pesanan  JOIN pengguna on pesanan.id_pengguna=pengguna.id_pengguna WHERE pesanan.id_jasa='$id_jasa'");

                while($data_review=mysqli_fetch_assoc($query_review)){
                ?>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?= $base_url; ?>_assets/images/user/avatar3.jpg" alt="" style="width: 60px; height: 60px;" />
                    </div>
                    <div class="media-body">
                      <h4><?=  $data_review['username']; ?></h4>
                      <h5><?= $data_review['waktu']; ?></h5>

                      <p>
                      <?php if ($data_review['rating']==1) {?> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==2) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==3) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==4) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==5) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>   
                    <?php } ?>
                    </p>
                    </div>
                  </div>
                  <p>
                    <?= $data_review['komentar']; ?>
                  </p>
                </div>
              <?php } } ?>
                              
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



</html>
<?php   require_once '../_footer.php'; ?>


                        