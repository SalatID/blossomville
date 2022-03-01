@extends('index-dash')
@section('webTittle','Site Setting')
@section('content')
<form action="/admin/sitesetting" method="post" enctype="multipart/form-data" >
   <div class="row">
      @csrf
      <div class="col-sm-6">
         <div class="form-group mb-3">
            <label class="label" for="name">Site Name</label>
            <input type="text" name="site_title" class="form-control" placeholder="Site Name" value='{{$siteData->site_title??''}}' required>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="form-group mb-3">
            <label class="label" for="name">Description</label>
            <input type="text" name="site_description" class="form-control" placeholder="Description" value='{{$siteData->site_description??''}}' required>
         </div>
      </div>
      <div class="col-sm-6">
         <img src="/{{$siteData->site_icon??''}}" class="img-fluid" alt="">
         <div class="form-group mb-3">
            <label class="label" for="name">Icon</label>
            <input type="file" name="site_icon" class="form-control" placeholder="Icon" value='{{$siteData->site_icon??''}}' >
         </div>
      </div>
      <div class="col-sm-6">
         <img src="/{{$siteData->site_favicon??''}}" class="img-fluid" alt="">
         <div class="form-group mb-3">
            <label class="label" for="name">Favicon</label>
            <input type="file" name="site_favicon" class="form-control" placeholder="Favicon" value='{{$siteData->site_favicon??''}}' >
         </div>
      </div>
      <div class="col-sm-3">
         <div class="form-group mb-3">
            <label class="label" for="name">Whatsapp</label>
            <input type="text" name="site_whatsapp" class="form-control" placeholder="Whatsapp" value='{{$siteData->site_whatsapp??''}}'>
            <div class="row px-3">
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="Y" name="site_whatsapp_on" id="flexCheckDefault" {{($siteData->site_whatsapp_on??'')=='Y'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckDefault">
                  Ya
                  </label>
               </div>
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="N" name="site_whatsapp_on" id="flexCheckChecked" {{($siteData->site_whatsapp_on??'')=='N'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckChecked">
                  Tidak
                  </label>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-3">
         <div class="form-group mb-3">
            <label class="label" for="name">Email</label>
            <input type="text" name="site_email" class="form-control" placeholder="Email" value="{{$siteData->site_email??''}}" >
            <div class="row px-3">
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="Y" name="site_email_on" id="flexCheckDefault" {{($siteData->site_email_on??'')=='Y'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckDefault">
                  Ya
                  </label>
               </div>
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="N" name="site_email_on" id="flexCheckChecked" {{($siteData->site_email_on??'')=='N'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckChecked">
                  Tidak
                  </label>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-3">
         <div class="form-group mb-3">
            <label class="label" for="name">Instagram</label>
            <input type="text" name="site_instagram" class="form-control" placeholder="Instagram" value="{{$siteData->site_instagram??''}}" >
            <div class="row px-3">
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="Y" name="site_instagram_on" id="flexCheckDefault" {{($siteData->site_instagram_on??'')=='Y'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckDefault">
                  Ya
                  </label>
               </div>
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="N" name="site_instagram_on" id="flexCheckChecked" {{($siteData->site_instagram_on??'')=='N'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckChecked">
                  Tidak
                  </label>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-3">
         <div class="form-group mb-3">
            <label class="label" for="name">Twitter</label>
            <input type="text" name="site_twitter" class="form-control" placeholder="Twitter" value="{{$siteData->site_twitter??''}}" >
            <div class="row px-3">
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="Y" name="site_twitter_on" id="flexCheckDefault" {{($siteData->site_twitter_on??'')=='Y'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckDefault">
                  Ya
                  </label>
               </div>
               <div class="form-check col-md-6">
                  <input class="form-check-input" type="radio" value="N" name="site_twitter_on" id="flexCheckChecked" {{($siteData->site_twitter_on??'')=='N'?'checked':''}} required>
                  <label class="form-check-label" for="flexCheckChecked">
                  Tidak
                  </label>
               </div>
            </div>
         </div>
      </div>
      <div class="d-flex justify-content-start">
         <button type="submit" class="btn btn-success">Simpan</button>
      </div>
   </div>
</form>
<h1 class="text-dark mt-3">Pengaturan Banner</h1>
<form action="/banner/add" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="d-flex justify-content-start">
      <div class="col-md-4">
         <input type="file" name="banner_src" class="form-control" required >
      </div>
      <div>
         <button type="submit" class="btn btn-success">Tambah Banner</button>
      </div>
   </div>
</form>
<div class="row">
   @foreach ($banner as $item)
   <div class="card col-xl-3 col-md-2 col-sm-1 m-2" style="width: 18rem;">
      <img class="card-img-top p-3" src="/{{$item->banner_src}}" alt="Card image cap" style="height: 18vh;object-fit: cover;">
      <div class="d-flex justify-content-end p-3">
         <button type="button" class="btn btn-danger btn-delete" data-id="{{Crypt::encryptString($item->id)}}">Hapus</button>
      </div>
   </div>
   @endforeach
</div>
<h1 class="text-dark mt-3">Pengaturan Foto RT/RW</h1>
<div class="row">
   @foreach ($foto as $item)
   <div class="card col-xl-3 col-md-2 col-sm-1 m-2" style="width: 18rem;">
      <form action="/rt/foto/edit" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="id" value="{{$item->id}}">
            <img class="card-img-top p-3" src="/{{$item->rt_foto_src}}" alt="Card image cap" style="height: 18vh;object-fit: cover;">
            <h4 class="card-title text-dark">{{$item->rt_no=='16'?'RW':'RT'}} {{sprintf('%02d',$item->rt_no)}} - {{$item->rt_name}}</h4>
            <div class="row p-2">
               <input type="file" name="rt_foto_src" class="form-control col-7" required>
               <button type="submit" class="btn btn-primary col-5" data-id="{{Crypt::encryptString($item->id)}}">Ganti Foto</button>
            </div>
         </form>
   </div>
   @endforeach
</div>
<script>
   $('.btn-delete').click(function(){
      if(confirm("Hapus Banner Ini?")){
         $.get('/banner/delete/'+$(this).data('id'),function(){
            location.reload();
         })

      }
   })
</script>
@endsection