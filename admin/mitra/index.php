<?php 
$title = 'Admin Area - Profil Mitra';
$menu = 'mitra';

require_once '../auth.php';
require_once '../_layout/header.php'
?>

<!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
            <a href="<?php echo $base_url . 'admin/mitra/add'?>" class="btn btn-neutral" >+ Tambah Data</a>       
          <!-- Card stats -->          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data Profil Mitra</h3>
                </div>
                <div class="col text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="export.php" target="_blank">Export</a>
                      <a class="dropdown-item" href="print.php" target="_blank">Print</a>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Status</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Foto KTP</th>
                    <th scope="col">Verifikasi</th>                    
                    <th scope="col">Pilihan</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $query= mysqli_query($mysqli, "SELECT * FROM mitra JOIN pengguna ON mitra.id_pengguna=pengguna.id_pengguna");
                  while ($data = mysqli_fetch_assoc($query)){ 
                  ?>
                  <tr>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['username'];?></span>
                    </td>                     
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['nama_lengkap'];?></span>
                    </td>                      
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['no_ktp'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['jk'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['status'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data['no_handphone']; ?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data['email'];  ?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data ['alamat'];?></span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="../../_assets/images/mitra/<?php echo $data['foto'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto Profil">
                          <img alt="Image placeholder" src="../../_assets/images/mitra/<?php echo $data['foto'];?>" class="rounded-circle">
                        </a>
                      </div>                        
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="../../_assets/images/mitra/<?php echo $data['fotoktp'];?>" target="_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Kartu Tanda Penduduk">
                          <img alt="Image placeholder" src="../../_assets/images/mitra/<?php echo $data['fotoktp'];?>" class="rounded-circle">
                        </a>
                      </td>
                    </div>                    
                    <td>
                      <?php 
                      if($data['verifikasi']==0){
                        echo '<a href="proses.php?verifikasi='.$data['id_mitra'].'" class="badge badge-danger">Belum terverifikasi</a>';
                      } else {
                        echo '<a class="badge badge-info">Terferivikasi</a>';
                      }
                      ?>                      
                    </td>
                    <td>                 
                      <div class="d-flex fixed-left-content-between">
                        <a href="edit?id=<?php echo $data['id_mitra'];?>" class="btn btn-sm btn-info mr-4">Edit</a>
                        <a class="btn btn-sm btn-default" name="hapus" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" href="proses?id=<?php echo $data['id_mitra'];?>">Hapus</a>
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