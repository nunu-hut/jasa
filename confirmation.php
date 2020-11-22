<?php 

$title = 'Layanan Penyedia Jasa - Konfirmasi Pesanan';
require_once '_header.php';


?>

<body style="background-color: transparent;">

  <!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-content-two jarallax wow fadeInUp" data-wow-delay="100ms">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pesanan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****-->  

<!--================ confirmation part start =================-->
  <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Terima kasih. Pesanan anda sedang diproses.</span>
            <div class="mt-5">
              <?php 
              $id = $_GET['id'];
              $query=mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
              while ($data=mysqli_fetch_assoc($query)) {
                $id_jasa=$data['id_jasa'];
                $query=mysqli_query($mysqli, "SELECT * FROM jasa JOIN mitra on jasa.id_mitra=mitra.id_mitra JOIN pengguna ON mitra.id_pengguna=pengguna.id_pengguna WHERE id_jasa='$id_jasa'");
                while ($data2=mysqli_fetch_assoc($query)) {
               ?>
              <a href="https://api.whatsapp.com/send?phone=<?= $data2['no_handphone']; ?>&text=Saya%20telah%20melakukan%20pesanan:%0A<?= $data2['nama_jasa'];?>%0AWaktu%20:%20<?= $data['waktu']; ?>%0ATanggal%20:%20<?= $data['tanggal']; ?>" target="_blank" data-toggle="tooltip" data-original-title="Hubungi Penjual"><img src="<?php $base_url ?>_assets/images/menu/wa2.png" style="width: 50px;">
              </a>
            <?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->

  <?php require_once '_footer.php'; ?>