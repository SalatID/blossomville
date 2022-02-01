@extends('index-dash')
@section('webTittle','Usaha')
@section('content')
    <div class="d-flex justify-content-start">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahUsaha"><i class="fas fa-plus"></i> Tambah Usaha</button>
    </div>
    <div class="row">
        <div class="col-sm-12 mt-4 table-responsive">
            <table class="table table-striped" id="usahas">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Whatsapp Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach ($tokos as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->store_name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->whatsapp_sts=='Y'?'Ya':'Tidak'}}</td>
                            <td class="d-flex justify-content-start">
                                @if(auth()->user()->id==$item->created_user)
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-success mr-2 btn-edit">Edit</a>
                                <a href="#" data-id="{{Crypt::encryptString($item->id)}}" class="btn btn-danger mr-2 btn-delete">Hapus</a>
                                <a href="/admin/usaha/produk/{{Crypt::encryptString($item->id)}}" class="btn btn-primary mr-2 ">Produk</a>
                                @endif
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahUsaha" tabindex="-1" role="dialog" aria-labelledby="tambahUsahaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahUsahaLabel">Tambah Usaha</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form name="activityName" action="/admin/usaha" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="label" for="name">Nama Usaha</label>
                        <input type="text" name="store_name" class="form-control" placeholder="Judul Usaha" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Nomor Telepon (Ex : 62838xxxxxxxx)</label>
                        <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Nomor Terdaftar Whatsapp?</label>
                        <div class="row px-3">
                            <div class="form-check col-md-6">
                               <input class="form-check-input" type="radio" value="Y" name="whatsapp_sts" id="flexCheckDefault" required>
                               <label class="form-check-label" for="flexCheckDefault">
                                 Ya
                               </label>
                             </div>
                             <div class="form-check col-md-6">
                               <input class="form-check-input" type="radio" value="N" name="whatsapp_sts" id="flexCheckChecked" required>
                               <label class="form-check-label" for="flexCheckChecked">
                                 Tidak
                               </label>
                             </div>
                        </div>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Alamat</label>
                        <textarea name="address" class="form-control" required></textarea>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Deskripsi</label>
                        <textarea name="description" class="form-control" required></textarea>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Banner Toko</label>
                        <input type="file" name="store_banner" class="form-control" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="label" for="name">Logo Toko</label>
                        <input type="file" name="store_logo" class="form-control" required>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    <script>
        $('#usahas').DataTable();
        $('.btn-edit').click(function(){
            $.get('/usaha/detail/'+$(this).data('id'),function(d){
                $('input[name="store_name"]').val(d.store_name)
                $('input[name="phone"]').val(d.phone)
                $('input[name="whatsapp_sts"][value="'+d.whatsapp_sts+'"]').attr('checked',true)
                $('textarea[name="address"]').val(d.address)
                $('textarea[name="description"]').val(d.description)
                $('input[name="store_banner"]').attr('required',false)
                $('input[name="store_logo"]').attr('required',false)
                $('form[name="activityName"]').attr('action','/admin/usaha/update')
                $('#tambahUsahaLabel').text('Edit Usaha')
                $('<input>').attr({
                    type: 'hidden',
                    name: 'id',
                    value:d.id
                }).appendTo('form');
                $('#tambahUsaha').modal('show')
            })
        })
        $('.btn-delete').click(function(){
            if(confirm("Hapus Usaha Ini?")){
                $.get('/usaha/delete/'+$(this).data('id'),function(d){
                    location.reload()
                })
            }
        })
    </script>
@endsection