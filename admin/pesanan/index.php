<?php 
$title = 'Admin Area - Pesanan';
$menu = 'pesanan';

require_once '../auth.php';
require_once '../_layout/header.php';
?>

<?php 
/*if($_GET['pesan'] == "add"){
  echo "<script>alert('Data telah disimpan')</script>";
} elseif ($_GET['pesan'] == "update"){
  echo "<script>alert('Data berhasil diubah')</script>";
} elseif ($_GET['pesan'] == "delete") {
  echo "<script>alert('Data berhasil dihapus')</script>";
}
*/
?>

<!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-8">
      <div class="container-fluid">
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Pesanan</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Pemesan</th>
                    <th scope="col">Mitra Penyedia Jasa</th>
                    <th scope="col">Jasa yang Dipesan</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>                    
                  </tr>
                </thead>

                <tbody>
                  
                  <?php
                  $query= mysqli_query($mysqli, "SELECT pesanan.waktu, pesanan.tanggal, pesanan.status, jasa.nama_jasa, pengguna.username, mitra.nama_lengkap FROM pesanan JOIN jasa ON pesanan.id_jasa=jasa.id_jasa JOIN mitra ON jasa.id_mitra=mitra.id_mitra JOIN pengguna ON pesanan.id_pengguna=pengguna.id_pengguna");
                  
                  while ($data = mysqli_fetch_assoc($query)){
                  ?>

                  <tr>                    
                    <td>
                      <span class="mb-0 text-sm"><?= $data['username']; ?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data['nama_lengkap']; ?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data['nama_jasa']; ?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data['waktu']; ?></span> | 
                      <span class="mb-0 text-sm"><?= $data['tanggal']; ?></span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> <?= $data['status']; ?>
                      </span>  
                    </td>       
                  </tr>
                  <?php } ?>                      
                </tbody>
              </table>
            </div>
            <!--
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          -->
          </div>
        </div>
      </div>     

<?php require_once '../_layout/footer.php';?>