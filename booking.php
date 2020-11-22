<?php 


$title = 'Layanan Penyedia Jasa - Pesan Jasa';
$menu = 'booking';
require_once '_header.php';


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
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="<?= $base_url. 'layanan?id='.$_GET['id']; ?>">Layanan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pesan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->  

  
  <div class="main-content" style="background-color: white; padding-left: 200px; padding-right: 200px; padding-bottom: 100px;">
    
    <!-- End Navbar -->
    <!-- Header -->
    <?php   
    
    
     ?>
    <!-- Page content -->
    <div class="container-fluid mt-7">
      <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-2 mb-5 mb-xl-5">
          <div class="card bg-secondary shadow" style="background-color: #edf3f9 !important">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Pesan</h3>
                </div>                
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action = "fungsi/prosesbooking.php">
                <h6 class="heading-small text-muted mb-4">Waktu & Tanggal Pesanan</h6>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Waktu</label>
                        <input type="hidden" name="id_pengguna" class="form-control form-control-alternative" required="" value="<?= $_SESSION['id_pengguna']; ?>">
                        <input type="hidden" name="id_jasa" class="form-control form-control-alternative" required="" value="<?= $_GET['id']; ?>">
                        <input type="time" name="waktu" class="form-control form-control-alternative" required="" value="<?php echo date('H:i');?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Tanggal</label>
                        <input type="date" name = "tanggal" class="form-control form-control-alternative"  required="" value="<?php echo date('Y-m-d');?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nomor Handphone (WhatsApp)</label>
                        <input type="text" name="no_handphone" class="form-control form-control-alternative" required="" value="<?= $_SESSION['no_handphone']; ?>">
                      </div>
                    </div>
                    <hr class="my-4" />                
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="submit" id="submit"class="btn btn-primary" value="Pesan">
                      </div>
                    </div>
                  </div>                          
                </div>          
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</body>
<?php 
    require_once '_footer.php'
   ?>   