<?php 
if (isset($_GET['kategori'])){
    include('layanan-kategori.php');
}elseif (isset($_GET['id'])){
    include('layanan-detail.php');
}else{

$title = 'Layanan Penyedia Jasa - Layanan yang tersedia di aplikasi kami';
$menu = 'layanan';

require_once '_header.php';
?>
 <!-- **** Breadcrumb Area Start **** -->
    <div class="breadcrumb-area bg-img bg-overlay-3 jarallax wow fadeInUp" data-wow-delay="200ms" style="background-image: url(<?php echo $base_url;?>_assets/client/img/bg-img/bg_1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $base_url;?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kategori Layanan</li>
                            </ol>
                        </nav>
                        <h2 class="page-title">Layanan Jasa</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End **** -->

    <!-- **** Kategori Jasa **** -->
    <div class="rehomes-agent-list-area section-padding-100-60">
        <div class="container">
            <div class="row">

            <?php
            $query= mysqli_query($mysqli, "SELECT * FROM kategori_jasa");
            while ($data = mysqli_fetch_array($query)){
            ?>

                <!-- Single Kategori Jasa Area -->
                <div class="col-12 col-md-6 col-lg-4 mb-0">
                    <div class="single-agent-area wow fadeInUp" data-wow-delay="200ms">
                        <!-- Jasa Thumb -->
                        <div class="single-agent-thumb">
                            <img src="_assets/images/layananicon/<?php echo $data['foto'];?>" alt="" style="height: 300px;">
                        </div>
                        <!-- Jasa Info -->
                        <div class="agent-info">
                            <a href="<?php echo $base_url;?>layanan?kategori=<?php echo $data['id_kategori'];  ?>" style="height: 50px"><?php echo $data['nama_kategori'];  ?></a>
                            <p rows="4" style="height: 80px"><?php echo $data['deskripsi']; ?></p>
                        </div>
                        <!-- Jasa Next -->
                        <div class="d-flex">
                            <a href="<?php echo $base_url;?>layanan?kategori=<?php echo $data['id_kategori'];  ?>" class="btn btn-primary btn-block btn-lg">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php } ?>                
            </div>
        </div>
    </div>
    <!-- **** Kategori Jasa Area End **** -->    

<?php require_once '_footer.php';
}
?>
