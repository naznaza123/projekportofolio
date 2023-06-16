<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>beranda</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </head>
  <body>
    
    <div class="">
      
    <nav class="navbar navbar-expand-lg mr-auto bg-body-black">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" class="fw-bold" >
      <img src="{{ asset('img/2.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
       Nazaa's
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
      <div class="navbar-nav  ml-auto">
        <a class="nav-link {{ Request::segment(1)=='beranda'?'active':''}}" aria-current="page" href="#">beranda</a>
        <a class="nav-link {{ Request::segment(1)=='profil'?'active':''}}" href="profil" >profil</a>
        <a class="nav-link {{ Request::segment(1)=='portofolio'?'active':''}}" href="portofolio">portofolio</a>
        <a class="nav-link" href="logout">keluar</a>
        
      </div>
    </div>
  </div>
</nav>
    </div>
    <div class="container mt-4">
      
      @yield('content')
      
    </div>
</body>
</html>