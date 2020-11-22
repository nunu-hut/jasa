<?php 
$title = 'Aplikasi Layanan Penyedia Jasa';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Aplikasi Layanan Penyedia Jasa
  </title>
  <!-- Favicon -->
  <link href="../_assets/admin/img/brand/logo-rds.jpg" rel="icon" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
   Icons -->
  <link href="../_assets/admin/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../_assets/admin/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../_assets/admin/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<style type="text/css">
  .bg-gradient-primary {
    background: linear-gradient(87deg, #206dfb 0, #a16ae8 100%) !important;
  }  
  .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #206dfb;
    border-color: #206dfb;
  }
</style>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="#">
          <!-- <img src="../_assets/admin/img/brand/white.png" /> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Selamat Datang Administrator</h1>
              <p class="text-lead text-light">Silahkan login untuk masuk ke dalam sistem.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-3" style="border-bottom: none;">
              <div class="text-muted text-center mt-3 mb-0"><h1>LOGIN</h1></div>
              </div>       
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Masuk ke Sistem</small>
                </div> 

                <?php 
                if(isset($_GET['pesan'])){
                  echo ' <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ';
                  if($_GET['pesan'] == "gagal"){
                    echo "&nbsp; Username atau password salah. Coba lagi.";
                  } elseif($_GET['pesan'] == "logout"){
                    echo "&nbsp; Anda telah berhasil logout dari sistem.";
                  }
                  echo '</div>';
                }
                ?>

                <form role="form" method="post" action="fungsi/proseslogin.php">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                      </div>
                      <input class="form-control" name="username" placeholder="Username" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" name="password" placeholder="Password" type="password">
                    </div>
                  </div>                
                  <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </form>
              </div>
            </div>          
          </div>
        </div>
      </div>    
    </div>
  </div>
  <!--   Core   -->
  <script src="../_assets/admin/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../_assets/admin/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="../_assets/admin/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>