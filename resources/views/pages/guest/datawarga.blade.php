@extends('pages.guest.infopage')
@section('infocontent')
<div class="row">
    <div class="col-xl-12 table-responsive">
        <table class="table table-striped" id="dataWargas">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach ($dataWarga as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->gender=='male'?'Laki-laki':'Perempuan'}}</td>
                        <td>{{$item->address}} @if($item->art_sts==null), Blok {{$item->block}} No {{$item->house_number}} RT {{$item->getrt->rt_no}}/{{$item->rw}} @endif</td>
                        <td>{{$item->sts}}</td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $('#dataWargas').DataTable();
</script>
@endsection