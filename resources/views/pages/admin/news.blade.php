@extends('index-dash')
@section('webTittle','Berita')
@section('content')
    <div class="d-flex justify-content-start">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahBerita"><i class="fas fa-plus"></i> Tambah Berita</button>
    </div>
    <div class="row">
        <div class="col-sm-12 mt-4 table-responsive">
            <table class="table table-striped" id="actifitis">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach ($news as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td class="d-flex justify-content-start">
                                <a href="/news/detail/{{Crypt::encryptString($item->id)}}" target="_blank" class="btn btn-primary mr-2">Preview</a>
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-success mr-2 btn-edit">Edit</a>
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-danger mr-2 btn-delete">Hapus</a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahBerita" tabindex="-1" role="dialog" aria-labelledby="tambahBeritaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahBeritaLabel">Tambah Berita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form name="activityName" action="/admin/berita" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="label" for="name">Judul Berita</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul Berita" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Konten</label>
                        <textarea name="content" class="form-control" required></textarea>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Banner</label>
                        <input type="file" name="news_banner" class="form-control" placeholder="Banner" required>
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
            $.get('/berita/detail/'+$(this).data('id'),function(d){
                $('input[name="title"]').val(d.title)
                $('textarea[name="content"]').val(d.content)
                $('input[name="news_banner"]').attr('required',false)
                $('form[name="activityName"]').attr('action','/admin/berita/update')
                $('#tambahBeritaLabel').text('Edit Berita')
                $('<input>').attr({
                    type: 'hidden',
                    name: 'id',
                    value:d.id
                }).appendTo('form');
                $('#tambahBerita').modal('show')
            })
        })
        $('.btn-delete').click(function(){
            if(confirm("Hapus Berita Ini?")){
                $.get('/berita/delete/'+$(this).data('id'),function(d){
                    location.reload()
                })
            }
        })
    </script>
@endsection