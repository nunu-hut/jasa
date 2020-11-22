<?php 
$title = 'Admin Area - Profil Jasa';
$menu = 'jasa';

include '../../fungsi/koneksi.php';
require_once '../auth.php';
require_once '../_layout/header.php'
?>  

<!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
            <a href="<?= $base_url . 'admin/jasa/add'?>" class="btn btn-neutral" >+ Tambah Data</a>       
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
              <h3 class="mb-0">Data Profil Jasa</h3>
            </div>            
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama Mitra</th>
                    <th scope="col">Nama Usaha</th>
                    <th scope="col">Nama Jasa</th>
                    <th scope="col">Bidang Jasa</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Foto Jasa</th>
                    <th scope="col">Status</th>
                    <th scope="col">Pilihan</th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query= mysqli_query($mysqli, "SELECT *, SUBSTRING_INDEX(foto, '-', 1) AS foto1, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', 2),'-',-1) AS foto2, SUBSTRING_INDEX(SUBSTRING_INDEX(foto, '-', -2),'-',1) AS foto3, SUBSTRING_INDEX(foto, '-', -1) AS foto4 FROM jasa ");
                  while ($data = mysqli_fetch_assoc($query)){
                    $id_mitra = $data['id_mitra'];
                    $mitra = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT nama_lengkap from mitra WHERE id_mitra = '$id_mitra'"));
                    $nama_mitra=$mitra['nama_lengkap'];

                    $id_kategori = $data['id_kategori'];
                    $kategori = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT nama_kategori from kategori_jasa WHERE id_kategori = '$id_kategori'"));
                    $nama_kategori=$kategori['nama_kategori'];
                  ?>
                  <tr>
                      <td>
                      <span class="mb-0 text-sm"><?= $nama_mitra;?></span>
                    </td>                   
                    <td>
                      <span class="mb-0 text-sm"><?= $data ['nama_usaha'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data ['nama_jasa'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $nama_kategori;?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data ['harga'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data ['latitude'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?= $data ['longitude'];?></span>
                    </td>                    
                    <td>
                      <div class="avatar-group">
                        <a href="../../_assets/images/layanan/<?= $data['foto1'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 1">
                          <img alt="Image placeholder" src="../../_assets/images/layanan/<?= $data['foto1'];?>" class="rounded-circle">
                        </a>
                        <a href="../../_assets/images/layanan/<?= $data['foto2'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 2">
                          <img alt="Image placeholder" src="../../_assets/images/layanan/<?= $data['foto2'];?>" class="rounded-circle">
                        </a>
                        <a href="../../_assets/images/layanan/<?= $data['foto3'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 3">
                          <img alt="Image placeholder" src="../../_assets/images/layanan/<?= $data['foto3'];?>" class="rounded-circle">
                        </a>
                        <a href="../../_assets/images/layanan/<?= $data['foto4'];?>" target= "_blank" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Foto 4">
                          <img alt="Image placeholder" src="../../_assets/images/layanan/<?= $data['foto4'];?>" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <?php 
                      if($data['status']==0){
                        echo '<a href="proses.php?status='.$data['id_jasa'].'" class="badge badge-danger">Belum Aktif</a>';
                      } else {
                        echo '<a class="badge badge-info">Aktif</a>';
                      }
                      ?>
                    </td>                                                    
                    <td>                 
                      <div class="d-flex fixed-left-content-between">
                        <a class="btn btn-sm btn-neutral mr-4" data-toggle="modal" data-target="#myModal<?= $data['id_jasa'] ?>">Detail</a>
                        <div id="myModal<?= $data['id_jasa'] ?>" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title"><?= $data['nama_usaha']; ?></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>                   
                                </div>
                                <div class="modal-body">
                                  <div class="card-body">
                                    <form>                        
                                      <!-- Description -->                        
                                      <div class="form-group">
                                        <label>Jadwal</label>
                                        <textarea rows="4" class="form-control form-control-alternative" placeholder="Jadwal Operasional" readonly=""><?= $data['jadwal']; ?></textarea>
                                      </div>                   
                                      <div class="form-group">
                                        <label>Info Layanan</label>
                                        <textarea rows="4" class="form-control form-control-alternative" placeholder="Informasi Layanan" readonly=""><?= $data['informasi']; ?></textarea>
                                      </div>                   
                                      <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea rows="1" class="form-control form-control-alternative" placeholder="Keterangan" readonly=""><?= $data['keterangan']; ?></textarea>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <a href="<?= $base_url; ?>admin/jasa/edit?id=<?= $data['id_jasa']; ?>" class="btn btn-sm btn-info  mr-4" >Edit</a>
                        <a class="btn btn-sm btn-default" name = "delete" onclick="return confirm('Apakah anda yakin akan menghapusnya?')" href="proses?id=<?= $data['id_jasa'];?>">Hapus</a>
                      </div>
                    </td>                    
                  </tr>
                  <?php } ?>                      
                </tbody>
              </table>
            </div>

            <!-- Modal -->
            
            <!--End Modal          

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


<script type="text/javascript">
  function detail($id_jasa) {
      var z = $id_jasa;

            $.ajax({
            //url: "fungsi/sekolahedit.php",
            dataType:"json",
            type : "POST",
            data : {"id_jasa" : z},
            success:function(resp){
 
              $("#jadwal").val(resp["jadwal"]);
              $("#info_layanan").val(resp["info_layanan"]);
              $("#keterangan").val(resp["keterangan"]);
  
              var select2 = document.getElementById("id_jasa");
              var opt2 = new Option(resp["id_jasa"], resp["id_jasa"]);
              select2.insertBefore(opt2, select2.firstChild);
              $('select option:first-child').attr("selected", "selected");
             
            }
          });
      }
</script>