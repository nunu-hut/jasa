<?php 
$title = 'Admin Area - Kategori Jasa';
$menu = 'kategori-jasa';

require_once '../auth.php';
require_once '../_layout/header.php';
require_once '../../fungsi/koneksi.php';
?>
 
<!-- Summon no CSS -->

<!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">          
            <button type="button" class="btn btn-neutral" data-toggle="modal" data-target="#add-kategori">+ Tambah Data</button>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--7">     
      <!-- Table -->
      <div class="row mt-5">
        <div class="col" >
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Data Kategori Jasa</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush" style="border-color: none">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nama Jasa</th>                    
                    <th scope="col">Deskripsi</th>                    
                    <th scope="col">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $query= mysqli_query($mysqli, "SELECT * FROM kategori_jasa");
                  while ($data = mysqli_fetch_array($query)){
                ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="../../_assets/images/layananicon/<?php echo $data['foto'];?>" target="_blank" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../../_assets/images/layananicon/<?php echo $data['foto'];?>">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $data['nama_kategori']; ?></span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['deskripsi']; ?></span>
                    </td>                    
                    <td>
                      <div class="d-flex fixed-left-content-between">
                        <a class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#edit-kategori<?php echo $data['id_kategori']; ?>">Edit</a>
                        <a class="btn btn-sm btn-info" name = "delete" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')" href="proses?id=<?php echo $data['id_kategori'];?>">Hapus</a>
                      </div>


                      <!-- Modal Edit-->                     

                      <div id="edit-kategori<?php echo $data['id_kategori']; ?>" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <!-- Modal content-->
                          <div class="modal-content">

                            <?php 
                            $id = $data['id_kategori'];
                            $edit = mysqli_query($mysqli, "SELECT * FROM kategori_jasa where id_kategori='$id'");
                            while ($data = mysqli_fetch_array($edit)){              
                            ?>
                            <form method="post" action="proses.php" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h4 class="modal-title">
                                  <i class="ni ni-send text-primary"></i>  Edit Kategori Jasa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                              </div>
                              <div class="modal-body">                
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="form-control-label">Nama Kategori</label>
                                        <input type="hidden" name="id" value= "<?php echo $data['id_kategori'];?>">
                                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control form-control-alternative" required="" placeholder="Nama Jasa" value="<?php echo $data['nama_kategori']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="form-control-label">Deskripsi</label>
                                        <textarea rows="3" id="deskripsi" name="deskripsi" class="form-control form-control-alternative" required="" placeholder="Tambahkan Deskripsi"><?php echo $data['deskripsi']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                  <div class="col-md-12">
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-foto"></label>                        
                                          <div class="card card-profile shadow">
                                            <div class="row justify-content-center">
                                              <div class="col-lg-3 order-lg-2">
                                                <div class="">
                                                  <a>
                                                    <img src="../../_assets/images/layananicon/<?php echo $data['foto'];?>" class="" width="200" height="200" style = "transform: translate(-30%, 10%); position: absolute;">
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card-body pt-0 pt-md-2">
                                            </div>                            
                                            <div class="card-body pt-0 pt-md-8">              
                                              <div class="text-center">
                                                <h3>
                                                  Foto Kategori<span class="font-weight-light"></span>
                                                </h3>                
                                              </div>
                                            </div>
                                          </div>
                                          <input type="file" name="foto" class="form-control form-control-alternative">
                                          <input type="text" name="fotolama" id="fotolama" value="<?php echo $data['foto']; ?>" hidden>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" id="submit" name="edit" class="btn btn-primary">Simpan</button>
                              </div>
                              <?php } ?>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!--End Modal -->
                    </td>                                       
                  </tr> 
                 <?php } ?>                  
                </tbody>
              </table>
            </div>            
          </div>          
        </div>
      </div>
    </table>

<?php   require_once '../_layout/footer.php'; ?>

    <!-- Modal Tambah-->
      <div id="add-kategori" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <!-- Modal content-->
          <div class="modal-content">
            <form method="POST" action="proses.php" enctype="multipart/form-data">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                  <i class="ni ni-send text-primary"></i>  Tambah Kategori Jasa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>                   
              </div>
              <div class="modal-body">                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Nama Kategori</label>
                        <input type="hidden" name="id" value= "<?php echo $data['id_kategori']?>">
                        <input type="text" name="nama_kategori" class="form-control form-control-alternative" required="" placeholder="Nama Jasa">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Deskripsi</label>
                        <textarea rows="3" name="deskripsi" class="form-control form-control-alternative" required="" placeholder="Tambahkan Deskripsi"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Foto</label>
                        <input type="file" name="foto" class="form-control form-control-alternative" required="" placeholder="Nama Jasa">
                      </div>
                    </div>
                  </div>                                                                                                         
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" id="submit" name="tambah" class="btn btn-primary">Simpan</button>              
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--End Modal --> 

  <script src="../../_assets/admin/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../../_assets/admin/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="../../_assets/admin/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="../../_assets/admin/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
  </noscript>
  <!--   Argon JS   -->
  <script src="../../_assets/admin/js/argon-dashboard.min9f1e.js?v=1.1.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

