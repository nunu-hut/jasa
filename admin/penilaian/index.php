<?php 
$title = 'Admin Area - Penilaian';
$menu = 'penilaian';

require_once '../auth.php';
require_once '../_layout/header.php';
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
              <h3 class="mb-0">Penilaian</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Penilai</th>
                    <th scope="col">Tertuju</th>
                    <th scope="col">Jasa</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Komentar</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                <?php
                $query_review=mysqli_query($mysqli, "SELECT * FROM mitra JOIN jasa on mitra.id_mitra=jasa.id_mitra JOIN pesanan on jasa.id_jasa=pesanan.id_jasa JOIN penilaian ON pesanan.id_pesanan=penilaian.id_pesanan JOIN pengguna on pesanan.id_pengguna=pengguna.id_pengguna");

                while($data=mysqli_fetch_assoc($query_review)){
                ?>
                 
                  <tr>                                       
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['username'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['nama_lengkap'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['nama_jasa'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['waktu'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm">
                      <?php if ($data['rating']==1) {?> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data['rating']==2) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data['rating']==3) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data['rating']==4) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i> 
                      <?php } elseif ($data['rating']==5) { ?>
                        <i class="fa fa-star text-yellow"></i> 
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>                                            
                        <i class="fa fa-star text-yellow"></i>   
                    <?php } ?></span>  
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['komentar'];?></span>                      
                    </td>
                    <td>
                      <span data-toggle="tooltip" data-original-title="Hapus">  
                        <a class="fas fa-trash" onclick="return confirm('Apakah anda yakin akan menghapusnya?')" href="proses?id=<?php echo $data['id_penilaian'];?>"></a>
                      </span>
                      <input type="text" name="id" value="<?= $data['id_penilaian'];?>" hidden>
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
            </div>-->
          </div>
        </div>
      </div>     

<?php require_once '../_layout/footer.php';?>