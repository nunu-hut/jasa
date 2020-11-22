<?php 
$title = 'Aplikasi Layanan Penyedia Jasa';
$menu = 'beranda';
require_once '_header.php'; ?>

<!-- **** Welcome Maps Area Start **** 
     <div class="welcome-area wow fadeInUp" data-wow-delay="200ms">
        <div class="google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17107.2892861271!2d-74.01626372475907!3d40.714272545051664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1551762805743" allowfullscreen></iframe>
        </div>
    </div>-->
    <!--**** Welcome Maps Area End **** -->

    <div id="dvMap" class="welcome-area wow fadeInUp" data-wow-delay="200ms"></div>
    
    <!-- **** Location Search Form Area **** -->
    <div class="rehomes-search-form-area wow fadeInUp" data-wow-delay="200ms">
        <div class="container">
            <div class="rehomes-search-form">
                <form action="index" method="get">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12 col-md-1 col-lg-1">                                    
                                </div>
                                <div class="col-12 col-md-8 col-lg-8">
                                    <input name="search" id="#cari" class="form-control" placeholder="Cari Jasa">
                                </div>
                                <div class="col-12 col-md-2 col-lg-2">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Cari</button>
                                </div>
                                 <div class="col-12 col-md-1 col-lg-1">                                    
                                </div>                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- **** Location Search Form Area **** -->
    <?php 
    if(isset($_GET['search'])){
        $search = $_GET['search'];
    
     ?>
      <section class="rehome-house-sale-area section-padding-100-60">
        <div class="container" id="cari">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                        <p>Hasil pencarian: <?= $search ?></p>
                    </div>
                </div>
                <?php
                if(isset($_GET['search'])){
                $search = $_GET['search'];
                    $query= mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 from jasa WHERE status=1 AND nama_jasa LIKE '%".$search."%'"); 
                    while ($data = mysqli_fetch_array($query)){
                ?>
                
                <!-- Single Property Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-property-area wow fadeInUp" data-wow-delay="200ms">
                        <!-- Property Thumb -->
                        <div class="property-thumb">
                            <img src="<?php echo $base_url;?>_assets/images/layanan/<?php echo $data['foto1']; ?>" alt="" style="height: 230px">
                        </div>                        

                        <!-- Property Description -->
                        <div class="property-desc-area">
                            <!-- Property Title & Seller -->
                            <div class="property-title-seller d-flex justify-content-between">
                                <!-- Title -->
                                <div class="property-title">
                                    <h4><a href="layanan?id=<?php echo $data['id_jasa'];?>"><?php echo $data['nama_jasa']; ?></a></h4>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $data['keterangan']; ?></p>
                                </div>
                                <!-- Seller -->
                                <div class="property-seller">
                                    <p>By:</p>
                                    <h6><?php echo $data['nama_usaha']; ?></h6>
                                </div>
                            </div>
                            <!-- Property Info -->
                            <div class="property-info-area d-flex flex-wrap" style="height: 130px">
                                <p style="width: 100%; flex: 0 0 100%; max-width: 100%;"><?php echo $data['informasi']; ?></p>
                            </div>
                        </div>

                        <!-- Property Price -->
                        <div class="property-price">
                            <p class="badge-sale">Tersedia</p>
                            <p class="price">Rp <?php echo $data['harga']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    <?php } ?>



    <!-- **** Sale area Start **** -->
    <section class="rehome-house-sale-area section-padding-100-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                        <h2>Layanan <span>Jasa</span></h2>
                        <p>Temukan layanan terbaik. Semua tersedia di Desa Sidakangen dan area terdekat.</p>
                    </div>
                </div>


                <?php
                $query= mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 from jasa WHERE status=1"); 
                while ($data = mysqli_fetch_array($query)){
                ?>
                
                <!-- Single Property Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-property-area wow fadeInUp" data-wow-delay="200ms">
                        <!-- Property Thumb -->
                        <div class="property-thumb">
                            <img src="<?php echo $base_url;?>_assets/images/layanan/<?php echo $data['foto1']; ?>" alt="" style="height: 230px">
                        </div>                        

                        <!-- Property Description -->
                        <div class="property-desc-area">
                            <!-- Property Title & Seller -->
                            <div class="property-title-seller d-flex justify-content-between">
                                <!-- Title -->
                                <div class="property-title">
                                    <h4><a href="layanan?id=<?php echo $data['id_jasa'];?>"><?php echo $data['nama_jasa']; ?></a></h4>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $data['keterangan']; ?></p>
                                </div>
                                <!-- Seller -->
                                <div class="property-seller">
                                    <p>By:</p>
                                    <h6><?php echo $data['nama_usaha']; ?></h6>
                                </div>
                            </div>
                            <!-- Property Info -->
                            <div class="property-info-area d-flex flex-wrap" style="height: 130px">
                                <p style="width: 100%; flex: 0 0 100%; max-width: 100%;"><?php echo $data['informasi']; ?></p>
                            </div>
                        </div>

                        <!-- Property Price -->
                        <div class="property-price">
                            <p class="badge-sale">Tersedia</p>
                            <p class="price">Rp <?php echo $data['harga']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>          

            </div>
        </div>
    </section>
    <!-- **** Sale Area End **** -->

    <!-- **** Choose Us Area Start **** -->
    <section class="rehomes-choose-us-area section-padding-100-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                        <h2><span>Nggampangna</span> Uripmu</h2>
                        <p>Menyediakan layanan untuk kemudahan hidup anda.</p>
                    </div>
                </div>

                <!-- Single choose us content -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-choose-us-content wow fadeInUp" data-wow-delay="200ms">
                        <!-- Choose us Icon -->
                        <div class="choose-us-icon">
                            <i class="icon_search"></i>
                        </div>
                        <h5>Cari Layanan Yang Kamu Butuhkan</h5>
                        <p>Pesan jasa yang kamu butuhkan dan nikmati layanan kami.</p>
                    </div>
                </div>

                <!-- Single choose us content -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-choose-us-content wow fadeInUp" data-wow-delay="200ms">
                        <!-- Choose us Icon -->
                        <div class="choose-us-icon">
                            <i class="icon_building"></i>
                        </div>
                        <h5>Temukan Penyedia Jasa Professional</h5>
                        <p>Anda dapat menemukan jasa yang ahli di bidangnya. </p>
                    </div>
                </div>

                <!-- Single choose us content -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-choose-us-content wow fadeInUp" data-wow-delay="200ms">
                        <!-- Choose us Icon -->
                        <div class="choose-us-icon">
                            <i class="icon_creditcard"></i>
                        </div>
                        <h5>Promosikan Usaha Anda Disini</h5>
                        <p>Mendaftarlah menjadi mitra dan dapatkan lebih banyak pelanggan. </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- **** Choose Us Area End **** -->

    <!-- **** Categories By Property Area Start **** -->
    <section class="rehomes-categories-property-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="200ms">
                        <h2>Jasa Berdasarkan <span>Kategori</span></h2>
                        <p>We have over 8 years of experience and knowledge on how to sell more.</p>
                    </div>
                </div>

                <?php
                $query= mysqli_query($mysqli, "SELECT * FROM kategori_jasa ORDER BY rand(5)"); 
                while($data = mysqli_fetch_assoc($query)){
                ?>
                

                <!-- Single Categories and Property Content -->
                <div class="col-12 col-md-4">
                    <div class="single-categories-property-area bg-gradient-overlay wow fadeInUp" data-wow-delay="200ms">
                        <!-- Property Thumb -->
                        <div class="property-thumb">
                            <a href="<?php echo $base_url;?>layanan?kategori=<?php echo $data['id_kategori'];  ?>#"><img src="_assets/images/layananicon/<?php echo $data['foto'];?>" alt="" style="height: 350px;"></a>
                        </div>
                        <!-- Title -->
                        <a class="categories-title" href="#">Tersedia</a>
                        <!-- Property Name and Price -->
                        <div class="property-name-price-text">
                            <a href="<?php echo $base_url;?>layanan?kategori=<?php echo $data['id_kategori'];  ?>"><?php   echo $data['nama_kategori']; ?></a>
                            <p></p>
                        </div>
                    </div>
                </div>
                 <?php   } ?>
            </div>
        </div>
    </section>
    <!-- **** Categories By Property Area End **** -->


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0Di-e81uG7hXdq7nmcRZqucb3K_YVuF4" async defer></script>
    <script type="text/javascript">
    var markers = [
    <?php
    $sql = mysqli_query($mysqli, "SELECT * FROM jasa");
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
                        infoWindow.setContent('<b>Layanan</b> : ' + data.nama_jasa + '<br>');
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
        }
    </script>

<?php require_once '_footer.php'; ?>
