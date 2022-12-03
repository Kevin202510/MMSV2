<?php
  /* User's password. */
// $password = 'password';

/* Secure password hash. */
// $hash = password_hash($password, PASSWORD_DEFAULT).'<br>';
// Auth::user()->password.'<br>';

// $check = password_verify($password, Auth::user()->password);

if(isset($_GET['lock_password'])){
  $check = password_verify($_GET['lock_password'], Auth::user()->password);

  if($check){ ?>
    <script>
      window.location.replace("/home");
    </script>
  <?php }else{ ?>
    <script>
      alert('Incorrect password');
    </script>
  <?php }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MMS | LockScreen</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
  body{
    background-color:#d2d6de;
}
.main-section{
position: absolute;
left:50%;
top: 5%;
transform: translate(-50%,40%);
}
.header-section h1{
margin:10px 0px;
font-size:18px;
}
.user-image-section img{
height:150px;
}
.input-group{
margin:15px 0px;
}
</style>
</head>
<body>
<div class="container">
<input type="hidden" id="pfsImages" value="{{\Illuminate\Support\Facades\Auth::user()->profile}}">
<div class="row">
<div class="col-lg-4 col-md-12 col-12 login-section bg-white rounded main-section">
<div class="row">
<div class="col-lg-12 rounded-top bg-dark header-section border-bottom border-dark">
<h1 class="text-center text-white text-uppercase font-weight-normal">{{ Auth::user()->fullName }}</h1>
</div>
<div class="col-lg-12 text-center user-image-section p-5">
<img alt="image" id="profs" src="{{ asset('img/logo.png') }}" class="rounded-circle border-dark">
</div>
<div class="col-lg-12">
  <form action="">
    <div class="input-group">
    <div class="input-group-prepend">
    <div class="input-group-text"><i class="fa fa-lock"></i></div>
    </div>
    <input type="password" class="form-control pwd" placeholder="Password" name="lock_password" id="lock_password" required>
    </div>
    <div class="input-group">
    <input type="submit" value="Unlock" class="btn btn-dark w-100">
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>
</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
</html>