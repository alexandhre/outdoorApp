@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
      {{ Session::get('success') }}
    </div>

    @endif

    @if (Session::get('danger'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-ban"></i> Erro!</h5>
      {{ Session::get('danger') }}
    </div>
    @endif
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Outdoor</h1>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <hr>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <button onclick="novoOutdoor()" type="button" class="btn btn-block btn-primary btn-sm">Novo Outdoor</button>
              </div>
              <h3 class="card-title">Listagem de Outdoors</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Situação</th>
                    <th>Contratante</th>
                    <th style="width: 10px">Endereço</th>
                    <th style="width: 106px">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($outdoors as $key=>$outdoor)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$outdoor->situacao}}</td>
                    <td>{{$outdoor->contratante}}</td>
                    <td>{{$outdoor->endereco}}</td>
                    <td style="padding-left:32px;align-items: center;justify-content: center;">
                      <a href="{{ url('outapp/outdoor/edit/' . $outdoor->id )}}">
                        <i style="margin-right: 10px;" class="nav-icon fa fa-pencil"></i>
                      </a>
                      <a href="#" id="deletarModal">
                        <i data-target-id="{{ $outdoor->id }}" data-toggle="modal" data-target="#modal-default" class="nav-icon fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>            
          </div>
          <!-- /.card -->
        </div>
      </div>
  </section>
  <!-- /.content -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <form action="{{ route('deleteOut') }}" method="POST">
      @csrf
        <input type="hidden" name="idDelete" id="idDelete"/>
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Exclusão</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Tem certeza que deseja excluir esse outdoor?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
            <button id="btn-confirmar" type="submit" class="btn btn-primary">Confirmar</button>
          </div>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<!-- jQuery -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/dist/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/dist/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/dist/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/dist/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/dist/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/dist/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<script>
  $(document).ready(function() {
    $("#modal-default").on("show.bs.modal", function(e) {
      var id = $(e.relatedTarget).data('target-id');      
      $('#idDelete').val(id);
    });
  });

  function novoOutdoor() {
    window.location.href = "{{ route('createOut') }}";
  }
</script>

@stop