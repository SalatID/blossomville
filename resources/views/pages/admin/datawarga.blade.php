@extends('index-dash')
@section('webTittle','Data Warga')
 
@section('content')
<div class="row">
    <div class="col-xl-12 table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Status Pernikahan</th>
                    <th>Status Dalam Keluarga</th>
                    <th>Pekerjaan</th>
                    <th>Agama</th>
                    <th>Lampiran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach ($dataWarga as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->gender=='male'?'Laki-laki':'Perempuan'}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->address}}, Blok {{$item->block}} No {{$item->house_number}} RT {{$item->getrt->rt_no}}/{{$item->rw}}</td>
                        <td>{{$item->marriage}}</td>
                        <td>{{$item->sts}}</td>
                        <td>{{$item->job}}</td>
                        <td>{{$item->religion}}</td>
                        <td>
                            <a href="#">Lampiran KTP</a><br>
                            <a href="#">Lampiran KK</a>
                        </td>
                        <td>
                            <button class="btn btn-{{$item->verified==1?'success':'warning'}}" {{$item->verified==1?'disabled':''}}>{{$item->verified==1?'Sudah di Verifikasi':'Verifikasi Sekarang'}}</button>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection