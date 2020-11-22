<?php 
$title = 'Layanan Penyedia Jasa - Login';
$menu = 'login';

require_once '_header.php';
?>

    <!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-content-two jarallax wow fadeInUp" data-wow-delay="100ms">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding wow fadeInUp" data-wow-delay="200ms">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Belum Memiliki Akun?</h2>
                            <p>Buat akun dan bergabunglah untuk menikmati layanan atau menjadi mitra kami.</p>
                            <a href="<?php echo $base_url; ?>register" class="btn_3">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Selamat Datang Kembali ! <br>
                                Login sekarang</h3>
                            <?php 
                            if(isset($_GET['pesan'])){
                              echo ' <div class="alert alert-primary alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ';
                              if($_GET['pesan'] == "gagal"){
                                echo "&nbsp; Username dan password salah. Coba lagi.";
                              }
                              echo '</div>';
                            }
                            ?>
                            <form class="row contact_form" action="fungsi/proseslogin.php" method="post">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="username" value=""
                                        placeholder="Username" required="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <!--<div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>-->
                                    <div class="">
                                    <button type="submit" value="submit" class="btn_3">
                                        log in
                                    </button></div>
                                    <a class="lost_pass" href="#"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
<?php require_once '_footer.php';?>