@extends('index-dash')
@section('webTittle','Aktifitas')
@section('content')
    <div class="d-flex justify-content-start">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAktifitas"><i class="fas fa-plus"></i> Tambah Aktifitas</button>
    </div>
    <div class="row">
        <div class="col-sm-12 mt-4 table-responsive">
            <table class="table table-striped" id="actifitis">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Aktifitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach ($activity as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->activity_date}}</td>
                            <td class="d-flex justify-content-start">
                                <a href="/aktifitas/{{Crypt::encryptString($item->id)}}" target="_blank" class="btn btn-primary mr-2">Preview</a>
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-success mr-2 btn-edit">Edit</a>
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-danger mr-2 btn-delete">Hapus</a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahAktifitas" tabindex="-1" role="dialog" aria-labelledby="tambahAktifitasLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahAktifitasLabel">Tambah Aktifitas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form name="activityName" action="/admin/aktifitas" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="label" for="name">Judul Aktifitas</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul Aktifitas" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Tanggal Aktifitas</label>
                        <input type="date" name="activity_date" class="form-control" placeholder="Tanggal Aktifitas" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Deskripsi</label>
                        <textarea name="description" class="form-control" required></textarea>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Foto</label>
                        <input type="file" name="activity_img" class="form-control" placeholder="Foto Aktifitas" required>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    <script>
        $('#actifitis').DataTable();
        $('.btn-edit').click(function(){
            $.get('/aktifitas/detail/'+$(this).data('id'),function(d){
                $('input[name="title"]').val(d.title)
                $('input[name="activity_date"]').val(d.activity_date)
                $('textarea[name="description"]').val(d.description)
                $('input[name="activity_img"]').attr('required',false)
                $('form[name="activityName"]').attr('action','/admin/aktifitas/update')
                $('<input>').attr({
                    type: 'hidden',
                    name: 'id',
                    value:d.id
                }).appendTo('form');
                $('#tambahAktifitas').modal('show')
            })
        })
        $('.btn-delete').click(function(){
            if(confirm("Hapus Aktifitas Ini?")){
                $.get('/aktifitas/delete/'+$(this).data('id'),function(d){
                    location.reload()
                })
            }
        })
    </script>
@endsection