@extends('pages.guest.infopage')
@section('infocontent')
<div class="row mb-5">
    <div class="col-xl-12">
        <div class="card-body row">
            <div class="col-md-4">
                <img class="card-img-top" src="/{{$dataNews->news_banner}}" alt="Card image cap">
            </div>
            <div class="col-md-8">
                <p class="card-text">
                    {{$dataNews->content}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection