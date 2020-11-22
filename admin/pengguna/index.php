<?php 
$title = 'Admin Area - Pengguna';
$menu = 'pengguna';

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
        <div class="header-body">
            <a href="<?php echo $base_url . 'admin/pengguna/add'?>" class="btn btn-neutral" >+ Tambah Data</a>       
          <!-- Card stats -->          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row mt-5">
        <div class="col">
          <?php 
        if(isset($_GET['pesan'])){
          echo ' <div class="alert alert-neutral alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ';
          if($_GET['pesan'] == "add"){
            echo "&nbsp; Data pengguna berhasil ditambahkan.";
          } elseif($_GET['pesan'] == "update"){
            echo "&nbsp; Data pengguna berhasil diperbarui.";
          } elseif($_GET['pesan'] == "delete"){
            echo "&nbsp; Data pengguna berhasil dihapus.";
          }
          echo '</div>';
        }
        ?>
        
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Data Pengguna</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Email</th>                    
                    <th scope="col">Sebagai</th>
                    <th scope="col">Pilihan</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query= mysqli_query($mysqli, "SELECT * FROM pengguna WHERE level !=1 ORDER BY username ASC");
                  $nomor = 1;
                  while ($data = mysqli_fetch_assoc($query)){ 
                  ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="<?php echo $base_url;?>_assets/admin/img/theme/dp.png">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $data ['username'];?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['no_handphone'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['email'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php if($data['level']==2){echo 'Pelanggan';} elseif($data['level']==3){echo 'Mitra';} ?></span>
                    </td>
                    <td>                 
                      <div class="d-flex fixed-left-content-between">
                        <a href="edit?id=<?php echo $data['id_pengguna'];?>" class="btn btn-sm btn-info mr-4" >Edit</a>
                        <a class="btn btn-sm btn-default" name="hapus" onclick="return confirm('Apakah anda yakin akan menghapusnya?')" href="proses?id=<?php echo $data['id_pengguna'];?>">Hapus</a>
                      </div>
                    </td>
                    <td>                      
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