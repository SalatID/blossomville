@extends('pages.guest.infopage')
@section('infocontent')
<div class="row mb-5">
    <div class="col-xl-12">
        <img class="card-img-top" src="/{{$dataActivity->activity_img}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$dataActivity->title}}</h5>
            <p class="card-text">{{$dataActivity->description}}</p>
        </div>
    </div>
</div>
<script>
    $('#dataWargas').DataTable();
</script>
@endsection