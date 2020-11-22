<?php 
$title = 'Layanan Penyedia Jasa - Dashboard';
require_once '../_header.php';
?>

<!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-content-two jarallax wow fadeInUp" data-wow-delay="100ms">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url."dashboard/?log=".$_SESSION['id_pengguna']; ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Menu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->

    <?php  
    if($_SESSION['level']==3){ 
    ?>

    <!-- **** Menu Area Start **** -->
    <section class="about-us-area section-padding-100-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-title mb-40 wow fadeInUp" data-wow-delay="200ms">
                        <h2>Selamat Datang<span> Mitra Penyedia Jasa</span></h2>
                        <p>Silahkan klik menu di bawah ini.</p>
                    </div>
                </div>

                <!-- Single Menu Area -->
                <div class="col-12 col-md-4 col-lg-3 text-center">
                    <div class="wow fadeInUp" data-wow-delay="200ms">
                        <!-- Thumb -->
                        <div class="single-about-thumb">
                            <a href="<?= $base_url."account/?log=".$_SESSION['id_pengguna']; ?>"><img src="<?php echo $base_url; ?>_assets/images/menu/1.png" alt="" style="width: 100px; height: 100px;"></a>
                        </div>
                        <h5 >Akun Saya</h5>
                        <p></p>
                    </div>
                </div> 

                <!-- Single Menu Area -->
                <div class="col-12 col-md-4 col-lg-3 text-center">
                    <div class="wow fadeInUp" data-wow-delay="200ms">
                        <!-- Thumb -->
                        <div class="single-about-thumb">
                            <a href="<?= $base_url."profile/?log=".$_SESSION['id_pengguna']; ?>"><img src="<?php echo $base_url; ?>_assets/images/menu/5.jpg" alt="" style="width: 100px; height: 100px;"></a>
                        </div>
                        <h5 >Profil</h5>
                        <p></p>
                    </div>
                </div>               

                <!-- Single Menu Area -->
                <div class="col-12 col-md-4 col-lg-3 text-center">
                    <div class="wow fadeInUp" data-wow-delay="200ms">
                        <!-- Thumb -->
                        <div class="single-about-thumb">
                            <a href="<?= $base_url."business/?log=".$_SESSION['id_pengguna']; ?>"><img src="<?php echo $base_url; ?>_assets/images/menu/2.png" alt="" style="width: 100px; height: 100px;">
                            </a>
                        </div>
                        <h5>Jasa</h5>
                        <p></p>
                    </div>
                </div>

                <!-- Single Menu Area -->
                <div class="col-12 col-md-4 col-lg-3 text-center" >
                    <div class="wow fadeInUp" data-wow-delay="200ms">
                        <!-- Thumb -->
                        <div class="single-about-thumb">
                            <a href="<?= $base_url."order/?log=".$_SESSION['id_pengguna']; ?>"><img src="<?php echo $base_url; ?>_assets/images/menu/3.png" alt="" style="width: 100px; height: 100px;">
                            </a>
                        </div>
                        <h5>Pesanan</h5>
                        <p></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- **** Menu Area End **** -->
    <?php   } elseif($_SESSION['level']==2) {
    ?>

    <section class="about-us-area section-padding-100-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-title mb-40 wow fadeInUp" data-wow-delay="200ms">
                        <h2>Selamat Datang<span> Pelanggan</span></h2>
                        <p>Silahkan klik menu di bawah ini.</p>
                    </div>
                </div>

                <!-- Single Menu Area -->
                <div class="col-12 col-md-6 col-lg-6 text-center">
                    <div class="wow fadeInUp" data-wow-delay="200ms">
                        <!-- Thumb -->
                        <div class="single-about-thumb">
                            <a href="<?= $base_url."account/?log=".$_SESSION['id_pengguna']; ?>"><img src="<?php echo $base_url; ?>_assets/images/menu/1.png" alt=""  style="width: 100px; height: 100px;"></a>
                        </div>
                        <h5>Akun Saya</h5>
                        <p></p>
                    </div>
                </div>

                <!-- Single Menu Area -->
                <div class="col-12 col-md-4 col-lg-4 text-center" >
                    <div class="wow fadeInUp" data-wow-delay="200ms">
                        <!-- Thumb -->
                        <div class="single-about-thumb">
                            <a href="<?= $base_url."order/?log=".$_SESSION['id_pengguna']; ?>"><img src="<?php echo $base_url; ?>_assets/images/menu/3.png" alt="" style="width: 100px; height: 100px;">
                            </a>
                        </div>
                        <h5>Pesanan</h5>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- **** Menu Area End **** -->
    <?php   } ?>
   

<?php   require_once '../_footer.php' ?>