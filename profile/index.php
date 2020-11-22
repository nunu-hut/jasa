<?php 

$title = 'Layanan Penyedia Jasa - Profile';
require_once '../_header.php';

?>

<body style="background-color: transparent;">

  <!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-content-two jarallax wow fadeInUp" data-wow-delay="100ms">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url."dashboard/?log=".$_SESSION['id_pengguna']; ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profil Mitra</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****--> 


    <!-- **** Halaman Mitra ****--> 

  <?php
  if($_SESSION['level']==3) {
    # code...
    $log=$_GET['log'];

    $query = mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_pengguna = '$log'");
    while ($data = mysqli_fetch_assoc($query)) {
        $id_pengguna = $data['id_pengguna'];    
        $pengguna = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * from pengguna WHERE id_pengguna='$id_pengguna'"));

  ?>
  
  <div class="main-content" style="background-color: white; padding-left: 200px; padding-right: 200px; padding-bottom: 100px;">
    <div class="container-fluid mt-7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../_assets/images/mitra/<?php  echo $data['foto'];?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-0 pt-md-4 mt-5">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Jasa</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Pesanan</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?= $data['nama_lengkap']; ?><span class="font-weight-light"></span>
                </h3>
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Mitra - Penyedia Jasa
                </div>
                <div class="ni education_hat mr-2">
                  <ul class="my-4">  
                    <li class="fa fa-phone"><p></p></li> <?= $pengguna['no_handphone']; ?><br>
                    <li class="fa fa-envelope"><p></p></li> <?= $pengguna['email']; ?><br>
                    <li class="fa fa-map-marker"><p></p></li> <?= $data['alamat'];?>
                  <ul>
                </div>
                <hr class="my-4" />
                <div class="h6 mt-4">                  
                  <a href="<?php echo $base_url.'_assets/images/mitra/'.$data['fotoktp'];?>" target="_blank">Lihat KTP</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <?php 
        if(isset($_GET['update'])){
          echo ' <div class="alert alert-secondary alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ';
          if($_GET['update'] == "success"){
            echo "&nbsp; Profil mitra berhasil diperbarui.";
          } elseif($_GET['update'] == "failed"){
            echo "&nbsp; Profil mitra tidak berhasil diperbarui";
          }
          echo '</div>';
        }
        ?>
          <div class="card bg-secondary shadow" style="background-color: #edf3f9 !important">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Profil Mitra</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action = "proses.php" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Lengkap</label>
                        <input type="hidden" name="id_mitra" value= "<?php echo $data['id_mitra']?>">
                        <input type="text" name="nama_lengkap" class="form-control form-control-alternative" required="" value="<?php echo $data['nama_lengkap'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">No KTP</label>
                        <input type="text" name = "no_ktp" class="form-control form-control-alternative"  required="" value="<?php echo $data['no_ktp'];?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Jenis Kelamin</label><br>
                        <div class="form-check-inline">
                          <label class="form-check-label mt-2">
                            <input type="radio" name="jk" class="form-check-input" value="Laki-laki" <?php  if($data['jk'] == "Laki-laki"){ echo "checked";} ?>>Laki-laki
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="jk" class="form-check-input" value="Perempuan" <?php  if($data['jk'] == "Perempuan"){echo "checked";} ?>>Perempuan
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Status</label>
                        <input type="text" name="status" class="form-control form-control-alternative" required="" value="<?php echo $data['status'];?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nomor Handphone</label>                        
                        <input type="hidden" name="id_pengguna" value= "<?php echo $data['id_pengguna']?>">
                        <input type="text" name="no_handphone" class="form-control form-control-alternative" required="" value="<?php echo $pengguna['no_handphone'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" name = "email" class="form-control form-control-alternative"  required="" value="<?php echo $pengguna['email'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alamat</label>
                        <textarea name="alamat" class="form-control form-control-alternative" type="text" required=""><?= $data['alamat']; ?></textarea>
                      </div>
                    </div>
                  </div>                  
                </div>                
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4"></h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-foto"></label>                        
                          <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                              <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                  <a>
                                    <img src="../_assets/images/mitra/<?php echo $data['foto'];?>" class="rounded-circle" width="200" height="200">
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="card-body pt-0 pt-md-2">
                            </div>                            
                            <div class="card-body pt-10 pt-md-8">              
                              <div class="text-center">
                                <h3>
                                  Foto Profil<span class="font-weight-light"></span>
                                </h3>                
                              </div>
                            </div>
                          </div>
                          <input type="file" name="foto" class="form-control form-control-alternative">
                          <input type="hidden" name="fotolama" id="fotolama" value="<?php echo $data['foto']; ?>" >
                      </div>
                    </div>                     
                  </div>                  
                </div>
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="submit" name="edit_mitra" id="submit" class="btn btn-info" value="Perbarui">
                  </div>
                </div>          
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } }
include '../_footer.php'; ?>