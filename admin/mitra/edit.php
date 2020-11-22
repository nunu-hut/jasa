<?php
$title = 'Profil Mitra - Edit';
$menu = 'edit-mitra';

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
                  <i class="ni ni-archive-2 text-primary"></i>  Edit Profil Mitra</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              <?php
                $id = $_GET ['id'];
                $query = mysqli_query ($mysqli, "SELECT * FROM mitra WHERE id_mitra = '$id'");
                while ($data = mysqli_fetch_assoc($query)){
              ?>
              <form method="POST" action = "proses.php" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Lengkap</label>
                        <input type="hidden" name="id" value= "<?php echo $data['id_mitra']?>">
                        <input type="text" name="nama_lengkap" class="form-control form-control-alternative" required="" value="<?php echo $data['nama_lengkap'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">No KTP</label>
                        <input type="text" name = "no_ktp" class="form-control form-control-alternative"  required="" value="<?php echo $data['no_ktp'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Jenis Kelamin</label><br>
                          <div class="form-check-inline">
                          <label class="form-check-label mt-3">
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
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alamat</label>
                        <input name="alamat" class="form-control form-control-alternative" type="text" required="" value="<?php echo $data['alamat'];?>">
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
                                    <img src="../../_assets/images/mitra/<?php echo $data['foto'];?>" class="rounded-circle" width="200" height="200">
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="card-body pt-0 pt-md-2">
                            </div>                            
                            <div class="card-body pt-0 pt-md-8">              
                              <div class="text-center">
                                <h3>
                                  Foto Profil<span class="font-weight-light"></span>
                                </h3>                
                              </div>
                            </div>
                          </div>
                          <input type="file" name="foto" class="form-control form-control-alternative">
                          <input type="text" name="fotolama" id="fotolama" value="<?php echo $data['foto']; ?>" hidden>
                      </div>
                    </div>     
                                        <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-foto"></label>                        
                          <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                              <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                  <a>
                                    <img src="../../_assets/images/mitra/<?php echo $data['fotoktp'];?>" class="rounded-circle" width="200" height="200">
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="card-body pt-0 pt-md-2">
                            </div>                            
                            <div class="card-body pt-0 pt-md-8">              
                              <div class="text-center">
                                <h3>
                                  Foto KTP<span class="font-weight-light"></span>
                                </h3>                
                              </div>
                            </div>
                          </div>
                          <input type="file" name="fotoktp" class="form-control form-control-alternative">
                          <input type="text" name="fotoktplama" id="fotoktplama" value="<?php echo $data['fotoktp']; ?>" hidden>
                      </div>
                    </div>      
                  </div>                  
                </div>
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <a href="<?php echo $base_url . 'admin/mitra/'?>"><input type="button"class="btn btn-neutral mr-4" value="Batal"></a>
                    <input type="submit" id="submit" name="edit" class="btn btn-info" value="Simpan">
                  </div>
                </div>          
              </form>
              <?php } ?>
            </div>
          </div>
        </div>
      
      <!-- Footer -->
<?php
require_once '../_layout/footer.php' ;
?>