<?php
$title = 'Edit Pengguna';
$menu = 'edit-pengguna';

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
                  <i class="ni ni-archive-2 text-primary"></i>  Edit Pengguna</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            <?php
              $id = $_GET['id'];
              $query = mysqli_query ($mysqli, "SELECT * FROM pengguna WHERE id_pengguna = '$id'");
              while ($data = mysqli_fetch_assoc($query)){
            ?>
              <form method="POST" action="proses.php">
                <h6 class="heading-small text-muted mb-4">Data Pengguna</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="hidden" name="id" value= "<?php echo $data['id_pengguna']?>">
                        <input type="text" id="input-username" name="username" class="form-control form-control-alternative" required = "" value="<?php echo $data['username'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Password</label>
                        <input type="password" id="input-password" name="password" class="form-control form-control-alternative" required = "" value= "<?php echo $data['password'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" >Nomor Handphone</label>
                        <input type="text" name="no_handphone" class="form-control form-control-alternative" required = "" value= "<?php echo $data['no_handphone'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Alamat Email</label>
                        <input type="email" id="input-email" name="email" class="form-control form-control-alternative" required = "" value= "<?php echo $data['email'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <a href="<?php echo $base_url . 'admin/pengguna'?>" class="btn btn-neutral">Batal</a>
                        <input type="submit" name="edit" class="btn btn-info" value="Simpan">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />                
              </form>
            <?php } ?>
            </div>
          </div>
        </div>
      
      <!-- Footer -->
<?php require_once '../_layout/footer.php';?>