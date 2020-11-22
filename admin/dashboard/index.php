<?php 
$title = 'Dashboard';
$menu = 'dashboard';

require_once '../auth.php';
require_once '../_layout/header.php';

$query=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE level=2");
$jumlah_pelanggan = mysqli_num_rows($query);

$query=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE level=3");
$jumlah_mitra = mysqli_num_rows($query);

$query=mysqli_query($mysqli, "SELECT * FROM jasa");
$jumlah_jasa = mysqli_num_rows($query);

$query=mysqli_query($mysqli, "SELECT * FROM pesanan");
$jumlah_pesanan = mysqli_num_rows($query);
?>

    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0">Pelanggan</h3>
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px;"><?= $jumlah_pelanggan ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0">Mitra</h3>
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px;"><?= $jumlah_mitra?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0">Jasa</h3>
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px;" ><?= $jumlah_jasa ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fab fa-servicestack"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-0">Pesanan</h3>
                      <span class="h2 font-weight-bold mb-0" style="font-size: 50px;"><?= $jumlah_pesanan?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="ni ni-basket"></i>
                      </div>
                    </div>
                  </div> 
                </div>
              </div>              
            </div>          
          </div>
        </div>
      </div>
    </div>
    <div> 
      <div>
        <div> </div>
      </div>
    </div>

    

        
<?php require_once '../_layout/footer.php';?>