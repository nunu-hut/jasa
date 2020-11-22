<?php 
$title = 'Admin Area - Feedback';
$menu = 'feedback';

require_once '../auth.php';
require_once '../_layout/header.php';
?>

<?php 
/*if($_GET['pesan'] == "add"){
  echo "<script>alert('Data telah disimpan')</script>";
} elseif ($_GET['pesan'] == "update"){
  echo "<script>alert('Data berhasil diubah')</script>";
} elseif ($_GET['pesan'] == "delete") {
  echo "<script>alert('Data berhasil dihapus')</script>";
}
*/
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
              <h3 class="mb-0">FEEDBACK</h3>
              <p class="mb-0">Keluhan yang diajukan oleh Client</p>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Diajukan oleh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pesan</th>
                    
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $query= mysqli_query($mysqli, "SELECT * FROM feedback");
                  while ($data = mysqli_fetch_assoc($query)){ 
                  ?>
                  <tr>                                       
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['nama'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['email'];?></span>
                    </td>
                    <td>
                      <span class="mb-0 text-sm"><?php echo $data['pesan'];?></span>  
                    </td>                                      
                  </tr>
                  <?php } ?>                      
                </tbody>
              </table>
            </div>
             <!-- paging 
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