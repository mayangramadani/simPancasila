<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Bootstrap CSS -->
    <link href="{!! asset('asset/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/fontawesome/css/all.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/css/bootstrap.css') !!}" rel="stylesheet">
    <script src="{!! asset('asset/js/bootstrap.bundle.min.js') !!}"> </script>
    <script src="{!! asset('asset/js/bootstrap.js') !!}"> </script>
    <title>SMP Sinar Pancasila</title>
  </head>
  <div class="wrapper">
    <div class="logo">
        <img src="{!! asset('asset/img/logo.png') !!}" alt="">
    </div>
    <div class="text-center mt-4 name">
        SMP Sinar Pancasila
    </div>
    <form class="p-3 mt-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-user"></span>
            <input type="text" name="email" id="userName" placeholder="Username">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="password" id="pwd" placeholder="Password">
        </div>
        <button class="btn mt-3" type="submit">Login</button></a>
      
    </form>
    <div class="text-center fs-6">
        <a href="#">Forget password?</a>
    </div>
  </div>