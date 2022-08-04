@extends('index-login')
@section('title','Login')
@section('content')
<section class="ftco-section">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
             <h2 class="heading-section">Masukan Password Baru | Blossom Ville Citra Raya</h2>
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
                         <h6 class="mb-4">Masukan Password Anda yang Baru</h6>
                      </div>
                   </div>
                   <form action="/changepassword" method="POST" class="signin-form">
                     @csrf
                     <input type="hidden" name="id" value="{{$data->id}}">
                      <div class="form-group mb-3">
                         <label class="label" for="name" >New Password</label>
                         <input type="password" name="password" class="form-control" placeholder="New Password" required>
                      </div>
                      <div class="form-group mb-3">
                        <label class="label" for="name" >Retype Password</label>
                        <input type="password" name="retype-password" class="form-control" placeholder="Retype Password" required>
                     </div>
                      <div class="form-group">
                         <button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
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