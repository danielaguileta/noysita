@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Gestion de empleados</h1>
@stop

@section('content')
<div class="col-md-12"><br>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Empleados</h3>
            </div>
            <div class="card-body">
                @csrf
                <div class="card-content">
                    <a class="btn btn-success float-right" href="" data-toggle="modal" data-target="#modalEmpleado">
                        <i class="fas fa-plus"></i>
                        Nuevo Empleado
                        </a>
                        <br>
                        <br>
                </div>


<!-- Modal -->
<div class="modal fade" id="modalEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="">Nombre Cliente</label>
                <input type="text" class="form-control" id="nombre" placeholder="">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="">Identidad</label>
                <input type="text" class="form-control" id="nombre" placeholder="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="">RTN</label>
                <input type="text" class="form-control" id="rtn" placeholder="">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="">Tipo Pago</label>
                <input type="text" class="form-control" id="tipo_pago" placeholder="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="">Direccion</label>
                <textarea class="form-control" rows="3" placeholder=""></textarea>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="">Inicio Contrato</label>
                <input type="date" class="form-control" id="contrato" placeholder="">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                <table id="empleados" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Identidad</th>
                            <th>Edad</th>
                            <th>Genero</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th>Estado Civil</th>
                            <th>Inicio Contrato</th>
                            <th>Salario</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->NOMBRE_CLIENTE}}</td>
                                <td>{{$cliente->IDENTIDAD_CLIENTE}}</td>
                                <td>{{$cliente->RTN_CLIENTE}}</td>
                                <td>{{$cliente->DIRECCION}}</td>
                                <td>{{$cliente->TIPO_PAGO}}</td>
                                <td>{{$cliente->FECHA_INGRESO_CLIENTE}}</td>
                                <td>{{$cliente->FECHA_INGRESO_CLIENTE}}</td>
                                <td>{{$cliente->FECHA_INGRESO_CLIENTE}}</td>
                                <td>{{$cliente->FECHA_INGRESO_CLIENTE}}</td>
                                <td>{{$cliente->FECHA_INGRESO_CLIENTE}}</td>
                                <td width='10px'>
                                <a class="btn btn-warning" href="#">
                                        <i class="far fa-edit">
                                        </i>
                                    </a>
                                    <a class="btn btn-danger">
                                        <i class="fas fa-trash-alt">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">     
@stop

@section('js')
    <script> console.log('Hi!'); </script>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
   <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script> 
   <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> 
   <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.5/dist/bootstrap-validate.js"></script>
<script>
    $(document).ready(function() {
        
    var table = $('#empleados').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        responsive: true
    } );
} );
</script>
<script>
    bootstrapValidate('#nombre', 'alphanum:Please only enter alphanumeric characters!')
</script>
@stop