<?php 
$title = 'Layanan Penyedia Jasa - Register';
$menu = 'register';

require_once '_header.php';
?>

<style type="">
    .btn_3:hover {
      background-color: white;
      color: #2f7dfc;
    }
</style>

    <!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-content-two jarallax wow fadeInUp" data-wow-delay="100ms">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Register</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->

     <!--================lregister_part Area =================-->
    <section class="login_part section_padding wow fadeInUp" data-wow-delay="200ms">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Sudah Memiliki Akun?</h2>
                            <p>Login untuk masuk kembali ke akun anda
                                asdf asdf asdf asdf asdf </p>
                            <a href="<?php echo $base_url; ?>login" class="btn_3">login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Selamat Datang ! <br>
                                Register sekarang</h3>
                            
                            <form class="row contact_form" action="fungsi/prosesregister.php" method="post" >
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="username" 
                                        placeholder="Username" required="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="no_handphone" 
                                        placeholder="Nomor Handphone" required="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="name" name="email" 
                                        placeholder="Email" required="">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" 
                                        placeholder="Password" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn_3">
                                        register
                                    </button>
                                    <a class="lost_pass" href="#"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================register_part end =================-->

<?php require_once '_footer.php';?>




                                    <!--<div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>-->