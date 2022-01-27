@extends('index-dash')
@section('webTittle','Testimoni')
@section('content')
    <div class="d-flex justify-content-start">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahTestimoni"><i class="fas fa-plus"></i> Tambah Testimoni</button>
    </div>
    <div class="row">
        <div class="col-sm-12 mt-4 table-responsive">
            <table class="table table-striped" id="testimonis">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Summary</th>
                        <th>Creator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach ($testimoni as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->summary}}</td>
                            <td>{{$item->getcreator->full_name}}</td>
                            <td class="d-flex justify-content-start">
                                @if(auth()->user()->id==$item->created_user)
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-success mr-2 btn-edit">Edit</a>
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-danger mr-2 btn-delete">Hapus</a>
                                @endif
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahTestimoni" tabindex="-1" role="dialog" aria-labelledby="tambahTestimoniLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahTestimoniLabel">Tambah Testimoni</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form name="activityName" action="/admin/testimoni" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="label" for="name">Judul Testimoni</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul Testimoni" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Summary</label>
                        <textarea name="summary" class="form-control" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    <script>
        $('#testimonis').DataTable();
        $('.btn-edit').click(function(){
            $.get('/testimoni/detail/'+$(this).data('id'),function(d){
                $('input[name="title"]').val(d.title)
                $('textarea[name="summary"]').val(d.summary)
                $('form[name="activityName"]').attr('action','/admin/testimoni/update')
                $('<input>').attr({
                    type: 'hidden',
                    name: 'id',
                    value:d.id
                }).appendTo('form');
                $('#tambahTestimoni').modal('show')
            })
        })
        $('.btn-delete').click(function(){
            if(confirm("Hapus Testimoni Ini?")){
                $.get('/testimoni/delete/'+$(this).data('id'),function(d){
                    location.reload()
                })
            }
        })
    </script>
@endsection