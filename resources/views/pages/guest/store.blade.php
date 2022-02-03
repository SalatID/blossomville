@extends('index')
@section('content')
<div class="row p-5">
    <div class="col-md-3">
        <div class="card p-3">
            <img class="card-img-top" src="/{{$dataToko->store_banner}}" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
            <img class="card-img-top float-right bg-white rounded-circle shadow" src="/{{$dataToko->store_logo}}" style="height: 15vh;width:15vh;margin-top:-10vh;" alt="Card image cap">
            <h1 class="card-tilte">{{$dataToko->store_name}}</h1>
            <p class="card-text" style="height: 10vh;">{{$dataToko->description}}</p>
            <p class="card-text" style="height: 5vh;">{{$dataToko->address}}</p>
            <div class="d-flex justify-content-end">
                <a href="https://wa.me/{{$dataToko->phone}}?text=Hallo, saya mau tanya-tanya tentang toko {{$dataToko->store_name}}" class="btn btn-success"><i class="fa fa-whatsapp"></i> Hubungi Penjual</a>
            </div>
        </div>
    </div>
    <div class="col-md-9 overflow-auto">
        <div class="row">

            @foreach ($products as $item)
                <div class="card col-xl-4 col-md-4 col-sm-6 m-2">
                    <img class="card-img-top" src="/{{$item->image}}" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">{{$item->product_name}}</h3>
                        <h5 class="card-title">Toko : {{$item->getstore->store_name}}</h5>
                        <p class="card-text" style="height: 10vh">{{$item->description}}</p>
                        <div class="d-flex justify-content-between">
                            <h5 class="card-text">Rp {{$item->price}}</h5>
                            @if ($item->getstore->whatsapp_sts=='Y')
                                @php
                                    $url=url()->full();
                                    $text = "Hallo Saya ingin bertanya tentang produk ".$item->product_name." dari toko ".$item->getstore->store_name.", saya melihat produk ini di ".$url;
                                @endphp
                                <a href="https://wa.me/{{$item->getstore->phone}}?text={{$text}}" class="card-text btn btn-success" target="_blank"><i class="fa fa-whatsapp"></i> Hubungi Penjual</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    </div>
    <div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="tambahProdukLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahProdukLabel">Tambah Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form name="activityName" action="/admin/produk" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_toko" value="{{$idToko}}">
                    <div class="form-group mb-3">
                        <label class="label" for="name">Nama Produk</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Nama Produk" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Price" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Deskripsi</label>
                        <textarea name="description" class="form-control" required></textarea>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Gambar Produk</label>
                        <input type="file" name="image" class="form-control" required>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      <script>
          $('.btn-edit').click(function(){
            $.get('/produk/detail/'+$(this).data('id'),function(d){
                $('input[name="product_name"]').val(d.product_name)
                $('input[name="price"]').val(d.price)
                $('textarea[name="description"]').val(d.description)
                $('input[name="image"]').attr('required',false)
                $('form[name="activityName"]').attr('action','/admin/produk/update')
                $('#tambahProdukLabel').text('Edit Produk')
                $('<input>').attr({
                    type: 'hidden',
                    name: 'id',
                    value:d.id
                }).appendTo('form');
                $('#tambahProduk').modal('show')
            })
          })
          $('.btn-delete').click(function(){
            if(confirm("Hapus Produk Ini?")){
                $.get('/produk/delete/'+$(this).data('id'),function(d){
                    location.reload()
                })
            }
        })
      </script>
@endsection