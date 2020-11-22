<?php 
require_once '../../fungsi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?= $title; ?>
  </title>
  <!-- Favicon -->
  <link href="../../_assets/admin/img/brand/logo-rds.jpg" rel="icon" type="image/png">
  <!-- Fonts -->  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= $base_url;?>_assets/admin/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="<?= $base_url;?>_assets/admin/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0Di-e81uG7hXdq7nmcRZqucb3K_YVuF4" async defer></script>
  
  <!-- CSS Files -->
  <link href="<?= $base_url;?>_assets/admin/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

  <link rel="stylesheet" href="<?= $base_url;?>_assets/admin/style.css">
    <style type="text/css">
      .bg-gradient-primary {
        background: linear-gradient(87deg, #206dfb 0, #a16ae8  100%) !important;
      }
      .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #206dfb;
        border-color: #206dfb;
      }
      .notify {
        position: fixed;
        top: 50px;
        right: 50%;
        z-index: 2000;
        overflow: hidden;
        outline: 0;
        height: 100px;
        width: 400px;
        margin-left: -400px;
        background: red;
      }
    </style>
</head>

  

<body class="" style="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="<?= $base_url; ?>admin/dashboard">
        <img src="<?= $base_url;?>_assets/images/background/logo.png" class="navbar-brand-img" alt="" style=>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">                    
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?= $base_url;?>_assets/admin/img/theme/joker.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Hai Admin</h6>
            </div>                
            <div class="dropdown-divider"></div>
            <a href="<?= $base_url;?>fungsi/logout" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./">
                <img src="<?= $base_url;?>_assets/images/background/logo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>        
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class=" nav-link <?php if ($menu == 'dashboard'){echo 'active';} ?>" href="<?= $base_url . 'admin/dashboard' ?>"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($menu == 'pengguna' || $menu == 'add-pengguna' || $menu == 'edit-pengguna'){echo 'active';} ?>" href="<?= $base_url . 'admin/pengguna' ?>">
              <i class="ni ni-circle-08 text-blue"></i> Pengguna
            </a>
          </li>        
          <li class="nav-item">
            <a class="nav-link <?php if ($menu == 'kategori-jasa'){echo 'active';} ?>" href="<?= $base_url . 'admin/kategori-jasa'?>">
              <i class="ni ni-bullet-list-67 text-orange"></i> Kategori Jasa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($menu == 'mitra' || $menu == 'add-mitra' || $menu == 'edit-mitra'){echo 'active';} ?>" href="<?= $base_url . 'admin/mitra'?>">
              <i class="ni ni-single-02 text-info"></i> Mitra
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($menu == 'jasa' || $menu == 'add-jasa' || $menu == 'edit-jasa' ){echo 'active';} ?>" href="<?= $base_url . 'admin/jasa'?>">              
              <i class="fab fa-servicestack"></i> Jasa
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if ($menu == 'pesanan'){echo 'active';} ?>" href="<?= $base_url . 'admin/pesanan'?>">
              <i class="ni ni-basket text-blue"></i> Pesanan
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if ($menu == 'penilaian'){echo 'active';} ?>" href="<?= $base_url . 'admin/penilaian'?>">
              <i class="fas fa-star text-yellow"></i> Penilaian
            </a>
          </li>
        </ul>

        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Feedback</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link <?php if ($menu == 'feedback'){echo 'active';} ?>" href="<?= $base_url . 'admin/feedback' ?>">
              <i class="ni ni-chat-round"></i> Keluhan
            </a>
          </li>          
        </ul>             
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?= $base_url . 'admin/dashboard'?>">Dashboard</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?= $base_url;?>_assets/admin/img/theme/joker.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">ADMIN</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Hai Admin</h6>
              </div>              
              <div class="dropdown-divider"></div>
              <a href="<?= $base_url;?>admin/fungsi/logout" class="dropdown-item" onclick="return confirm('Apakah anda yakin akan logout?')">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->

