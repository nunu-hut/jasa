<?php 
$title = 'Layanan Penyedia Jasa - Layanan yang tersedia di aplikasi kami';
$menu = 'layanan';

require_once '_header.php';
 ?>

<!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-area bg-img bg-overlay-2 wow fadeInUp" data-wow-delay="200ms" style="background-image: url(<?php echo $base_url;?>_assets/client/img/bg-img/image_6.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Layanan</li>
                            </ol>
                        </nav>
                        <h2 class="page-title">Layanan Jasa</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End **** -->

    <!-- **** area Start **** -->
    <section class="rehome-house-sale-area section-padding-80">
        <div class="container">
            <div class="row">
                <?php
                $kategori = $_GET['kategori'];
                $query= mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa  where id_kategori = '$kategori' AND status=1"); 
                while ($data = mysqli_fetch_array($query)){
                ?>
                
                <!-- Single Jasa Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-property-area wow fadeInUp" data-wow-delay="200ms">
                        <!-- Jasa Thumb -->
                        <div class="property-thumb">
                            <img src="<?php echo $base_url;?>_assets/images/layanan/<?php echo $data['foto1']; ?>" alt="" style="height: 230px">
                        </div>                        

                        <!-- Jasa Description -->
                        <div class="property-desc-area">
                            <!-- Jasa Title & Seller -->
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
                            <!-- Jasa Info -->
                            <div class="property-info-area d-flex flex-wrap" style="height: 130px">
                                <p style="width: 100%; flex: 0 0 100%; max-width: 100%;"><?php echo $data['informasi']; ?></p>
                            </div>
                        </div>

                        <!-- Jasa Price -->
                        <div class="property-price">
                            <p class="badge-sale">Tersedia</p>
                            <p class="price">Rp <?php echo $data['harga']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>  
            </div>

            <div class="row">
                <!-- Pagination and Page Counter Area -->
                <div class="col-12">
                    <div class="rehomes-pagination-counter mt-15 d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-delay="200ms">
                        <!-- Pagination 
                        <nav class="rehomes-pagination">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link active" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>-->

                        <!-- Page Counter
                        <div class="page-counter">
                            <p>Page <span>1</span> of <span>60</span> results</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- **** Sale Area End **** -->
   
<?php require_once '_footer.php'; ?>