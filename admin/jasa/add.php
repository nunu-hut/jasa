<?php
$title = 'Profil Jasa - Add';
$menu = 'add-jasa';

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
      <!-- Tabel Profil Usaha -->
      <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> 
                  <i class="ni ni-archive-2 text-primary"></i>  Tambah Profil Jasa</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="proses.php" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Data Jasa</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" >Nama Mitra</label>
                        <select class="form-control" name="id_mitra">
                          <?php 
                          $query = mysqli_query($mysqli, "SELECT * FROM mitra ORDER BY nama_lengkap ASC");
                          while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                            <option value="<?= $data['id_mitra'];?>"><?= $data['nama_lengkap'];?></option>
                            <?php 
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" >Nama Usaha</label>
                        <input type="hidden" name="id">
                        <input type="text" name="nama_usaha" class="form-control form-control-alternative" required="" placeholder="Contoh: Slyth Barber">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Nama Jasa</label>
                        <input type="text" name="nama_jasa" class="form-control form-control-alternative" required="" placeholder="Contoh: Cukur Rambut">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Bidang Jasa</label>
                          <select class="form-control" name="id_kategori">
                            <?php 
                            $query = mysqli_query($mysqli, "SELECT * FROM kategori_jasa ORDER BY nama_kategori ASC");
                            while ($data = mysqli_fetch_assoc($query)) {
                              ?>
                              <option value="<?= $data['id_kategori'];?>"><?= $data['nama_kategori'];?></option>
                              <?php 
                            }
                            ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">Rp </span>
                          </div>
                          <input type="number" name="harga" class="form-control form-control-alternative pl-2" required="" placeholder="Tuliskan Harga atau Kisaran Harga">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Informasi -->
                <h6 class="heading-small text-muted mb-4">Informasi</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Jadwal</label>
                        <textarea rows="6" name="jadwal" class="form-control form-control-alternative" required="" placeholder="Tambahkan Jadwal Operasional"></textarea>
                      </div>
                    </div>
                  </div>                  
                </div> 
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Info Jasa</label>
                        <textarea rows="4" name="informasi" class="form-control form-control-alternative" required="" placeholder="Tambahkan Informasi Mengenai Jasa agar Pelanggan Lebih Memahami Usaha Anda"></textarea>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Keterangan</label>
                          <select class="form-control" name="keterangan">
                            <option class="form-control form-control-alternative" value="Dapat dipanggil">Dapat dipanggil</option>
                            <option class="form-control form-control-alternative" value="Hanya di tempat">Hanya di tempat</option>
                          </select>
                      </div>
                    </div>
                  </div>                  
                </div>                
                <hr class="my-4" />
                <!-- Lokasi -->
                <h6 class="heading-small text-muted mb-4">Lokasi</h6>
                <div class="pl-lg-0">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                          <label class="form-control-label" for="input-address"></label>
                           <input class="form-control form-control-alternative" type="text" name="alamat" id="alamat" placeholder="Inputkan Alamat Lokasi"><br>
                            <button type="button" class="btn" onclick="getlonglat()"> Cari Koordinat </button><br>
                            <div class="inputan-long-lat"></div>
                          </div>
                      </div>
                    </div>
                  </div>
               </div>
                <hr class="my-4" />
                <!-- Foto -->
                <h6 class="heading-small text-muted mb-4">Album Jasa</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Foto</label>
                        <input type="file" name="foto1" class="form-control form-control-alternative" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Foto</label>
                        <input type="file" name = "foto2" class="form-control form-control-alternative">
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Foto</label>
                        <input type="file" name="foto3" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Foto</label>
                        <input type="file" name = "foto4" class="form-control form-control-alternative">
                      </div>
                    </div>
                  </div>                  
                </div>
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <a href="<?php echo $base_url . 'admin/jasa/'?>"><input type="button"class="btn btn-neutral mr-4" value="Batal"></a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB0Di-e81uG7hXdq7nmcRZqucb3K_YVuF4"></script>

<script>
function getlonglat(){
 var geocoder =  new google.maps.Geocoder();
 var alamat = document.getElementById("alamat").value;
    geocoder.geocode( { 'address': alamat}, function(results, status) {
    //alert(status)
      if (status == google.maps.GeocoderStatus.OK) {
      var Lat = results[0].geometry.location.lat();
      var Lng = results[0].geometry.location.lng();
       $('.inputan-long-lat').html("Longitude<br><input class='form-control form-control-alternative' type='text' name='latitude' value='"+Lat+"'/><br/>Latitude<br><input class='form-control form-control-alternative' type='text' name='longitude' value='"+Lng+"'/>"); 
      } else {
        $('.inputan-long-lat').text("Something got wrong " + status);
      }
    });
}
</script>