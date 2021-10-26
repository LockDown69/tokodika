<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>TOKODIKA | Daftar Akun</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>assets/assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="<?php echo base_url(); ?>/assets/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
<form action="<?php echo base_url('login/simpanRegisterUser' ) ?>" method="POST">
    <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mb-3 fw-normal">Silahkan Daftar</h1>

    
    <div class="form-floating">
      <input type="text" name="user_name" class="form-control" required id="floatingPassword" placeholder="Nama">
      <label for="floatingPassword">Nama</label>
    </div>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" required id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" requied id="myInput" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox mb-3">
    <label> <input type="checkbox" class="form-check-input" onclick="myFunction()"> Lihat Password </label>
    </div>
    <div class="form-floating">
      <input type="number" name="user_telp" class="form-control" required id="floatingTelepon" placeholder="Nomor Telepon">
      <label for="floatingTelepon">Nomor Telepon</label>
    </div>    
    <div class="form-floating">
      <input type="email" name="user_email" class="form-control" required id="floatingEmail" placeholder="Email">
      <label for="floatingEmail">Alamat Email</label>
    </div>
        <div class="form-floating">
      <input type="text" name="user_address" class="form-control" required id="floatingAddress" placeholder="Alamat">
      <label for="floatingAddress">Alamat Rumah</label>
    </div>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
    <h5>Sudah punya akun <a href="<?php echo base_url('login' ) ?>">Login</a><h5>
    
  </form>
</main>

<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

    
  </body>
</html>
