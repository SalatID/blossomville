@extends('index')
@section('content')
<div class="container pt-5">
    <div class="d-flex justify-content-center p-6 m-6">
        <div class="input-group input-group-sm mb-3">
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="cursor: pointer"><i class="fa fa-search"></i> Search</span>
            </div>
          </div>
    </div>
</div>
<div class="row p-5">
    <div class="col-md-9 overflow-auto">
        @foreach ($products as $item)
            <div class="card col-xl-4 col-md-4 col-sm-6">
                <img class="card-img-top" src="/{{$item->image}}" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{$item->product_name}}</h3>
                    <h5 class="card-title"><a href="/toko/detail/{{Crypt::encryptString($item->getstore->id)}}">Toko : {{$item->getstore->store_name}}</a> </h5>
                    <p class="card-text" style="height: 10vh">{{$item->description}}</p>
                    <div class="d-flex justify-content-between">
                        <h5 class="card-text">Rp {{$item->price}}</h5>
                        @if ($item->getstore->whatsapp_sts=='Y')
                            @php
                                $url="";
                                $text = "Hallo Saya ".auth()->user()->full_name." ingin bertanya tentang produk ".$item->product_name." dari toko ".$item->getstore->store_name.", saya melihat produk ini di ".$url;
                            @endphp
                            <a href="https://wa.me/{{$item->getstore->phone}}?text={{$text}}" class="card-text btn btn-success" target="_blank"><i class="fa fa-whatsapp"></i> Hubungi Penjual</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    </div>
@endsection