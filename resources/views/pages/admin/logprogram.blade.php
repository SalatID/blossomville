@extends('index-dash')
@section('webTittle','Log Program')
 
@section('content')
<div class="row">
    <div class="col-xl-12 table-responsive">
        <table class="table table-striped" id="logPrograms">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Level No</th>
                    <th>Level Name</th>
                    <th>Message</th>
                    <th>File</th>
                    <th>Line</th>
                    <th>IP Address</th>
                    <th>Date</th>
                    <th>Trace</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach ($logProgram as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->level}}</td>
                        <td>{{$item->level_name}}</td>
                        <td>{{$item->message}}</td>
                        <td>{{$item->file}}</td>
                        <td>{{$item->line}}</td>
                        <td>{{$item->ip_address}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <input type="hidden" name="trace" value="{{$item->trace}}">
                            <button type="button" class="btn btn-success btn-sm btn-trace" onclick="showTrace(this)">Trace</button>
                        </td>
                        
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="traceModal" tabindex="-1" role="dialog" aria-labelledby="traceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <textarea name="trace" class="form-control" rows="30" disabled></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
    $('#logPrograms').DataTable();
    function deleteUser(e){
        if(confirm("Hapus Warga Ini?")){
            $.get('/user/delete/'+$(e).data('id'),function(d){
                location.reload()
            })
        }
    }
    function showTrace(e){
        $('textarea[name="trace"]').val($(e).parent().find('input[name="trace"]').val())
        $('#traceModal').modal('show')
    }
</script>
@endsection