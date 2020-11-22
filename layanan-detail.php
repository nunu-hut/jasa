<?php 
$title = 'Layanan Penyedia Jasa - Layanan yang tersedia di aplikasi kami';
$menu = 'layanan';

include 'fungsi/koneksi.php';
require_once '_header.php';
?>


<?php
$id=$_GET['id'];
$query= mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa WHERE  id_jasa = '$id'");
while ($data = mysqli_fetch_array($query)){
  $id_jasa= $data['id_jasa'];
  $query2= mysqli_query($mysqli, "SELECT *, sum(rating)/count(rating) AS hasil , count(rating) as jumlah FROM pesanan JOIN penilaian ON pesanan.id_pesanan=penilaian.id_pesanan WHERE pesanan.id_jasa='$id_jasa'");

    $data2=mysqli_fetch_assoc($query2);
    $id_penilaian= $data2['id_penilaian'];
    $id_pesanan = $data2['id_pesanan'];
    
?>
    <div class="properties-hero-area d-flex flex-wrap align-items-center mb-80">
        <div class="properties-slide">
            <!-- Properties Slider -->
            <div id="property-thumb-silde" class="carousel slide wow fadeInUp" data-wow-delay="200ms" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#property-thumb-silde" data-slide-to="0" class="active" style="background-image: url('_assets/images/layanan/<?php echo $data['foto1']; ?>')"></li>
                    <li data-target="#property-thumb-silde" data-slide-to="1" style="background-image: url('_assets/images/layanan/<?php echo $data['foto2']; ?>')"></li>
                    <li data-target="#property-thumb-silde" data-slide-to="2" style="background-image: url('_assets/images/layanan/<?php echo $data['foto3']; ?>')"></li>
                    <li data-target="#property-thumb-silde" data-slide-to="3" style="background-image: url('_assets/images/layanan/<?php echo $data['foto4']; ?>')"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="_assets/images/layanan/<?php echo $data['foto1']; ?>" style="width: 100px; height: 500px;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="_assets/images/layanan/<?= $data['foto2'];?>" style="width: 100px; height: 500px;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="_assets/images/layanan/<?= $data['foto3'];?>" style="width: 100px; height: 500px;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="_assets/images/layanan/<?= $data['foto4'];?>" style="width: 100px; height: 500px;" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="properties-content-area wow fadeInUp" data-wow-delay="200ms">
            <div class="properties-content-info">
                <h2><?php echo $data['nama_jasa'];?></h2>
                <div class="properties-location">
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $data['keterangan'];?></p>
                </div>
                <h4 class="properties-rate">Rp <?php echo $data['harga'];?> <span></span></h4>
                <p><?php echo $data['informasi'];?></p>             
                  <a href="booking?id=<?= $_GET['id']; ?>" class="btn rehomes-btn mt-15">
                    Pesan
                  </a>
            </div>
        </div>
    </div>
  <section class="product_description_area wow fadeInUp" data-wow-delay="200ms">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link " id="lokasi-tab" data-toggle="tab" href="#lokasi" role="tab" aria-controls="lokasi"
            aria-selected="false">Lokasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="jadwal-tab" data-toggle="tab" href="#jadwal" role="tab" aria-controls="jadwal"
            aria-selected="false">Jadwal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Review</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade  " id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
            <div class="search-location-area mb-80">
                <h4 class="mb-30"></h4>

                <!-- Location Maps -->
                <div id="dvMap" class="loction-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19892.026971487212!2d-0.19247374135275525!3d51.4489138369289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sbd!4v1551753138954" allowfullscreen></iframe>
                </div>
                <!-- More Location Btn -->
                <button class="btn more-location-btn"><i class="fa fa-angle-" aria-hidden="true"></i></button>
            </div>                
        </div>        
        <div class="tab-pane fade " id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5><?= $data['jadwal']; ?></h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6 pb-4">
                  <div class="box_total">
                    <h5>Rating Layanan</h5>
                    <h4><?= round($data2['hasil'],2); ?></h4>
                    <h6>(<?= $data2['jumlah']; ?> Review)</h6>
                  </div>
                </div>
              </div>
              <div class="review_list">
                <?php 
                $query_review=mysqli_query($mysqli, "SELECT * FROM pesanan JOIN penilaian ON pesanan.id_pesanan=penilaian.id_pesanan JOIN pengguna on pesanan.id_pengguna=pengguna.id_pengguna WHERE pesanan.id_jasa='$id_jasa'");

                while($data_review=mysqli_fetch_assoc($query_review)){
                ?>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?= $base_url; ?>_assets/images/user/avatar3.jpg" alt="" style="width: 60px; height: 60px;" />
                    </div>
                    <div class="media-body">
                      <h4><?=  $data_review['username']; ?></h4>
                      <h5><?= $data_review['waktu']; ?></h5>

                      <p>
                      <?php if ($data_review['rating']==1) {?> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==2) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==3) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==4) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data_review['rating']==5) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>   
                    <?php } ?>
                    </p>
                    </div>
                  </div>
                  <p>
                    <?= $data_review['komentar']; ?>
                  </p>
                </div>
                <?php
                }
                ?>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0Di-e81uG7hXdq7nmcRZqucb3K_YVuF4" async defer></script>
    <script type="text/javascript">
    var markers = [
    <?php
    $id= $_GET['id'];
    $sql = mysqli_query($mysqli, "SELECT * FROM jasa WHERE id_jasa='$id'");
    while(($data =  mysqli_fetch_assoc($sql))) {
    ?>
    {
        "lat": '<?php echo $data['latitude']; ?>',
         "long": '<?php echo $data['longitude']; ?>',
         "nama_jasa": '<?php echo $data['nama_jasa']; ?>'
    },
    <?php
    }
    ?>
    ];
    </script>
    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
            center: new google.maps.LatLng(-7.427860,109.336575),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }; 
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            for (i = 0; i < markers.length; i++) {
                var data = markers[i];
                var latnya = data.lat;
                var longnya = data.long;
        
                var myLatlng = new google.maps.LatLng(latnya, longnya);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.nama_jasa
                });
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent('<b>Layanan</b> : ' +  data.nama_jasa + '<br>');
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
        }
    </script>


<?php #}
  } require_once '_footer.php';?>