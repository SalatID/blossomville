@extends('index-login')
@section('title','Login')
@section('content')
<section class="ftco-section">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
             <h2 class="heading-section">Login | Blossom Ville Citra Raya</h2>
          </div>
       </div>
       <div class="row justify-content-center">
          <div class="col-md-12 col-lg-10">
             <div class="wrap d-md-flex">
                <div class="img" style="background-image: url(/login/images/blossom.png);">
                </div>
                <div class="login-wrap p-4 p-md-5">
                   <div class="d-flex">
                      <div class="w-100">
                         <h3 class="mb-4">Login</h3>
                      </div>
                      <div class="w-100">
                         <p class="social-media d-flex justify-content-end">
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                         </p>
                      </div>
                   </div>
                   <form action="/auth/login" method="POST" class="signin-form">
                     @csrf
                      <div class="form-group mb-3">
                         <label class="label" for="name">Email</label>
                         <input type="text" name="email" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group mb-3">
                         <label class="label" for="password">Password</label>
                         <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                         <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                      </div>
                      <div class="form-group d-md-flex">
                         <div class="w-50 text-left">
                            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                            </label>
                         </div>
                         <div class="w-50 text-md-right">
                            <a href="/auth/forgotpassword">Forgot Password</a>
                         </div>
                      </div>
                   </form>
                   <p class="text-center">Not a member? <a href="/auth/register">Sign Up</a></p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection