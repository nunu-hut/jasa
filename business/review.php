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
                                <li class="breadcrumb-item"><a href="<?= $base_url."business/?log=".$_SESSION['id_pengguna']; ?>">Jasa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->

    <section class="rehome-house-sale-area section-padding-100-60">
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <div class="review_list">
                <?php 
                $id_jasa= $_GET['code'];

                $query_review=mysqli_query($mysqli, "SELECT * FROM pesanan JOIN penilaian ON pesanan.id_pesanan=penilaian.id_pesanan JOIN pengguna on pesanan.id_pengguna=pengguna.id_pengguna WHERE pesanan.id_jasa='$id_jasa'");

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
                <?php
                }
                ?>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  
<?php   require_once '../_footer.php'; ?>


                        