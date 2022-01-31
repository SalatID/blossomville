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
    

@endsection