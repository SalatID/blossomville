@extends('index-login')
@section('title','Login')
@section('content')
<section class="ftco-section">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
             <h2 class="heading-section">Forgot Password | Blossom Ville Citra Raya</h2>
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
                         <h6 class="mb-4">Masukan Email Anda Untuk Melakukan Pergantian Password</h6>
                      </div>
                   </div>
                   <form action="/auth/login" method="POST" class="signin-form">
                     @csrf
                      <div class="form-group mb-3">
                         <label class="label" for="name" >Email</label>
                         <input type="text" name="email" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                         <button type="submit" class="form-control btn btn-primary rounded submit px-3">Forgot Password</button>
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