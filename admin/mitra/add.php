<?php
$title = 'Profil Mitra - Add';
$menu = 'add-mitra';

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
                  <i class="ni ni-archive-2 text-primary"></i>  Tambah Profil Mitra</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="proses.php" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <select class="form-control" name="id_pengguna">
                          <?php 
                          $query = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE level=2 ORDER BY username ASC");
                          while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                            <option value="<?= $data['id_pengguna'];?>"><?= $data['username'];?></option>
                            <?php 
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Lengkap</label>
                        <input type="hidden" name="id">
                        <input type="text" name="nama_lengkap" class="form-control form-control-alternative" required="" placeholder="Tulis nama lengkap anda tanpa disingkat">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">No KTP</label>
                        <input type="number" name = "no_ktp" class="form-control form-control-alternative" required=""  placeholder="Isi Sesuai KTP Anda">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Jenis Kelamin</label><br>
                        <div class="form-check-inline">
                          <label class="form-check-label mt-3">
                            <input type="radio" name="jk" class="form-check-input" value="Laki-laki">Laki-laki
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="jk" class="form-check-input" value="Perempuan">Perempuan
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Status</label>
                        <input type="text" name="status" class="form-control form-control-alternative" required="" placeholder="Isi Sesuai KTP Anda">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Alamat -->
                <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control form-control-alternative" required=""  placeholder="Jalan Arsadipati no 20 Sidakangen, Kecamatan Kalimanah, Kabupaten Purbalingga">
                      </div>
                    </div>
                  </div>                  
                </div>                
                <hr class="my-4" />
                <!-- Foto -->
                <h6 class="heading-small text-muted mb-4">Foto</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Foto</label>
                        <input type="file" name="foto" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Foto KTP</label>
                        <input type="file" name = "foto_ktp" class="form-control form-control-alternative" required="">
                      </div>
                    </div>
                  </div>                  
                </div>
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <a href="<?php echo $base_url . 'admin/mitra/'?>"><input type="button"class="btn btn-neutral mr-4" value="Batal"></a>                   
                    <input type="submit" id="submit" name="tambah" class="btn btn-info" value="Simpan">
                  </div>
                </div>          
              </form>
            </div>
          </div>
        </div>
     
      <!-- Footer -->
<?php
require_once '../_layout/footer.php' ;
?>