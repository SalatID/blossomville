@extends('index-dash')
@section('webTittle','Data Warga')
 
@section('content')
<div class="row">
    <div class="col-xl-4 text-center">
        <h1>Lampiran KTP</h1>
        <h3>No KTP : {{$dataWarga->nik}}</h3>
        <img class="col-12 img-fluid" src="/{{$dataWarga->img_ktp}}" alt="">
        <h1>Lampiran KK</h1>
        <h3>No KK : {{$dataWarga->kk}}</h3>
        <img class="col-12 img-fluid" src="/{{$dataWarga->img_kk}}" alt="">
    </div>
    <div class="col-xl-8 card rounded">
        <div class="card-body">
            @if ($dataWarga->rt_name!=null)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 badge badge-pill badge-success font-weight-bold text-light card-title" style="font-size:2rem">Ketua RT {{sprintf('%02d', $dataWarga->rt_no)}}</label>
            </div>
            @endif
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->full_name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Nomor Telepon</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->phone}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Tempat/Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->place_birth}}, {{$dataWarga->date_birth}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->gender=='male'?'Laki-Laki':'Perempuan'}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Pekerjaan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->job}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Agama</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->religion}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Status Pernikahan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->marriage??'Not Set'}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Status Dalam Keluarga</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->sts??'Not Set'}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Alamat</label>
                <div class="col-sm-10">
                  <textarea type="text" readonly class="form-control-plaintext" id="staticEmail" value="">{{$dataWarga->address}},RT/RW {{$dataWarga->getrt->rt_no}}/{{$dataWarga->rw}},Blok {{$dataWarga->block}} No. {{$dataWarga->house_number}}, Kel. {{$dataWarga->village}},Kec. {{$dataWarga->distric}},{{$dataWarga->city}},{{$dataWarga->province}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Golongan Darah</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$dataWarga->blod_type??'Not Set'}}">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{$dataWarga->verified==1?'#':'/admin/rt/datawarga/verifikasi/'.Crypt::encryptString($idWarga)}}" class="btn btn-{{$dataWarga->verified==1?'success':'warning'}}">{{$dataWarga->verified==1?'Sudah Di Verifikasi':'Verifikasi Sekarang'}}</a>
            </div>
        </div>
    </div>
</div>
@endsection