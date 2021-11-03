<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>TOKODIKA</title>

    <link href="<?php echo base_url(); ?>/assets/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Bootstrap core CSS -->


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
    <link href="<?php echo base_url(); ?>/assets/navbar-static/navbar-top.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TOKODIKA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      </ul>
      <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    <a class="nav-link active" href="<?php echo base_url('login'); ?>">Login</a>
    </li>
  </ul>
    </div>
  </div>
</nav>

<main class="container">

<?php
    $this->load->view($namamodule .'/'.$namafileview);
  ?>

</main>


<script src="<?php echo base_url(); ?>/assets/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
