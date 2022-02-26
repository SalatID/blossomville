@extends('index-dash')
@section('webTittle','Data Warga')
 
@section('content')
<div class="row">
    <div class="col-xl-12 table-responsive">
        <table class="table table-striped" id="dataWargas">
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
                            <a href="{{$item->verified==1?'#':'/admin/rt/datawarga/verifikasi/'.Crypt::encryptString($item->id)}}" class="btn btn-{{$item->verified==1?'success':'warning'}}" >{{$item->verified==1?'Sudah di Verifikasi':'Verifikasi Sekarang'}}</button>
                            <a href="/admin/rt/datawarga/{{Crypt::encryptString($item->id)}}" class="btn btn-primary">Detail</a>
                            <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-danger mr-2" onclick="deleteUser(this)">Hapus</a>
                            @if (auth()->user()->level==0)
                                <select name="level" class="form-control" data-id="{{$item->id}}">
                                    <option value="">Update Level</option>
                                    <option {{$item->level == '0'?'selected':''}} value="0">Administrator</option>
                                    <option {{$item->level == '1'?'selected':''}} value="1">Ketua RW</option>
                                    <option {{$item->level == '2'?'selected':''}} value="2">Ketua RT</option>
                                    <option {{$item->level == '3'?'selected':''}} value="3">Warga</option>
                                </select>
                            @endif
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $('#dataWargas').DataTable();
    function deleteUser(e){
        if(confirm("Hapus Warga Ini?")){
            $.get('/user/delete/'+$(e).data('id'),function(d){
                location.reload()
            })
        }
    }
    $('select[name="level"]').change(function(){
        window.location.href = '/user/update/status/'+$(this).data('id')+'/'+$(this).val();
    })
</script>
@endsection