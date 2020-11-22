<?php 

$title = 'Layanan Penyedia Jasa - Review';
require_once '../_header.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 5 star rating example using jQuery star rating plugin</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
</head>

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
                                <li class="breadcrumb-item"><a href="<?= $base_url."order/?log=".$_SESSION['id_pengguna']; ?>">Pesanan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **** Breadcrumb Area End ****--> 


    <?php 
    $id_pesanan=$_GET['id'];
    $query=mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");
    while ($data=mysqli_fetch_assoc($query)) {
     ?>

    <section class="product_description_area wow fadeInUp" data-wow-delay="200ms">
        <div class="container">
          <div class="row" >              
            <div class="col-lg-8">
              <div class="review_box">
                <form class="row contact_form" action="prosesreview.php" method="post">
                  <div class="col-md-12 mb-3">
                    <h4>Review</h4>
                    <br/>
                    <label for="input-1" class="control-label"></label>
                    <input type="text" name="id_penilaian" hidden>
                    <input type="hidden" name="id_pengguna" value="<?php $_SESSION['id_pengguna']; ?>">
                    <input type="text" name="id_pesanan" value="<?= $data['id_pesanan']; ?>" hidden>
                    <input id="input-1" name="rating" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-size="xs" required="">
                    <script>
                    $("#input-id").rating();
                    </script>

                  </div>
                  <div class="col-md-12">                    
                    <div class="form-group">                      
                      <textarea cols="50" class="form-control" name="komentar" rows="1" placeholder="komentar..." required=""></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn rehomes-btn mt-15">
                      Kirim
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php } require_once '../_footer.php' ?>    