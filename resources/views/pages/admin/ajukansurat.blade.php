@extends('index-dash')
@section('webTittle','AjukanSurat')
@section('content')
<form name="activityName" action="/admin/ajukansurat" method="post" enctype="multipart/form-data">
    <div class="row">
            @csrf
            <div class="form-group mb-3 col-md-6">
                <label class="label" for="name">Jenis Surat</label>
                <select name="letter_id" class="form-control" required>
                    <option value="">-Pilih Jenis Surat-</option>
                    @foreach ($letterTypes as $item)
                        <option value="{{$item->id}}">{{$item->letter_name}}</option>
                    @endforeach
                </select>
             </div>
             <div class="form-group mb-3 col-md-6">
                <label class="label" for="name">Surat Untuk</label>
                <div class="input-group input-group-sm mb-3">
                    <input type="hidden" name="letter_for" required>
                    <input type="hidden" name="id_rt" required>
                    <input type="text" class="form-control" name="letter_for_name" required readonly>
                    <div class="input-group-prepend">
                      <span class="input-group-text" data-toggle="modal" data-target="#tambahAjukanSurat" style="cursor: pointer"><i class="fa fa-search"></i> Search</span>
                    </div>
                  </div>
             </div>
             <button type="submit" class="btn btn-primary">Ajukan</button>
            </div>
        </form>
    <div class="row">
        <div class="col-sm-12 mt-4 table-responsive">
            <h3 class="text-dark">Riwayat Pengajuan Surat</h3>
            <table class="table table-striped" id="ajukansurats">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Jenis Surat</th>
                        <th>Surat Untuk</th>
                        <th>Alamat Pemohon</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach ($letterLog as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->letter_no??''}}</td>
                            <td>{{$item->getlettertype->letter_name??''}}</td>
                            <td>{{$item->full_name??''}}</td>
                            <td>{{$item->address}}, Blok {{$item->block}} No {{$item->house_number}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <label class="badge p-2 badge-{{$item->status=='REQ'?'warning':'success'}}">{{$item->status??''}}</label> 
                                {{-- @if (auth()->user()->level!=3) --}}
                                    <a href="/surat/print/{{Crypt::encryptString($item->letter_id)}}/{{Crypt::encryptString($item->id)}}" class="btn btn-success btn-sm btn-print" target="_blank">Cetak Surat</a>
                                {{-- @endif --}}
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahAjukanSurat" tabindex="-1" role="dialog" aria-labelledby="tambahAjukanSuratLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahAjukanSuratLabel">Tambah AjukanSurat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label class="label" for="name">Surat Untuk</label>
                <table class="table table-striped" id="tableUser">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataWarga as $item)
                        <tr>
                            <td> <button type="button" class="btn btn-success btn-pilih" data-nik="{{$item->nik}}" data-fullname="{{$item->full_name}}" data-id="{{$item->id}}" data-rt="{{$item->id_rt}}">Pilih</button></td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->address}}, Block {{$item->block}} No {{$item->house_number}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

    <script>
        $('#ajukansurats').DataTable();
        $('#tableUser').DataTable();
        $('.btn-pilih').click(function(){
            $('input[name="letter_for_name"]').val($(this).data('nik')+' - '+$(this).data('fullname'))
            $('input[name="letter_for"]').val($(this).data('id'))
            $('input[name="id_rt"]').val($(this).data('rt'))
            $('#tambahAjukanSurat').modal('hide')
        })
    </script>
@endsection