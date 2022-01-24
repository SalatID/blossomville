@extends('index-dash')
@section('webTittle','Dashboard')

@section('content')
<div class="container text-center"> 
    <h1>Registrasi Anda Sedang Proses <strong class="h1 text-success">Validasi</strong> oleh ketua RT {{;}}</h1>
    <h3>Harap menunggu maksimal 2 x 24 Jam atau hubungi nomor dibawah ini untuk konfirmasi</h3>
    @php
     $message = "Hallo Perkenalkan, nama saya ".$dataUser->full_name." saya warga baru di Blossom Ville Citra Raya, Blok ".$dataUser->block." No ".$dataUser->house_number.", Saya ingi melakukan konfirmasi bahwa saya sudah registrasi di https://www.blossomvillecitraraya.com,\n \n Untuk melihat detail data saya bisa di link https://blossomvillecitraraya.com/admin/rt/datawarga/".$encryptId." \n \n Pesan ini dikirim otomatis melalui Website Blossom Ville";   
    @endphp
    <a href="https://wa.me/{{$dataUser->getrt->rt_whatsapp}}?text={{$message}}" target="_blank" class="btn btn-success btn-sm btn-rounded">Ketua RT {{sprintf('%02d', $dataUser->getrt->rt_no);}} - {{$dataUser->getrt->rt_name}} <i class="fab fa-whatsapp"></i></a>
    <p class="text-warning">
        Note :
        Jangan merubah pesan otomatis yang akan di kirim melalui whatsapp
    </p>
</div>
@endsection