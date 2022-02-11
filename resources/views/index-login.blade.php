<!doctype html>
<html lang="en">
   <head>
      <title>@yield('title') | Blossom Ville Citra Raya</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="/login/css/style.css">
      <script src="/login/js/jquery.min.js"></script>
   </head>
   <body>
      <div class="container">
         @if (session()->has('error'))
             <div class="col-12 pt-2">
                <div class="alert alert-{{(session('error')?'danger':'success')}}" role="alert">
                   {{session('message')}}
                 </div>
             </div>
         @endif
      </div>
      @yield('content')
      
      <script src="/login/js/popper.js"></script>
      <script src="/login/js/bootstrap.min.js"></script>
      <script src="/login/js/main.js"></script>
   </body>
</html>