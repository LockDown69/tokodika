<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="<?php echo base_url(); ?>/assets/img/icon-kategori.ico" type="image/ico">


    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>/assets/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="<?php echo base_url(); ?>/assets/cheatsheet/cheatsheet.css" rel="stylesheet"> -->


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>/assets/dashboard/dashboard.css" rel="stylesheet">
    
  </head>
  <body>
    

  
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">TOKODIKA</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" type="button" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#logout">
                &nbsp; Logout</a>
    </li>
  </ul>
</header>

<div class="modal fade" id="logout" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal Logout</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <p>Apakah anda yakin ingin logout<b>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <a class="btn btn-danger btn-rounded"
                    href="<?php echo base_url('login/logoutApp/') ?>">Logout</a>
                </div>
              </div>
            </div>
          </div>






<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
       
       <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('profile'); ?>">
              <span data-feather="file-text"></span>
              Pengaturan Profile
            </a>
          </li>
       <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('produk'); ?>">
              <span data-feather="file-text"></span>
              Pengaturan Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('kategori'); ?>">
              <span data-feather="file-text"></span>
              Pengaturan Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('merk'); ?>">
              <span data-feather="file-text"></span>
              Pengaturan Merk
            </a>
          </li>
        </h6>
        </ul>
      </div>
    </nav>
  </div>
</div>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


<?php
    $this->load->view($namamodule .'/'.$namafileview);
  ?>

</main>
    <script src="<?php echo base_url(); ?>/assets/assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
