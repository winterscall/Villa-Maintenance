@extends('template')

@section('content')     
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Pengguna</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    @if(Session::has('msgsave'))
    <!-- Info alert -->
    <div id="alert" class="alert alert-success alert-styled-left alert-arrow-left alert-component animated shake">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
      <h6 class="alert-heading text-semibold">{{Session::get('msgsave')}}</h6>    
    </div>
    <!-- /info alert -->
    @endif
    @if(Session::has('msgedit'))
    <!-- Info alert -->
    <div id="alert" class="alert alert-info alert-styled-left alert-arrow-left alert-component animated shake">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
      <h6 class="alert-heading text-semibold">{{Session::get('msgedit')}}</h6>  
    </div>
    <!-- /info alert -->
    @endif
    @if(Session::has('msgdelete'))
    <!-- Info alert -->
    <div id="alert" class="alert alert-danger alert-styled-left alert-arrow-left alert-component animated shake">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
      <h6 class="alert-heading text-semibold">{{Session::get('msgdelete')}}</h6>
    </div>
    <!-- /info alert -->
    @endif
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Data Pengguna
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Level</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach($users as $u)
              <tr>
                <td>{{$no}}</td>
                <td>{{$u -> user_email}}</td>
                <td>{{$u -> user_name}}</td>
                <td>
                  @if($u -> user_leve == 1)
                    Super Administrator
                  @elseif($u -> user_leve == 2)
                    Administrator
                  @else
                    Operator
                  @endif
                </td>
                <td align="center">
                  <div class="btn-group-vertical">
                    {!! Form::open(array('url' => 'pengguna/'.$u->user_id, 'method' => 'delete')) !!}
                        <a type="button" class="btn btn-default" href="{{url('pengguna/'.$u->user_id.'/edit')}}"><i class="fa fa-edit"> Ubah</i></a>
                        <button type="submit" onclick="return confirm('Apakah anda yakin menghapus data?');" class="btn btn-danger"><i class="fa fa-trash-o"> Hapus</i></button>
                    {!! Form::close() !!}
                  </div>
                </td>
              </tr>
              @php
                $no++;
              @endphp
              @endforeach
            </tbody>
          </table>
          <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#pengguna-menu').addClass('active');

        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@endsection