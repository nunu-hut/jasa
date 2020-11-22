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
                                <li class="breadcrumb-item"><a href="<?= $base_url."account/?log=".$_SESSION['id_pengguna']; ?>">Akun Saya</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ganti Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****--> 
  <div class="main-content" style="background-color: white; padding-left: 200px; padding-right: 200px; padding-bottom: 100px;">
    <div class="container-fluid mt-7">
      <div class="row justify-content-center">
        <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">          
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
                  <h3 class="mb-0">Ganti Password</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form name="ganti_password" method="POST" action="proses.php" onsubmit="return valid();"> 
                <h6 class="heading-small text-muted mb-4"></h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">                      
                      <p style="color:red;">
                      <?php echo $_SESSION['msg1'];?>
                      <?php echo $_SESSION['msg1']="";?>
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Password Lama</label>
                        <input type="hidden" name="id_pengguna" value= "<?php echo $_GET['log'];?>">
                        <input type="password" name="password_lama" class="form-control form-control-alternative">
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Ulangi Password Baru</label>
                        <input type="password" name = "konfirmasi_password" class="form-control form-control-alternative">
                      </div>                
                      </p>   
                    </div>
                  </div>  
                </div>  
                <hr class="my-4" />                
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="submit" class="btn btn-info" name="submit" value="Simpan">
                  </div>
                </div>                  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php 
require_once '../_footer.php'
?> 



<script type="text/javascript">
function valid()
{
if(document.ganti_password.password_lama.value=="")
{
alert("Password lama harus diisi !!");
document.ganti_password.password_lama.focus();
return false;
}
else if(document.ganti_password.password_baru.value=="")
{
alert("Password baru harus diisi !!");
document.ganti_password.password_baru.focus();
return false;
}
else if(document.ganti_password.konfirmasi_password.value=="")
{
alert("Konfirmasi password harus diisi !!");
document.ganti_password.konfirmasi_password.focus();
return false;
}
else if(document.ganti_password.password_baru.value!= document.ganti_password.konfirmasi_password.value)
{
alert("Password baru dan konfirmasi password tidak sesuai  !!");
document.ganti_password.konfirmasi_password.focus();
return false;
}
return true;
}
</script>