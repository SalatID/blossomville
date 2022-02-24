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
                    <input type="text" name="phone" class="form-control" id="staticEmail" value="{{$dataWarga->phone}}">
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
                    <input type="text" name="nik" class="form-control" placeholder="NIK (KTP)" value="{{$dataWarga->nik}}">
                 </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-group mb-3">
                    <label class="label" for="name">No. KK</label>
                    <input type="text" name="kk" class="form-control" placeholder="No. KK" value="{{$dataWarga->kk}}">
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
                </tr>
                @endforeach
                @foreach ($dataArt as $item)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$item->full_name}}</td>
                  <td>{{$item->nik}}</td>
                  <td>{{$item->sts}}</td>
                  <td>{{$item->marriage}}</td>
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
        <h5 class="modal-title" id="tambahArtLabel">Tambah Berita</h5>
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
                 <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon">
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
                  <input type="text" name="nik" class="form-control" placeholder="NIK (KTP)">
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group mb-3">
                  <label class="label" for="name">No. KK</label>
                  <input type="text" name="kk" class="form-control" placeholder="No. KK">
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
                <input type="text" name="art_parent" class="form-control" placeholder="No. KK" readonly value="{{auth()->user()->kk}}">
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
@endsection