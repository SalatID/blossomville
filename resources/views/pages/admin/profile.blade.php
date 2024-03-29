@extends('index-dash')
@section('webTittle','Profile')
 
@section('content')
<form action="/auth/profile/update" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
      <div class="col-xl-4 text-center">
          <h1>Lampiran KTP</h1>
          <h3>No KTP : {{$dataWarga->nik}}</h3>
          <img class="col-12 img-fluid" src="/{{$dataWarga->img_ktp??'dashboard/assets/img/ktp.png'}}" alt="">
          <h3>Ganti KTP</h3>
          <input type="file" name="attc_ktp" class="form-control" placeholder="KTP">
          <br>
          <h1>Lampiran KK</h1>
          <h3>No KK : {{$dataWarga->kk}}</h3>
          <img class="col-12 img-fluid" src="/{{$dataWarga->img_kk??'dashboard/assets/img/kk.png'}}" alt="">
          <h3>Ganti KK</h3>
          <input type="file" name="attc_kk" class="form-control" placeholder="KTP">
      </div>
      <div class="col-xl-8 card rounded">
          <div class="card-body">
              @if ($dataWarga->rt_name!=null)
              <div class="form-group row">
                  <label class="col-sm-2 badge badge-pill badge-success font-weight-bold text-light card-title" style="font-size:2rem">Ketua RT {{sprintf('%02d', $dataWarga->rt_no)}}</label>
              </div>
              @endif
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="staticEmail" value="{{$dataWarga->full_name}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Email</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="staticEmail" value="{{$dataWarga->email}}" readonly>
                    <button type="button" class="btn btn-success btn-sm">Ganti Email</button>
                    <button type="button" class="btn btn-primary btn-sm">Ganti Password</button>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="number" name="phone" class="form-control" id="staticEmail" value="{{$dataWarga->phone}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Tempat/Tanggal Lahir</label>
                  <div class="col-sm-5">
                    <input type="text" name="place_birth" class="form-control" id="staticEmail" value="{{$dataWarga->place_birth}}">
                  </div>
                  <div class="col-sm-5">
                    <input type="date" name="date_birth" class="form-control" id="staticEmail" value="{{$dataWarga->date_birth}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <div class="form-group mb-3">
                      <select name="gender" class="form-control" id="">
                         <option {{($dataWarga->gender==''?'selected':'')}} value="">Jenis Kelamin</option>
                         <option {{($dataWarga->gender=='male'?'selected':'')}} value="male">Laki-Laki</option>
                         <option {{($dataWarga->gender=='female'?'selected':'')}} value="female">Perempuan</option>
                      </select>
                   </div>
                  </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label font-weight-bold">KTP&KK</label>
                <div class="col-sm-5">
                  <div class="form-group mb-3">
                    <label class="label" for="name">NIK (KTP)</label>
                    <input type="number" name="nik" class="form-control" placeholder="NIK (KTP)" value="{{$dataWarga->nik}}">
                 </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-group mb-3">
                    <label class="label" for="name">No. KK</label>
                    <input type="number" name="kk" class="form-control" placeholder="No. KK" value="{{$dataWarga->kk}}">
                 </div>
                </div>
            </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Pekerjaan</label>
                  <div class="col-sm-10">
                    <input type="text" name="job" class="form-control" id="staticEmail" value="{{$dataWarga->job}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Agama</label>
                  <div class="col-sm-10">
                    <input type="text" name="religion" class="form-control" id="staticEmail" value="{{$dataWarga->religion}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Status Pernikahan {{$dataWarga->marriage=='Menikah'?'true':'false'}}</label>
                  <div class="col-sm-10">
                    <div class="form-group mb-3">
                      <select name="marriage" class="form-control" id="">
                         <option {{($dataWarga->marriage==''?'selected':'')}} value="">Status Perkawinan</option>
                         <option {{($dataWarga->marriage=='lajang'?'selected':'')}} value="lajang">Lajang</option>
                         <option {{($dataWarga->marriage=='menikah'?'selected':'')}} value="menikah">Menikah</option>
                         <option {{($dataWarga->marriage=='duda/janda'?'selected':'')}} value="duda/janda">Duda/Janda</option>
                      </select>
                   </div>
                    
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Status Dalam Keluarga</label>
                  <div class="col-sm-10">
                    <div class="form-group mb-3">
                      <select name="sts" class="form-control" id="">
                         <option {{$dataWarga->sts==''?'selected':''}} value="">Status Dalam Keluarga</option>
                         <option {{$dataWarga->sts=='ayah'?'selected':''}} value="ayah">Ayah</option>
                         <option {{$dataWarga->sts=='ibu'?'selected':''}} value="ibu">Ibu</option>
                         <option {{$dataWarga->sts=='anak'?'selected':''}} value="anak">Anak</option>
                      </select>
                   </div>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Alamat</label>
                  <div class="col-sm-10">
                    <div class="form-group mb-3">
                      <label class="label" for="name">Alamat</label>
                      <textarea name="address" class="form-control">{{$dataWarga->address}}</textarea>
                   </div>
                   <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group mb-3">
                            <label class="label" for="name">Blok</label>
                            <input type="text" name="block" class="form-control" placeholder="Blok" value="{{$dataWarga->block}}">
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group mb-3">
                            <label class="label" for="name">No. Rumah</label>
                            <input type="text" name="house_number" class="form-control" placeholder="No. Rumah" value="{{$dataWarga->house_number}}">
                         </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group mb-3">
                            <label class="label" for="name">RT</label>
                            <select name="id_rt" class="form-control">
                               <option value="">RT</option>
                               @foreach ($rt as $item)
                               <option {{$dataWarga->id_rt==$item->id?'selected':''}} value="{{$item->id}}">0{{$item->rt_no}} {{$item->rt_name}}</option>
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
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label font-weight-bold">Golongan Darah</label>
                  <div class="col-sm-10">
                    <input type="text" name="blod_type" class="form-control" id="staticEmail" value="{{$dataWarga->blod_type??'Not Set'}}">
                  </div>
              </div>
              <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Ubah Data</button>
              </div>
          </div>
          <div class="card-body">
            <div class="row d-flex justify-content-between mb-2">
              <h3>Anggota Keluarga</h3>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahAnggotaKel"> <i class="fas fa-plus"></i>Tambah Anggota Keluarga</button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahArt"> <i class="fas fa-plus"></i>Tambah ART</button>
            </div>
            <table class="table table-striped" id="tableFamily">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Status Dalam Keluarga</th>
                  <th>Status Pernikahan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php($i=1)
                @foreach ($dataFamily as $item)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$item->full_name}}</td>
                  <td>{{$item->nik}}</td>
                  <td>{{$item->sts}}</td>
                  <td>{{$item->marriage}}</td>
                  <td>
                     <a href="/admin/rt/datawarga/{{Crypt::encryptString($item->id)}}"  target="_blank"  class="btn btn-primary">Detail</a>
                     @if(auth()->user()->id != $item->id)
                     <button type="button" class="btn btn-success btn-edit" data-id="{{Crypt::encryptString($item->id)}}">Edit </button>
                     <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-danger mr-2" onclick="deleteUser(this)">Hapus</a>
                     @endif
                  </td>
                </tr>
                @endforeach
                @foreach ($dataArt as $item)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$item->full_name}}</td>
                  <td>{{$item->nik}}</td>
                  <td>{{$item->sts}}</td>
                  <td>
                    {{$item->marriage}} 
                  </td>
                  <td>
                     <a href="/admin/rt/datawarga/{{Crypt::encryptString($item->id)}}" target="_blank" class="btn btn-primary">Detail</a>
                     @if(auth()->user()->id != $item->id)
                     <button type="button" class="btn btn-success " data-id="{{Crypt::encryptString($item->id)}}">Edit </button>
                     <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-danger mr-2" onclick="deleteUser(this)">Hapus</a>
                     @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
  </div>
</form>
<div class="modal fade" id="tambahArt" tabindex="-1" role="dialog" aria-labelledby="tambahArtLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahArtLabel">Tambah ART</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/auth/register" method="POST" class="signin-form" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="sts" value="art">
          <input type="hidden" name="job" value="Asisten Rumah Tangga">
          <input type="hidden" name="id_rt" value="{{auth()->user()->id_rt}}">
          <input type="hidden" name="id_rw" value="{{auth()->user()->id_rw}}">
          <div class="row">
            <div class="col-sm-6">
               <div class="form-group mb-3">
                  <label class="label" for="name">Nama Lengkap</label>
                  <input type="text" name="full_name" class="form-control" placeholder="Nama Lengkap" required>
               </div>
            </div>
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
                 <label class="label" for="name">Nomor Telepon</label>
                 <input type="number" name="phone" class="form-control" placeholder="Nomor Telepon">
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
                <label class="label" for="name">Status Art</label>
                <select name="art_sts" class="form-control" id="">
                  <option value="">Art Status</option>
                  <option value="pulang">Pulang</option>
                  <option value="menginap">Menginap</option>
                </select>
             </div>
          </div>
          <div class="col-sm-6">
             <div class="form-group mb-3">
                <label class="label" for="name">No. KK Pemilik Rumah</label>
                <input type="number" name="art_parent" class="form-control" placeholder="No. KK" readonly value="{{auth()->user()->kk}}">
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
            <label class="label" for="name">Alamat</label>
            <textarea name="address" class="form-control"></textarea>
         </div>
         <div class="row">
           <div class="form-group col-sm-6 mb-3">
              <label class="label" for="name">Kel/Desa</label>
              <input type="text" name="village" class="form-control" placeholder="Kel/Desa" >
           </div>
           <div class="form-group col-sm-6 mb-3">
              <label class="label" for="name">Kecamatan</label>
              <input type="text" name="distric" class="form-control" placeholder="Kecamatan" >
           </div>
         </div>
         <div class="row">
           <div class="form-group col-sm-6 mb-3">
              <label class="label" for="name">Kota/Kabupaten</label>
              <input type="text" name="city" class="form-control" placeholder="Kota/Kabupaten" >
           </div>
           <div class="form-group col-sm-6 mb-3">
              <label class="label" for="name">Provinsi</label>
              <input type="text" name="province" class="form-control" placeholder="Provinsi">
           </div>
         </div>
          <div class="form-group">
             <button type="submit" class="form-control btn btn-primary rounded submit px-3 btn-register">Register</button>
          </div>
       </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="tambahAnggotaKel" tabindex="-1" role="dialog" aria-labelledby="tambahAnggotaKelLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="tambahAnggotaKelLabel">Tambah Anggota Keluarga</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="/auth/register" method="POST" class="signin-form" id="addAnggotaKel"  name="addAnggotaKel" enctype="multipart/form-data">
            @csrf
            <div class="row">
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
                    <input type="number" name="phone" class="form-control" placeholder="Nomor Telepon">
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group mb-3">
                    <label class="label" for="name">Pekerjaan</label>
                    <input type="text" name="job" class="form-control" placeholder="Pekerjaan">
                 </div>
              </div>
            </div>
           
           <div class="row">
              <div class="col-sm-6">
                 <div class="form-group mb-3">
                    <label class="label" for="name">NIK (KTP)</label>
                    <input type="number" name="nik" class="form-control" placeholder="NIK (KTP)" required>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group mb-3">
                    <label class="label" for="name">No. KK</label>
                    <input type="number" name="kk" class="form-control" placeholder="No. KK" value="{{auth()->user()->kk}}" readonly>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-sm-6">
                 <div class="form-group mb-3">
                    <label class="label" for="name">Foto KTP</label>
                    <input type="file" id="attc_ktp≈" name="attc_ktp" class="form-control" placeholder="KTP">
                    <small id="emailHelp" class="form-text text-dark">Ukuran File <span class="text-info file-size-ktp"></span> </small>
                 </div>
              </div>
              <div class="col-sm-6">
               <div class="form-group mb-3">
                  <label class="label" for="name">Status Dalam Keluarga</label>
                  <select name="sts" class="form-control" id="">
                     <option value="">Status Dalam Keluarga</option>
                     <option value="ayah">Ayah</option>
                     <option value="ibu">Ibu</option>
                     <option value="anak">Anak</option>
                  </select>
               </div>
              </div>
            </div>
           
           <div class="form-group mb-3">
              <label class="label" for="name">Alamat</label>
              <textarea name="address" class="form-control" readonly>{{auth()->user()->address}}</textarea>
           </div>
           <div class="row">
              <div class="col-sm-6">
                 <div class="form-group mb-3">
                    <label class="label" for="name">Blok</label>
                    <input type="text" name="block" class="form-control" placeholder="Blok" value="{{auth()->user()->block}}" readonly>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group mb-3">
                    <label class="label" for="name">No. Rumah</label>
                    <input type="text" name="house_number" class="form-control" placeholder="No. Rumah" readonly value="{{auth()->user()->block}}" >
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-sm-6">
                 <div class="form-group mb-3">
                    <label class="label" for="name">RT</label>
                    <select name="id_rt" class="form-control" readonly>
                       <option value="">RT</option>
                       @foreach ($rt as $item)
                       <option value="{{$item->id}}" {{auth()->user()->id_rt==$item->id?'selected':''}}>0{{$item->rt_no}} {{$item->rt_name}}</option>
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
       </div>
     </div>
   </div>
 </div>
 <script>
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
      $('.btn-edit').click(function(){
         $.get('/datawarga/'+$(this).data('id'),function(data){
            console.log(data)
            if(data.dataWarga.art_sts==null){
               $('input[name="full_name"]').val(data.dataWarga.full_name)
               $('input[name="place_birth"]').val(data.dataWarga.place_birth)
               $('input[name="date_birth"]').val(data.dataWarga.date_birth)
               $('select[name="gender"]').val(data.dataWarga.gender)
               $('input[name="blod_type"]').val(data.dataWarga.blod_type)
               $('input[name="religion"]').val(data.dataWarga.religion)
               $('select[name="marriage"]').val(data.dataWarga.marriage)
               $('input[name="phone"]').val(data.dataWarga.phone)
               $('input[name="job"]').val(data.dataWarga.job)
               $('input[name="nik"]').val(data.dataWarga.nik)
               // $('<input>').attr({
               //      type: 'hidden',
               //      name: 'text_ktp',
               //      class: 'form-control',
               //      value:data.dataWarga.nik
               //  }).appendTo('#attc_ktp');
               $('select[name="sts"]').val(data.dataWarga.sts)
               $('textarea[name="address"]').val(data.dataWarga.address)
               $('<input>').attr({
                    type: 'hidden',
                    name: 'id',
                    value:data.dataWarga.id
                }).appendTo('form[name="addAnggotaKel"]');
            }
               // $('input[name="product_name"]').val(d.product_name)
               //  $('input[name="price"]').val(d.price)
               //  $('textarea[name="description"]').val(d.description)
               //  $('input[name="image"]').attr('required',false)
               //  $('#tambahProdukLabel').text('Edit Produk')
               //  $('<input>').attr({
               //      type: 'hidden',
               //      name: 'id',
               //      value:d.id
               //  }).appendTo('form');
               $('input[name="attc_ktp"]').attr('required',false)
                $('form[name="addAnggotaKel"]').attr('action','/auth/profile/update')
                $('.btn-register').text('Update')
                $('#tambahAnggotaKel').modal('show')
            // })
         })
      })
      function deleteUser(e){
        if(confirm("Hapus Warga Ini?")){
            $.get('/user/delete/'+$(e).data('id'),function(d){
                location.reload()
            })
        }
    }
 </script>
@endsection