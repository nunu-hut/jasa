<?php
$title = 'Layanan Penyedia Jasa - Business'; 
require_once '../_header.php';
?>

<style type="text/css">
  .form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border-radius: .25rem;
    border-style: none;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
</style>

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
                                <li class="breadcrumb-item active" aria-current="page">Tambah Jasa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->
    
    <!-- partial -->

    <section class="rehome-house-sale-area section-padding-100-60">
      <div class="container">
        <div class="row">
          <div class="col-12">
              <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                  <h2><span>Tawarkan</span> Jasa</h2>
              </div>
          </div>    
          <div class="container-fluid mt-5">
            <!-- Tabel Profil Usaha -->
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary" style="background-color: #f7fafc !important; border-style: none;">
                  <div class="card-body">
                    <?php
                    $id_pengguna=$_GET['log'];
                    $data=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_mitra FROM mitra WHERE id_pengguna='$id_pengguna'"));
                    $id_mitra=$data['id_mitra'];
                    
                    ?>
                    <form method="POST" action="proses.php" enctype="multipart/form-data">
                      <h6 class="heading-small text-muted mb-4">Data Jasa</h6>
                      <div class="pl-lg-4" style="border-style: none;">                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group" style="border-style: none;">
                              <label class="form-control-label" >Nama Usaha</label>
                              <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?> ">
                              <input type="hidden" name="id_mitra" value="<?php echo $id_mitra; ?>">
                              <input type="text" name="nama_usaha" class="form-control" style="border-style: none;" required="" placeholder="Contoh: Slyth Barber">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label">Nama Jasa</label>
                              <input type="text" name="nama_jasa" class="form-control" required="" placeholder="Contoh: Cukur Rambut">
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
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label"></br>Harga</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-primary text-white">Rp</span>
                                </div>
                                <input type="number" name="harga" class="form-control pl-2" placeholder="Tuliskan harga atau kisaran harga">
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
                              <textarea rows="6" name="jadwal" class="form-control" required="" placeholder="Tambahkan Jadwal Operasional"></textarea>
                            </div>
                          </div>
                        </div>                  
                      </div> 
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label">Info Jasa</label>
                              <textarea rows="4" name="informasi" class="form-control" required="" placeholder="Tambahkan Informasi Mengenai Jasa agar Pelanggan Lebih Memahami Usaha Anda"></textarea>
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
                                  <option class="form-control" value="Dapat dipanggil">Dapat dipanggil</option>
                                  <option class="form-control" value="Hanya di tempat">Hanya di tempat</option>
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
                               <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Inputkan Alamat Lokasi"><br>
                                <button type="button" onclick="getlonglat()"> Cari Koordinat </button><br>
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
                              <input type="file" name="foto1" class="form-control" required="">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label">Foto</label>
                              <input type="file" name = "foto2" class="form-control">
                            </div>
                          </div>
                        </div>                  
                      </div>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label">Foto</label>
                              <input type="file" name="foto3" class="form-control">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label">Foto</label>
                              <input type="file" name = "foto4" class="form-control">
                            </div>
                          </div>
                        </div>                  
                      </div>
                      <hr class="my-4" />                
                      <div class="col-lg-6">
                        <div class="form-group">
                          <a href="<?php echo $base_url . 'business'?>"><input type="button"class="btn btn-secondary mr-4" value="Batal"></a>
                          <input type="submit" id="submit" name="tambah" class="btn btn-primary" value="Simpan">
                        </div>
                      </div>          
                    </form>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


      <!-- Footer -->
<?php
require_once '../_footer.php' ;
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
       $('.inputan-long-lat').html("Longitude<br><input class='form-control' type='text' name='latitude' value='"+Lat+"'/><br/>Latitude<br><input class='form-control' type='text' name='longitude' value='"+Lng+"'/>"); 
      } else {
        $('.inputan-long-lat').text("Something got wrong " + status);
      }
    });
}
</script>