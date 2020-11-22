<?php
$title = 'Edit Profil Jasa';
$menu = 'edit-jasa';

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
                  <i class="ni ni-archive-2 text-primary"></i>  Edit Profil Jasa</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php
                $id = $_GET ['id'];
                $query = mysqli_query ($mysqli, "SELECT *,SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa WHERE id_jasa = '$id'");
                while ($data = mysqli_fetch_assoc($query)){
                  $id_mitra=$data['id_mitra'];
                  $keterangan=$data['keterangan'];
                  $mitra = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT nama_lengkap from mitra WHERE id_mitra = '$id_mitra'"));
                  $nama_mitra=$mitra['nama_lengkap'];

                  $id_kategori=$data['id_kategori'];
                  $fotolama1=$data['foto1'];
                  $fotolama2=$data['foto2'];
                  $fotolama3=$data['foto3'];
                  $fotolama4=$data['foto4'];
                  $lat=$data['latitude'];
                  $long=$data['longitude'];

                  $kategori_jasa = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT nama_kategori FROM kategori_jasa WHERE id_kategori='$id_kategori'"));
                  $nama_kategori=$kategori_jasa['nama_kategori'];

                  

              ?>
              <form method="POST" action="proses.php" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Data Jasa</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" >Nama Mitra</label>
                        <input type="text" name="nama_lengkap" class="form-control form-control-alternative" required="" value="<?= $nama_mitra; ?>" readonly>
                        <input type="text" name="id_jasa" value= "<?php echo $id?>" hidden>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" >Nama Usaha</label>
                        <input type="text" name="nama_usaha" class="form-control form-control-alternative" required="" value="<?= $data['nama_usaha']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Nama Jasa</label>                        
                        <input type="hidden" name="id">
                        <input type="text" name="nama_jasa" class="form-control form-control-alternative" required="" value="<?= $data['nama_jasa']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Bidang Jasa</label>
                          <select class="form-control" name="id_kategori">
                             <?php 
                              $q=mysqli_query($mysqli, "SELECT * from kategori_jasa");
                              while($kate=mysqli_fetch_array($q)){                                 
                              
                                      if(($kate['id_kategori'])==$id_kategori){?>
                                      <option selected value="<?php echo $kate['id_kategori']; ?>"> <?php echo $kate['nama_kategori'];?> </option>
                                      <?php 
                                    }else{
                                      ?>
                                      <option value="<?php echo $kate['id_kategori']; ?>"> <?php echo $kate['nama_kategori'];?> </option>
                                    
                              <?php
                              }}
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
                          <input type="number" name="harga" class="form-control form-control-alternative pl-2" required="" value="<?= $data['harga']; ?>">
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
                        <textarea rows="6" name="jadwal" class="form-control form-control-alternative" required="" value="<?= $data['jadwal']; ?>"><?= $data['jadwal']; ?></textarea>
                      </div>
                    </div>
                  </div>                  
                </div> 
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Info Jasa</label>
                        <textarea rows="4" name="informasi" class="form-control form-control-alternative" required="" value="<?= $data['informasi']; ?>"><?= $data['informasi']; ?></textarea>
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
                            <option <?php if($keterangan=="Dapat dipanggil"){echo "selected";} ?> class="form-control" value="Dapat dipanggil">Dapat dipanggil</option>
                            <option <?php if($keterangan=="Hanya di tempat"){echo "selected";} ?> class="form-control" value="Hanya di tempat">Hanya di tempat</option>
                          </select>
                      </div>
                    </div>
                  </div>                  
                </div>                
                <hr class="my-4" />
                <!-- Lokasi -->
                <h6 class="heading-small text-muted mb-4">Lokasi</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Latitude</label>
                        <input type="text" name="latitude" class="form-control form-control-alternative" placeholder="Latitude" value="<?php echo $lat; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Longitude</label>
                        <input type="text" name="longitude" class="form-control form-control-alternative" placeholder="Longitude" value="<?php echo $long; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                      <label class="form-control-label" for="input-address"></label>
                        <input class="form-control form-control-alternative" type="text" name="alamat" id="alamat" placeholder="Inputkan Alamat Lokasi Baru (Jika butuh untuk diedit)"><br>
                        <button type="button" onclick="getlonglat()"> Cari Koordinat </button><br>
                        <div class="inputan-long-lat"></div>
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
                        <img src="../../_assets/images/layanan/<?php echo $fotolama1; ?>" class="img-fluid" style="height: 240px;">
                        <input type="file" name="foto1" class="form-control form-control-alternative">
                        <input type="text" name="fotolama1" value="<?php echo $fotolama1; ?>" hidden>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <img src="../../_assets/images/layanan/<?php echo $fotolama2; ?>" class="img-fluid" style="height: 240px;">
                        <input type="file" name = "foto2" class="form-control form-control-alternative">
                        <input type="text" name="fotolama2" value="<?php echo $fotolama2; ?>" hidden>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <img src="../../_assets/images/layanan/<?php echo $fotolama3; ?>" class="img-fluid" style="height: 240px;">
                        <input type="file" name="foto3" class="form-control form-control-alternative">
                        <input type="text" name="fotolama3" value="<?php echo $fotolama3; ?>" hidden>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <img src="../../_assets/images/layanan/<?php echo $fotolama4; ?>" class="img-fluid" style="height: 240px;">
                        <input type="file" name = "foto4" class="form-control form-control-alternative">
                        <input type="text" name="fotolama4" value="<?php echo $fotolama4; ?>" hidden>
                      </div>
                    </div>
                  </div>                  
                </div>
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <a href="<?php echo $base_url . 'admin/profil-usaha/'?>"><input type="button"class="btn btn-neutral mr-4" value="Batal"></a>
                    <input type="submit" id="submit" name="edit" class="btn btn-info" value="Simpan">
                  </div>
                </div>          
              </form>
            <?php   } ?>
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