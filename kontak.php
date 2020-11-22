<?php 
$title = 'Layanan Penyedia Jasa - Kontak';
$menu = 'kontak';

require_once '_header.php'; 
?>
<!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-area bg-img bg-overlay-3 wow fadeInUp" data-wow-delay="200ms" style="background-image: url(_assets/client/img/bg-img/bg_1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                            </ol>
                        </nav>
                        <h2 class="page-title">Rumah Digital Sidakangen</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End **** -->

    <!-- **** Contact Area Start **** -->
    <section class="rehomes-support-and-contact-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="contact-information-area mb-80">
                        <!-- Title--> 
                        <div class="support-title wow fadeInUp" data-wow-delay="200ms">
                            <h2>Kontak</h2>  
                            <div class="col-lg-6">
                              <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                  <h3>Kalimanah, Purbalingga.</h3>
                                  <p>Jalan Arsadipati RT 03/02<br>Sidakangen</p>
                                </div>
                              </div>
                              <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                  <h3>(+62) 878 370 29111</h3>
                                  <p>Senin-Jumat<br>08.00-16.00 WIB</p>
                                </div>
                              </div>
                              <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                  <h3>rumahdigital@gmail.com</h3>
                                  <p>Kirimkan pertanyaan anda kapanpun</p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <!-- help -->
                    <div class="rehomes-contact-form mb-80 wow fadeInUp" data-wow-delay="200ms">
                        <!-- Title -->
                        <div class="support-title">
                            <h2>Bantuan</h2>
                        </div>

                        <!-- Form -->
                        <form class="support-form" action="fungsi/prosesfeedback.php" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="nama" class="form-control mb-20" placeholder="Nama" required="">
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control mb-20" placeholder="Email" required="">
                                </div>
                                <div class="col-12">
                                    <textarea name="pesan" class="form-control mb-30" placeholder="Pesan" required=""></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn rehomes-btn">Kirim Bantuan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- **** Contact Area End **** -->

    <!-- **** Google Maps **** -->
    <div class="contact-maps mb-80 wow fadeInUp" data-wow-delay="200ms">
        <div class="bottom-arrow"></div>
        <!-- Maps Iframe -->
        <iframe src="https://maps.google.com/maps?q=rumah%20digital%20sidakangen&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
    </div>

    
<?php require_once '_footer.php'?>