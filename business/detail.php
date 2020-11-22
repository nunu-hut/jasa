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
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->

    <?php                  
    $id = $_GET ['id'];
    $query = mysqli_query ($mysqli, "SELECT *,SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa WHERE id_jasa = '$id'");
    while ($data = mysqli_fetch_assoc($query)){
      $id_mitra=$data['id_mitra'];
      $mitra = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT nama_lengkap from mitra WHERE id_mitra = '$id_mitra'"));
      $nama_mitra=$mitra['nama_lengkap'];

      $id_kategori=$data['id_kategori'];
      $fotolama1=$data['foto1'];
      $fotolama2=$data['foto2'];
      $fotolama3=$data['foto3'];
      $fotolama4=$data['foto4'];
      $lat=$data['latitude'];
      $long=$data['longitude'];

      $keterangan=$data['keterangan'];

      $kategori_jasa = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT nama_kategori FROM kategori_jasa WHERE id_kategori='$id_kategori'"));
      $nama_kategori=$kategori_jasa['nama_kategori'];
    ?>

  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-5">
          <div class="product_slider_img">
            <div id="vertical">
              <div class="row mb-20">
                <div class="col-12">
                  <div data-thumb="<?php echo $base_url.'_assets/images/layanan/'.$data['foto1']; ?>">
                    <img src="<?php echo $base_url.'_assets/images/layanan/'.$data['foto1']; ?>" />
                  </div>                  
                </div>
              </div>
              <div class="row">
                <div class="col-4 mx-0">  
                  <div data-thumb="<?php echo $base_url.'_assets/images/layanan/'.$data['foto1']; ?>">
                    <img src="<?php echo $base_url.'_assets/images/layanan/'.$data['foto2']; ?>" style="height: 110px; width: 100%">
                  </div>
                </div>
                <div class="col-4 mx-0">  
                  <div data-thumb="<?php echo $base_url.'_assets/images/layanan/'.$data['foto1']; ?>">
                    <img src="<?php echo $base_url.'_assets/images/layanan/'.$data['foto3']; ?>"  style="height: 110px; width: 100%">
                  </div>
                </div>
                <div class="col-4 mx-0">  
                  <div data-thumb="<?php echo $base_url.'_assets/images/layanan/'.$data['foto1']; ?>">
                    <img src="<?php echo $base_url.'_assets/images/layanan/'.$data['foto4']; ?>"  style="height: 110px; width: 100%">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7 offset-lg-2 ml-0">
          <div class="card bg-secondary" style="background-color: #f5f8fa !important; border-style: none;">
            <div class="card-body">              
              <form method="POST" action="proses.php" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Data Layanan</h6>
                <div class="pl-lg-4" style="border-style: none;">                        
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group" style="border-style: none;">
                        <label class="form-control-label" >Nama Usaha</label>
                        <input type="hidden" name="id_jasa" value="<?php echo $id; ?>">
                        <input type="text" name="nama_usaha" class="form-control" style="border-style: none;" required="" placeholder="Contoh: Slyth Barber" value="<?php echo $data['nama_usaha']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Nama Jasa</label>
                        <input type="text" name="nama_jasa" class="form-control" required="" placeholder="Contoh: Cukur Rambut" value="<?php echo $data['nama_jasa']; ?>">
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
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label"></br>Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">Rp</span>
                          </div>
                          <input type="number" name="harga" class="form-control  pl-2" aria-label="Amount (to the nearest dollar)" placeholder="Tuliskan harga atau kisaran harga" value="<?php echo $data['harga']; ?>">
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
                        <textarea rows="6" name="jadwal" class="form-control" required="" value="<?php echo $data['jadwal']; ?>"><?php  echo $data['jadwal']; ?></textarea>
                      </div>
                    </div>
                  </div>                  
                </div> 
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Info Jasa</label>
                        <textarea rows="4" name="informasi" class="form-control" required="" placeholder="Tambahkan Informasi Mengenai Layanan agar Pelanggan Lebih Memahami Usaha Anda" value="<?php echo $data['informasi']; ?>"><?php echo $data['informasi']; ?></textarea>
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
                        <label class="form-control-label"></label>
                        <img src="../_assets/images/layanan/<?php echo $fotolama1; ?>" class="img-fluid" style="height: 200px;">
                        <input type="file" name="foto1" class="form-control form-control-alternative">
                        <input type="text" name="fotolama1" value="<?php echo $fotolama1; ?>" hidden>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label"></label>
                        <img src="../_assets/images/layanan/<?php echo $fotolama2; ?>" class="img-fluid" style="height: 200px;">
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
                        <label class="form-control-label"></label>
                        <img src="../_assets/images/layanan/<?php echo $fotolama3; ?>" class="img-fluid" style="height: 200px;">
                        <input type="file" name="foto3" class="form-control form-control-alternative">
                        <input type="text" name="fotolama3" value="<?php echo $fotolama3; ?>" hidden>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label"></label>
                        <img src="../_assets/images/layanan/<?php echo $fotolama4; ?>" class="img-fluid" style="height: 200px;">
                        <input type="file" name = "foto4" class="form-control form-control-alternative">
                        <input type="text" name="fotolama4" value="<?php echo $fotolama4; ?>" hidden>
                      </div>
                    </div>
                  </div>                  
                </div>
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <a href="<?= $base_url."business/?log=".$_SESSION['id_pengguna']; ?>"><input type="button"class="btn btn-secondary mr-4" value="Kembali"></a>
                    <input type="submit" id="submit" name="edit" class="btn btn-primary" value="Perbarui">
                  </div>
                </div>          
              </form>
            </div>
          </div>
        </div>     
      </div>
    </div>
  </div>
    <?php   } ?>
  <!--================End Single Product Area =================-->


<?php   require_once '../_footer.php'; ?>


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