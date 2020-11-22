<?php 
$title = 'Layanan Penyedia Jasa - Pendaftaran Mitra';
$menu = 'pendaftaran-mitra';

require_once '_header.php';
?>



    <!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-area-third bg-img bg-overlay-2 jarallax wow fadeInUp" data-wow-delay="100ms" style="background-image: url(_assets/client/img/bg-img/bg_1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content mt-100 text-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Menjadi Mitra</li>
                            </ol>
                        </nav>
                        <h2 class="page-title">Pendaftaran Mitra <br>Penyedia Jasa</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End **** -->
  
    <div class="rehomes-news-area blog-details">
        <div class="container">
            <div class="blog-details-area">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-12">  
                     
                        <div class="rehomes-contact-form mt-50 mb-5 mb-lg-0 wow fadeInUp" data-wow-delay="200ms">
                            <h4 class="mb-30">Daftarkan Diri Anda</h4>

                            <!-- Form -->
                            <form method="POST" action="fungsi/prosesdaftarmitra.php" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Lengkap</label>
                                <input type="hidden" name="id_mitra">
                                <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'];?>">
                                <input type="hidden" name="no_handphone" value="<?= $_SESSION['no_handphone'];?>">
                                <input type="hidden" name="email" value="<?= $_SESSION['email'];?>">
                                <input type="text" name="nama_lengkap" class="form-control" id="exampleFormControlInput1" placeholder="Nurul Ismailiah">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">NO KTP</label>
                                <input type="number" name="no_ktp" class="form-control" id="exampleFormControlInput1" placeholder="Isi sesuai KTP Anda">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label><br>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" name="jk" class="form-check-input" value="Laki-laki">Laki-laki
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" name="jk" class="form-check-input" value="Perempuan">Perempuan
                                  </label>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Status</label>
                                <input type="text" name="status" class="form-control" id="exampleFormControlInput1" placeholder="Isi sesuai KTP Anda">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Nomor Handphone</label>
                                <input type="text" name="no_handphone" class="form-control" id="exampleFormControlInput1" value="<?php echo $_SESSION['no_handphone']; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $_SESSION['email']; ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col">
                                      <label for="exampleFormControlFile1">Foto Diri</label>
                                      <div style="outline-style: solid;outline-color: #f0f0f0; outline-width: thin; padding: 10px;">
                                      <input type="file" name="foto" id="exampleFormControlFile1">
                                      </div>
                                    </div>       
                                    <div class="col">
                                      <label for="exampleFormControlFile1">Foto KTP</label>
                                      <div style="outline-style: solid;outline-color: #f0f0f0; outline-width: thin; padding: 10px;">
                                      <input type="file" name="foto_ktp" id="exampleFormControlFile1">
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="input-group mb-3">
                                <button type="submit" class="btn rehomes-btn mt-50">Mendaftar</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '_footer.php'; ?>
