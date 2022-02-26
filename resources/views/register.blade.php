@extends('index-login')
@section('title','Register')
@section('content')
<section class="ftco-section">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
             <h2 class="heading-section">Register | Blossom Ville Citra Raya</h2>
          </div>
       </div>
       <div class="row justify-content-center">
          <div class="col-md-12 col-lg-10 justify-content-center">
             <div class="wrap d-md-flex justify-content-center">
                
                <div class="login-wrap p-4 p-md-5 col-12">
                   <div class="d-flex">
                      <div class="w-100">
                         <h3 class="mb-4">Register</h3>
                      </div>
                      <div class="w-100">
                         <p class="social-media d-flex justify-content-end">
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                         </p>
                      </div>
                   </div>
                   <form action="/auth/register" method="POST" class="signin-form" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Email" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Nama Lengkap</label>
                              <input type="text" name="full_name" class="form-control" placeholder="Nama Lengkap" required>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="password">Password</label>
                              <input type="password" name="password" class="form-control" placeholder="Password" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                             <label class="label" for="password">Re-Type Password</label>
                             <input type="password" name="re-password" class="form-control" placeholder="Re-Type Password" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Tempat Lahir</label>
                              <input type="text" name="place_birth" class="form-control" placeholder="Tempat Lahir" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Tanggal Lahir</label>
                              <input type="date" name="date_birth" class="form-control" placeholder="Tanggal Lahir" required>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Jenis Kelamin</label>
                              <select name="gender" class="form-control" id="">
                                 <option value="">Jenis Kelamin</option>
                                 <option value="male">Laki-Laki</option>
                                 <option value="female">Perempuan</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Golongan Darah</label>
                              <input type="text" name="blod_type" class="form-control" placeholder="Golongan Darah">
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Agama</label>
                              <input type="text" name="religion" class="form-control" placeholder="Agama">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Status Perkawinan</label>
                              <select name="marriage" class="form-control" id="">
                                 <option value="">Status Perkawinan</option>
                                 <option value="lajang">Lajang</option>
                                 <option value="menikah">Menikah</option>
                                 <option value="duda/janda">Duda/Janda</option>
                              </select>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Nomor Telepon</label>
                              <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Pekerjaan</label>
                              <input type="number" name="job" class="form-control" placeholder="Pekerjaan">
                           </div>
                        </div>
                      </div>
                     
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">NIK (KTP)</label>
                              <input type="number" name="nik" class="form-control" placeholder="NIK (KTP)">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">No. KK</label>
                              <input type="number" name="kk" class="form-control" placeholder="No. KK">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Foto KTP</label>
                              <input type="file" name="attc_ktp" class="form-control" placeholder="KTP" required>
                              <small id="emailHelp" class="form-text text-dark">Ukuran File <span class="text-info file-size-ktp"></span> </small>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Foto KK</label>
                              <input type="file" name="attc_kk" class="form-control" placeholder="KK" required>
                              <small id="emailHelp" class="form-text text-dark">Ukuran File <span class="text-info file-size-kk"></span> </small>
                           </div>
                        </div>
                      </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Status Dalam Keluarga</label>
                        <select name="sts" class="form-control" id="">
                           <option value="">Status Dalam Keluarga</option>
                           <option value="ayah">Ayah</option>
                           <option value="ibu">Ibu</option>
                           <option value="anak">Anak</option>
                        </select>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Alamat</label>
                        <textarea name="address" class="form-control" required></textarea>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Blok</label>
                              <input type="text" name="block" class="form-control" placeholder="Blok" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">No. Rumah</label>
                              <input type="text" name="house_number" class="form-control" placeholder="No. Rumah" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">RT</label>
                              <select name="id_rt" class="form-control" required>
                                 <option value="">RT</option>
                                 @foreach ($rt as $item)
                                 <option value="{{$item->id}}">0{{$item->rt_no}} {{$item->rt_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group mb-3">
                              <label class="label" for="name">RW</label>
                              <input type="text" name="rw" class="form-control" placeholder="RW" readonly value="16">
                           </div>
                        </div>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Kel/Desa</label>
                        <input type="text" name="village" class="form-control" placeholder="Kel/Desa" value="Mekar Bakti" readonly>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Kecamatan</label>
                        <input type="text" name="distric" class="form-control" placeholder="Kecamatan" value="Panongan" readonly>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Kota/Kabupaten</label>
                        <input type="text" name="city" class="form-control" placeholder="Kota/Kabupaten" value="Kabupaten Tangerang" readonly>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Provinsi</label>
                        <input type="text" name="province" class="form-control" placeholder="Provinsi" value="Banten" readonly>
                     </div>
                      <div class="form-group">
                         <button type="submit" class="form-control btn btn-primary rounded submit px-3 btn-register">Register</button>
                      </div>
                   </form>
                   <p class="text-center">Already Register? <a href="/auth/login">Login</a></p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <script>
    $('input[name="attc_ktp"]').bind('change', function() {
       fileSize = Math.round(this.files[0].size/1000000)
       if(fileSize>4){
         $('.file-size-ktp').removeClass('text-info').addClass('text-danger')
         $('.file-size-ktp').text(fileSize+' MB, File terlalu besar, maksimal 4 MB')
         $('.btn-register').attr('type','button')
       } else {
         $('.file-size-ktp').text(fileSize+' MB')
         $('.btn-register').attr('type','submit')
       }

      });
      $('input[name="attc_kk"]').bind('change', function() {
       fileSize = Math.round(this.files[0].size/1000000)
       if(fileSize>4){
         $('.file-size-kk').removeClass('text-info').addClass('text-danger')
         $('.file-size-kk').text(fileSize+' MB, File terlalu besar, maksimal 4 MB')
         $('.btn-register').attr('type','button')
       } else {
         $('.file-size-kk').text(fileSize+' MB')
         $('.file-size-kk').removeClass('text-danger').addClass('text-info')
         $('.btn-register').attr('type','submit')
       }

      });
 </script>
@endsection