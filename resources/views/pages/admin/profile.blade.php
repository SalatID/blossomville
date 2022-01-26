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
      </div>
  </div>
</form>
@endsection