@extends('index')
@section('content')
<div class="container pt-5">
    <div class="d-flex justify-content-center p-6 m-6">
        <div class="input-group input-group-sm mb-3">
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="name" value="{{$name??''}}" placeholder="Masukan nama toko atau produk">
            <div class="input-group-prepend">
              <span class="input-group-text btn-search" id="inputGroup-sizing-sm" style="cursor: pointer"><i class="fa fa-search"></i> Search</span>
            </div>
          </div>
    </div>
</div>
@if (count($tokos)>0)
<div class="row p-5">
    <div class="col-md-12 overflow-auto">
        <h1 class="text-dark">Toko yang sesuai</h1>
        @foreach ($tokos as $item)
        <div class="card p-3 col-xl-3 col-md-4 col-sm-6">
            <img class="card-img-top" src="/{{$item['store_banner']}}" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
            <img class="card-img-top float-right bg-white rounded-circle shadow" src="/{{$item['store_logo']}}" style="height: 15vh;width:15vh;margin-top:-10vh;" alt="Card image cap">
            <a href="/toko/detail/{{Crypt::encryptString($item['id'])}}"><h1 class="card-tilte">{{$item['store_name']}}</h1></a>  
            <p class="card-text" style="height: 5vh;">{{$item['address']}}</p>
        </div>
        @endforeach
    </div>
</div>
@endif
@if (count($products)>0)
<div class="row p-5">
    <div class="col-md-12 overflow-auto">
        <h1 class="text-dark">Produk yang tersedia</h1>
        @foreach ($products as $item)
            <div class="card col-xl-3 col-md-4 col-sm-6">
                <img class="card-img-top" src="/{{$item['image']}}" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{$item['product_name']}}</h3>
                    <h5 class="card-title"><a href="/toko/detail/{{Crypt::encryptString($item['getstore']['id'])}}">Toko : {{$item['getstore']['store_name']}}</a> </h5>
                    <p class="card-text" style="height: 10vh">{{$item['description']}}</p>
                    <div class="d-flex justify-content-between">
                        <h5 class="card-text">Rp {{$item['price']}}</h5>
                        @if ($item['getstore']['whatsapp_sts']=='Y')
                            @php
                                $url=url()->full();
                                $text = "Hallo Saya ingin bertanya tentang produk ".$item['product_name']." dari toko ".$item['getstore']['store_name'].", saya melihat produk ini di ".$url;
                            @endphp
                            <a href="https://wa.me/{{$item['getstore']['phone']}}?text={{$text}}" class="card-text btn btn-success" target="_blank"><i class="fa fa-whatsapp"></i> Hubungi Penjual</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endif
<script>
    $('.btn-search').click(function(){
        window.location.href = '/product/search'+($('input[name="name"]').val()!=''?'?name='+$('input[name="name"]').val():'')
    })
</script>
@endsection