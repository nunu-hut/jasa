<?php 
session_start();
require_once 'fungsi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <!-- Title -->
    <title><?= $title;?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= $base_url;?>_assets/client/img/core-img/logo-rds.jpg">

    <!-- flaticon CSS -->
  <link rel="stylesheet" href="<?= $base_url;?>_assets/login/css/flaticon.css">
  <link rel="stylesheet" href="<?= $base_url;?>_assets/login/css/themify-icons.css">

    <!-- Stylesheet -->

    <!-- swiper CSS 
    <link rel="stylesheet" href="<?= $base_url;?>_assets/login/css/slick.css">-->
    <!-- swiper CSS 
    <link rel="stylesheet" href="<?= $base_url;?>_assets/login/css/price_rangs.css">-->
    <!-- style CSS -->
    <link rel="stylesheet" href="<?= $base_url;?>_assets/login/css/style.css">

    <link href="<?= $base_url;?>_assets/admin/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

    <link rel="stylesheet" href="<?= $base_url;?>_assets/client/style.css">    
    <style type="text/css">        
        .container1 {
            max-width: 480px;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            padding-bottom: 200px;
            margin-right: auto;
            margin-left: auto;
        }
        .breadcrumb-content-two{
            background-color: #f5f8fa; 
            padding-top: 10px;
        }
        .rehomes-news-area.blog-details .blog-details-area {
            background-color: #ffffff;
            -webkit-box-shadow: 0px 16px 35px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 16px 35px 0px rgba(0, 0, 0, 0.15);
            padding: 150px;
        } 
        .classynav ul li.active a {
            color: #206dfb !important;
        }
        .btn_3:hover {
          background-color: white;
          color: #2f7dfc;
        }
    </style>

</head>

<body>
    <!-- Preloader  
    <div id="preloader">
        <div class="loader"></div>
    </div>-->
    

    <!-- **** Header Area Start **** -->
    <header class="header-area">
        

        <!-- Menu Kalo Register/Login -->

        <?php
        if (isset($_SESSION['username'])){ ?>            
        
        <div class="main-header-area animated">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    
                    <nav class="classy-navbar justify-content-between" id="rehomesNav">


                        <a class="nav-brand" href="<?= $base_url;?>"><img src="<?= $base_url;?>_assets/images/background/logo.png" alt=""></a>


                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                        
                        <div class="classy-menu">
                  
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>                           
                           
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="<?php if($menu == 'beranda'){echo 'active';}?>"><a href="<?= $base_url;?>">Beranda</a></li>
                                    <li class="<?php if($menu == 'layanan'){echo 'active';}?>"><a href="<?= $base_url;?>layanan">Layanan</a></li>    
                                    <?php if($_SESSION['level'] =='2'){ ?> <li class="<?php if($menu == 'pendaftaran-mitra'){echo 'active';}?>"><a href="<?= $base_url;?>pendaftaran-mitra">Menjadi Mitra</a></li> <?php } ?>   
                                    <li class="<?php if($menu == 'kontak'){echo 'active';}?>"><a href="<?= $base_url;?>kontak">Kontak</a></li>    
                                    <li><a href="#"><?= $_SESSION['username'];?></a>
                                        <ul class="dropdown" style="z-index: 2000 !important">                                            
                                            <li><a href="<?= $base_url."dashboard/?log=".$_SESSION['id_pengguna']; ?>">- Dashboard</a></li>
                                            <li><a href="<?= $base_url."account/?log=".$_SESSION['id_pengguna']; ?>">- Akun Saya</a></li>
                                            <li><a href="<?= $base_url."account/change-password?log=".$_SESSION['id_pengguna']; ?>">- Ganti Password</a></li>
                                            <?php 
                                            if($_SESSION['level']=='3'){
                                            ?>
                                                <li><a href="<?= $base_url."profile/?log=".$_SESSION['id_pengguna']; ?>">- Profil Mitra</a></li> 
                                                <li><a href="<?= $base_url."business/new?log=".$_SESSION['id_pengguna']; ?>">- Buka Profil Jasa</a></li> 
                                                <li><a href="<?= $base_url."business/?log=".$_SESSION['id_pengguna']; ?>">- Jasa Saya</a></li>
                                            <?php } ?> 
                                            <li><a href="<?= $base_url."order/?log=".$_SESSION['id_pengguna']; ?>">- Pesanan</a></li>
                                            <li><a href="<?= $base_url;?>fungsi/logout">Logout</a></li>
                                        </ul>
                                    </li>                                
                                </ul>
                            </div>
                        </div>                       
                    </nav>
                </div>
            </div>
        </div>
        <div class="my-3"></div>

    <?php } else { 
            if(@$menu == 'pendaftaran-mitra' || @$menu == 'booking'){
                header("location: register");
            }
        ?>

        <!-- Main Header Start -->
        <div class="main-header-area animated">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="rehomesNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="<?= $base_url;?>"><img src="<?= $base_url;?>_assets/images/background/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                        
                            <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="<?php if($menu == 'beranda'){echo 'active';}?>"><a href="<?= $base_url;?>">Beranda</a></li>
                                    <li class="<?php if($menu == 'layanan'){echo 'active';}?>"><a href="<?= $base_url;?>layanan">Layanan</a></li>
                                    <li class="<?php if($menu == 'pendaftaran-mitra'){echo 'active';}?>"><a href="<?= $base_url;?>pendaftaran-mitra">Menjadi Mitra</a></li> 
                                    <li class="<?php if($menu == 'register'){echo 'active';}?>"><a href="<?= $base_url;?>register">Register</a></li>
                                    <li class="<?php if($menu == 'login'){echo 'active';}?>"><a href="<?= $base_url;?>login">Login</a></li>
                                </ul>
                                <div class="contact-btn mt-3 mt-lg-0 ml-3 ml-lg-5">
                                    <a href="<?= $base_url;?>kontak">Kontak</a>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    <?php } ?>
    </header>
    <!-- **** Header Area End **** -->