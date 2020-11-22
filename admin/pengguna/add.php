<?php
$title = 'Tambah Pengguna';
$menu = 'add-pengguna';

require_once '../auth.php';
require_once '../_layout/header.php'
?>


    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">            
          <!-- Card stats -->          
        </div>
      </div>
    </div>

    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> 
                  <i class="ni ni-archive-2 text-primary"></i>  Tambah Pengguna</h3>
                </div>
              </div>
            </div>            
            <div class="card-body">
              <form method="POST" action="proses.php">
                <h6 class="heading-small text-muted mb-4">Data Pengguna</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="hidden" name="id">
                        <input type="text" id="input-username" name="username" class="form-control form-control-alternative" required = "" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Password</label>
                        <input type="password" id="input-password" name="password" class="form-control form-control-alternative" required = "" placeholder="*******">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-no-handphone">Nomor Handphone</label>
                        <input type="text" id="input-no-handphone" name="no_handphone" class="form-control form-control-alternative" required = "" value="62">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Alamat Email</label>
                        <input type="email" id="input-email" name="email" class="form-control form-control-alternative" required= "" placeholder="Email" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <a href="<?php echo $base_url . 'admin/pengguna'?>" class="btn btn-neutral">Batal</a>
                        <input type="submit" id="submit" name="tambah" class="btn btn-info" value="Simpan">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
              </form>
            </div>
          </div>
        </div>
      <!-- Footer -->
<?php
require_once '../_layout/footer.php' ;
?>