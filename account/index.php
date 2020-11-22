<?php 

$title = 'Layanan Penyedia Jasa - Profile';
require_once '../_header.php';

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
                                <li class="breadcrumb-item"><a href="<?= $base_url."dashboard/?log=".$_SESSION['id_pengguna']; ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****--> 


    
  <?php
    $log=$_GET['log'];

    $query = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE id_pengguna = '$log'");
    while ($data = mysqli_fetch_assoc($query)) {
        $id_pengguna = $data['id_pengguna'];    
        $pengguna = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * from pengguna WHERE id_pengguna='$id_pengguna'"));
  ?>
  <div class="main-content" style="background-color: white; padding-left: 200px; padding-right: 200px; padding-bottom: 100px;">
    <div class="container-fluid mt-7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">            
            <div class="card-body pt-0 pt-md-6 mt-5">
              <div class="text-center">
                <h3>
                  <?= $data['username']; ?><span class="font-weight-light"></span>
                </h3>
                <div class="ni education_hat mr-2">
                  <ul class="my-4">  
                    <li class="fa fa-phone"><p></p></li> <?= $data['no_handphone']; ?><br>
                    <li class="fa fa-envelope"><p></p></li> <?= $data['email']; ?><br>
                  <ul>
                </div>
                <hr class="my-4" />
                <div class="h6 mt-4">                  
                  <a><?php if($data['level']==2){echo "Pelanggan";} elseif ($data['level']==3) {
                    echo "Mitra";
                  } ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
        <?php 
        if(isset($_GET['update'])){
          echo ' <div class="alert alert-secondary alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ';
          if($_GET['update'] == "success"){
            echo "&nbsp; Akun berhasil diperbarui.";
          } elseif($_GET['update'] == "failed"){
            echo "&nbsp; Akun tidak berhasil diperbarui";
          }
          echo '</div>';
        }
        ?>
          <div class="card bg-secondary shadow" style="background-color: #edf3f9 !important">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Akun Saya</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action = "proses.php" enctype="multipart/form-data"> 
                <h6 class="heading-small text-muted mb-4"></h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="hidden" name="id_pengguna" value= "<?php echo $data['id_pengguna'];?>">
                        <input type="text" name="username" class="form-control form-control-alternative" required="" value="<?php echo $data['username'];?>">
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nomor Handphone</label>
                        <input type="text" name="no_handphone" class="form-control form-control-alternative" required="" value="<?php echo $data['no_handphone'];?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" name = "email" class="form-control form-control-alternative"  required="" value="<?php echo $data['email'];?>">
                      </div>
                    </div>
                  </div>  
                </div>                
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="submit" id="submit" class="btn btn-info" name="edit_akun" value="Perbarui">
                  </div>
                </div>                  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>  
</body>
<?php 
require_once '../_footer.php'
?>   