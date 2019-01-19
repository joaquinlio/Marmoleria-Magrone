@extends('layout')

@section('title', "Editar Presupuesto")
    
@section('content')
@php
//dd($solicitud->cliente);
$productos = explode("/", $solicitud->productos);
$numeros = count($productos);
@endphp 
<script>
    
</script>
<style>
.custom-file-input ~ .custom-file-label::after {
    content: "Subir Foto";
}
.custom-file-label.selected:lang(en)::after {
  content: "" !important;
}
.aplicacion {
    max-width: 200px;
}
.text-overflow {
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
<div class="container">
<div class="row">
    <h1 class="display-3 mx-auto text-center">Editar Solicitud</h1>
</div>
<div class="row">   
    <div class="col-md-8 order-md-1">
        <h4>Agregar Productos</h4>
        <div class="input-group mb-3">
            <input type="text" name="buscador" id="buscador" class="typeahead form-control mb-3"  placeholder="Buscar Producto/Extra">
                <div class="float-right">
                    <img src="http://localhost/marmoleria/public/imagen/add.png" alt="" data-toggle="modal" data-target="#nuevoProducto">
                </div>
            </div>   
        <table id="presupuestos" class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aplicacion</th>
                    <th scope="col">Opcion</th>
                </tr>
            </thead>
            <tbody> 
                @php
                for ($i=0; $i <$numeros ; $i++) { 
                    $producto = explode(",", $productos[$i]);
                    echo '<tr class="producto" id="row'.$i.'"><td class="nombre">'.$producto[0].'</td><td>'.$producto[1].'</td><td class="cantidad">'.$producto[2].'</td><td class="total">'.$producto[3].'</td><td class="aplicacion"><span class="text-overflow">'.$producto[4].'</td><td class="'.$producto[5].' opcion">'.$producto[5].'<i id="'.$i.'" class="far fa-times-circle btn_remove"></i></td></tr>';
                }   
                @endphp
            </tbody>
        </table>
        <h5>Calculo de Subtotales <span id="opcion1" class="badge badge-pill badge-warning"></span><span id="opcion2" class="badge badge-pill badge-warning"></span><span id="opcion3" class="badge badge-pill badge-warning"></span><span id="opcion4" class="badge badge-pill badge-warning"></span></h5>
        <hr class="mb-4">
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        @endif
            <div class="row justify-content-between">
                <div class="col-6">
                    <h6>Buscar Cliente:</h6>
                    <div class="input-group mb-3">
                        <input type="text" id="buscadorCli" class="typeahead form-control mr-sm-2"  placeholder="Buscar Cliente" autocomplete="off">
                        <div class="float-right">
                            <img src="http://localhost/marmoleria/public/imagen/add.png" alt="" data-toggle="modal" data-target="#nuevoCliente">
                        </div>
                    </div>            
                    <div id="listadoCli">
                            <ul class="list-group lead">
                                <input type="hidden" id="idCli" value="{{ $solicitud->cliente }}">
                                <input type="hidden" id="nomCliente" value="{{ $solicitud->nomCli }}">

                                <li class="list-group-item"><h6 class="my-0">Nombre</h6>{{ $solicitud->Cliente->nombre }}</li>
                                <li class="list-group-item"><h6 class="my-0">Telefono</h6>{{$solicitud->Cliente->telefono1 }}</li>
                                <li class="list-group-item"><h6 class="my-0">Factura</h6>{{ $solicitud->Cliente->factura }}</li>
                            </ul>    
                    </div>           
                </div>
                <div class="col-6">
                    <h6>Buscar profesional:</h6>
                <div class="input-group mb-3">
                    <input type="text" id="buscadorPro" class="typeahead form-control mr-sm-2"  placeholder="Buscar profesional" autocomplete="off">
                    <div class="float-right">
                        <img src="http://localhost/marmoleria/public/imagen/add.png" alt="" data-toggle="modal" data-target="#nuevoprofesional">
                    </div>
                </div>
                <div id="listadoPro">
                        @if ($solicitud->profesional != null)
                        <ul class="list-group lead">
                            <input type="hidden" id="idPro" value="{{ $solicitud->profesional }}">
                            <input type="hidden" id="nomProfesional" value="{{ $solicitud->nomPro }}">
                            <li class="list-group-item"><h6 class="my-0">Nombre</h6>{{ $solicitud->Profesional->nombre }}</li>
                            <li class="list-group-item"><h6 class="my-0">Telefono</h6>{{ $solicitud->Profesional->telefono }}</li>
                            <li class="list-group-item"><h6 class="my-0">Email</h6>{{ $solicitud->Profesional->email }}</li>
                        </ul> 
                        @endif      
                </div>                       
                </div>
            </div>  
    </div>
   <div class="col-md-4 order-md-2 mb-4">  
        <div class="mb-3">
            <label for="vendedor">Vendedor:</label>
                <select name="vendedorSol" id="vendedorSol" class="custom-select mb-3">
                    @foreach($vendedores as $vendedor)
                        @if ($vendedor->nombre == $solicitud->vendedor )
                            <option value="{{ $vendedor->nombre }}" selected>{{ $vendedor->nombre }}</option>
                        @else
                        <option value="{{ $vendedor->nombre }}">{{ $vendedor->nombre }}</option> 
                        @endif              
                    @endforeach
                </select>
            <label for="canalVenta">Canal De Venta:</label>
                <select name="canalventa" id="canalventa" class="custom-select">
                        @foreach($canalesdeventa as $canaldeventa)
                        @if ($canaldeventa->nombre == $solicitud->canaldeventa )
                        <option value="{{ $canaldeventa->nombre }}" selected>{{ $canaldeventa->nombre }}</option>
                        @else
                        <option value="{{ $canaldeventa->nombre }}">{{ $canaldeventa->nombre }}</option> 
                        @endif                 
                        @endforeach                  
                </select> 
            <label for="obras">Obra:</label>
                <input type="text" name="obras" id="obras" class="form-control" value="{{ $solicitud->obra }}">
            <label for="observacion">Observacion:</label>
                <textarea  name="observa" id="observa" class="form-control" rows="3">{{ $solicitud->observacion }}</textarea>
            <label for="">Imagen :</label><br>
                <img src="{{$solicitud->imagen}}" alt="" class="img-thumbnail" style="width: 400px"><br>
        </div>
        <div class="btn-group-vertical btn-group-lg container">
            @if ($solicitud->tipo == "Pedido")
            <button type="button" class="btn btn-outline-info" id="editarPed">Editar Solicitud</button>
            <button type="button" id="imprimirPed" class="btn btn-outline-info mb-3">Guardar/Imprimir PDF</button> 
            @else
            <button type="button" id="agregarPto" class="btn btn-outline-info">Editar Solicitud</button>
            <button type="button" id="imprimirPto" class="btn btn-outline-info">Guardar/Imprimir PDF</button>
            <button type="button" class="btn btn-outline-info" id="editarPed">Cambiar a Pedido</button>
            <button type="button" class="btn btn-outline-info" id="archivar">Archivar</button>     
            @endif  
        </div>          
    </div>
</div> 
</div>
<div class="modal fade" id="cargar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="">Cargar Producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" name="id" id="id">
                        <label>Producto:</label>
                        <input type="text" id="producto" name="producto" class="form-control" autocomplete="off">
                        <label>Precio:</label>
                        <input type="text" id="precio" name="precio" class="form-control" autocomplete="off">
                        <label>Cantidad:</label>
                        <input type="text" id="cantidad" name="cantidad" class="form-control" autocomplete="off">
                        <label>Total:</label>
                        <input type="text" id="total" name="total" class="form-control" autocomplete="off">
                        <label>Aplicacion:</label>
                        <input type="text" id="aplicacion" name="aplicacion" class="form-control" autocomplete="off">
                        <label>Opcion:</label>
                            <select name="opcion" id="opcion" class="custom-select">
                                <option value="Todos">Todos</option>
                                <option value="opcion1" selected>Opcion 1</option>
                                <option value="opcion2">Opcion 2</option>
                                <option value="opcion3">Opcion 3</option>
                                <option value="opcion4">Opcion 4</option>
                            </select>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnAgregar" class="btn btn-outline-success">Agregar</button>
                        <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
            </div>
          </div>
        </div>
      </div>
<div class="modal fade" id="nuevoPed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="">Detalles De Pedido</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="{{ url('solicitudes/updatePedido') }}" enctype="multipart/form-data" method="POST" id="pedido">
                    <div class="form-row">
                        <input type="hidden" name="sol_id" id="sol_id">
                        <input type="hidden" name="cliente" id="cliente">
                        <input type="hidden" name="nomCli" id="nomCli">
                        <input type="hidden" name="vendedor" id="vendedor">
                        <input type="hidden" name="profesional" id="profesional">
                        <input type="hidden" name="nomPro" id="nomPro">
                        <input type="hidden" name="canaldeventa" id="canaldeventa">
                        <input type="hidden" name="obra" id="obra">
                        <input type="hidden" name="observacion" id="observacion">
                        <input type="hidden" name="productos" id="productos">
                        <div class="form-group col-6">
                        <label for="totalPed">Total Del Pedido</label>
                            <input type="text" name="totalPed" id="totalPed" class="form-control">
                        <label for="descuento">Descuento</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">%</span>
                                </div>
                                <input type="text" name="descuento" id="descuento" class="form-control" autocomplete="off">
                            </div>    
                        <label for="seña">Seña</label>
                            <input type="text" name="senia" id="senia" class="form-control" autocomplete="off">
                        <label for="saldo">Saldo</label>
                            <input type="text" name="saldo" id="saldo" class="form-control" autocomplete="off">
                        <label for="detalles">Detalles</label>
                            <textarea  name="detalles" id="detalles" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="imagen">Imagen</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagen" id="imagen" lang="es">
                                    <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
                                </div>
                            <label for="despacho">Despacho</label>
                                <select name="despacho" id="despacho" class="custom-select">
                                    <option value="retirar">A Retirar</option>
                                    <option value="retirado">Retirado</option>
                                    <option value="entregar">A Entregar</option>
                                    <option value="entregado">Entregado</option>
                                </select>
                            <legend class="col-form-label">Estado</legend>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="espera" name="estado" class="custom-control-input" data-toggle="collapse" href="#esperaEst" role="button" aria-expanded="false" aria-controls="esperaEst" value="espera">
                                    <label class="custom-control-label" for="espera"><strong>Espera</strong></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="produccion" name="estado" class="custom-control-input"  data-toggle="collapse" href="#produccionEst" role="button" aria-expanded="false" aria-controls="produccionEst" value="produccion">
                                    <label class="custom-control-label" for="produccion"><strong>Produccion</strong></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="finalizado" name="estado" class="custom-control-input"  data-toggle="collapse" href="#finalizadoEst" role="button" aria-expanded="false" aria-controls="finalizadoEst" value="finalizado">
                                    <label class="custom-control-label" for="finalizado"><strong>Finalizado</strong></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="reclamo" name="estado" class="custom-control-input" data-toggle="collapse" href="#reclamoEst" role="button" aria-expanded="false" aria-controls="reclamoEst"  value="reclamo">
                                    <label class="custom-control-label" for="reclamo"><strong>Reclamo</strong></label>
                                </div>
                                <legend class="col-form-label">Sub Estado</legend>
                                <div class="collapse" id="esperaEst">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="AsignacionDeMateriaPrima" name="subEstado[]" value="Asignacion De Materia Prima">
                                        <label class="custom-control-label" for="AsignacionDeMateriaPrima">Asignacion De Materia Prima</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="Medidas" name="subEstado[]" value="Medidas">
                                        <label class="custom-control-label" for="Medidas">Medidas</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="Planos" name="subEstado[]" value="Planos">
                                        <label class="custom-control-label" for="Planos">Planos</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="DemoraEnObra" name="subEstado[]" value="Demora En Obra">
                                        <label class="custom-control-label" for="DemoraEnObra">Demora En Obra</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="MaterialesPorParteDelCliente" name="subEstado[]" value="Materiales Por Parte Del Cliente">
                                        <label class="custom-control-label" for="MaterialesPorParteDelCliente">Materiales Por Parte Del Cliente</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="Seña" name="subEstado[]" value="Seña">
                                        <label class="custom-control-label" for="Seña">Seña</label>
                                    </div>
                                </div>
                                <div class="collapse" id="produccionEst">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="MesaDeCorte" name="subEstado[]" value="Mesa De Corte">
                                        <label class="custom-control-label" for="MesaDeCorte">Mesa De Corte</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="PulidosyPegados" name="subEstado[]" value="Pulidos y Pegados">
                                        <label class="custom-control-label" for="PulidosyPegados">Pulidos y Pegados</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="Otros" name="subEstado[]" value="Otros">
                                        <label class="custom-control-label" for="Otros">Otros</label>
                                    </div>
                                </div>
                                <div class="collapse" id="finalizadoEst">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="subEstado[]" id="avisar" class="custom-control-input" value="avisar">
                                        <label class="custom-control-label" for="avisar">Avisar</label>
                                    </div>
                                    <!--<div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="Avisar" name="subEstado[]" value="avisar">
                                        <label class="custom-control-label" for="Avisar">Avisar</label>
                                    </div>-->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="subEstado[]" id="avisado" class="custom-control-input" value="avisado">
                                        <label class="custom-control-label" for="avisado">Avisado</label>
                                    </div>
                                    <!--<div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="avisado" name="subEstado[]" value="avisado">
                                        <label class="custom-control-label" for="avisado">Avisado</label>
                                    </div>-->
                                </div>
                                <div class="collapse" id="reclamoEst">
                                    <textarea  name="reclamoDet" id="reclamoDet" class="form-control" rows="3" placeholder="Detallar Reclamo"></textarea>
                                </div> 
                                   
                            </div>
                        </div>                 
                    <div class="modal-footer">
                        <button type="submit" id="btnAgregarPdo" class="btn btn-outline-success">Editar</button>
                        <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div> 
    <div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="">Nuevo Producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('productos/crear') }}">
                        <div class="form-row">
                              <label>Nombre:</label>
                              <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                              <label>Descripcion:</label>
                              <input type="text" id="descripcion" name="descripcion" class="form-control" autocomplete="off">
                              <label>Precio:</label>
                              <input type="text" id="precio" name="precio" class="form-control" autocomplete="off">
                        </div>         
                        <div class="modal-footer">
                            <button type="submit" id="btnEditarST" class="btn btn-outline-success">Agregar</button>
                            <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div> 
    <div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="">Nuevo Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('clientes/crear') }}">
                        <div class="form-row">
                            <div class="form-gruop col-6">
                              <label>Nombre:</label>
                              <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                              <label>Direccion:</label>
                              <input type="text" id="direccion" name="direccion" class="form-control" autocomplete="off">
                              <label>Entre Calles:</label>
                              <input type="text" id="entrecalles" name="entrecalles" class="form-control" autocomplete="off">
                              <label>Observaciones:</label>
                              <input type="text" id="observaciones" name="observaciones" class="form-control" autocomplete="off">
                              <label>Localidad:</label>
                              <input type="text" id="localidad" name="localidad" class="form-control" autocomplete="off">
                              <label>Partido:</label>
                              <input type="text" id="partido" name="partido" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-gruop col-6">    
                              <label>Provincia:</label>
                              <input type="text" id="provincia" name="provincia" class="form-control" autocomplete="off">
                              <label>Telefono1:</label>
                              <input type="text" id="telefono1" name="telefono1" class="form-control" autocomplete="off">
                              <label>Telefono2:</label>
                              <input type="text" id="telefono2" name="telefono2" class="form-control" autocomplete="off">
                              <label>Factura:</label>
                                <select name="factura" id="factura" class="custom-select">
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                              <label>Cuit:</label>
                              <input type="text" id="cuit" name="cuit" class="form-control" autocomplete="off">
                              <label>Razonsocial:</label>
                              <input type="text" id="razonsocial" name="razonsocial" class="form-control" autocomplete="off">
                            </div>
                        </div>         
                        <div class="modal-footer">
                            <button type="submit" id="btnEditarST" class="btn btn-outline-success">Agregar</button>
                            <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div> 
<div class="modal fade" id="nuevoprofesional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="">Nuevo profesional</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('profesionales/crear') }}">
                <div class="form-row">
                    <label>Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                    <label>Telefono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" autocomplete="off">
                    <label>Email:</label>
                    <input type="text" id="email" name="email" class="form-control" autocomplete="off">
                </div>         
                <div class="modal-footer">
                    <button type="submit" id="btnEditarST" class="btn btn-outline-success">Agregar</button>
                    <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>              
<script type="text/javascript">
Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
};
    var path = "{{ route('productos.autocomplete') }}";
    $('#buscador').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        },
        afterSelect: function (item) {
            var data = { nombre : $("#buscador").val() };
                $.ajax({
                    type: "POST",
                    url: '{{ route('productos.obtenerdetalles') }}',
                    data: data,
                    success: function(data) {
                        var obj = JSON.parse(data);
                        //console.log(obj);
                        $("#id").val(obj[0]["id"])                  
                        $("#producto").val(obj[0]["nombre"])
                        $("#precio").val(obj[0]["precio"])
                        $("#cargar").modal('show');
                    }
                })
        }
    })
    $('#cargar').on('hidden.bs.modal', function () {
        $('#producto').val('');
        $('#precio').val('');
        $('#cantidad').val('');
        $('#total').val('');
        $('#aplicacion').val('');
        $('#opcion').val('opcion1');
        $('#buscador').val('');
    });
    var path2 = "{{ route('clientes.autocomplete') }}";
    $('#buscadorCli').typeahead({
    source:  function (query, process) {
    return $.get(path2, { query: query }, function (data) {
            return process(data);
        });
    },
    afterSelect: function (item) {
        var data = { nombre : $("#buscadorCli").val() };
                $.ajax({
                    type: "POST",
                    url: '{{ route('clientes.obtenerdetalles') }}',
                    data: data,
                    success: function(data) {
                        var obj = JSON.parse(data);
                        //console.log(obj);
                        $("#listadoCli").html('<ul class="list-group lead"><input type="hidden" id="idCli" value="'+ obj[0]["id"] +'"><input type="hidden" id="nomCliente" value="'+ obj[0]["nombre"] +'"><li class="list-group-item"><h6 class="my-0">Nombre</h6>'+ obj[0]["nombre"] +'</li><li class="list-group-item"><h6 class="my-0">Telefono</h6>'+ obj[0]["telefono1"] +'</li><li class="list-group-item"><h6 class="my-0">Factura</h6>'+ obj[0]["factura"] +'</li></ul>');
                    }
                })   
    }
    })
    var path3 = "{{ route('profesionales.autocomplete') }}";
    $('#buscadorPro').typeahead({
    source:  function (query, process) {
    return $.get(path3, { query: query }, function (data) {
            return process(data);
        });
    },
    afterSelect: function (item) {
        var data = { nombre : $("#buscadorPro").val() };
                $.ajax({
                    type: "POST",
                    url: '{{ route('profesionales.obtenerdetalles') }}',
                    data: data,
                    success: function(data) {
                        var obj = JSON.parse(data);
                        //console.log(obj);
                        $("#listadoPro").html('<ul class="list-group lead"><input type="hidden" id="idPro" value="'+ obj[0]["id"] +'"><input type="hidden" id="nomProfesional" value="'+ obj[0]["nombre"] +'"><li class="list-group-item"><h6 class="my-0">Nombre</h6>'+ obj[0]["nombre"] +'</li><li class="list-group-item"><h6 class="my-0">Telefono</h6>'+ obj[0]["telefono"] +'</li><li class="list-group-item"><h6 class="my-0">Email</h6>'+ obj[0]["email"] +'</li></ul>');
                    }
                })   
    }
    })
$('#btnAgregar').click(function() {
    var id = $('#id').val();
    var producto = $('#producto').val();
    var precio = $("#precio").val();
    precio = precio.replace(".", "")
    precio = precio.replace(",", ".")
    precio =  parseFloat(precio);
    var cantidad = $('#cantidad').val();
    var total = $('#total').val();
    var aplicacion = $('#aplicacion').val();
    var opcion = $('#opcion').val();
    if (opcion !== "Todos") {
        var clase = opcion;
    }else{
        var clase = "Todos";
    }
  var fila = '<tr class="producto" id="row'+id+'"><td class="nombre">' + producto + '</td><td>' + precio + '</td><td class="cantidad">' + cantidad + '</td><td class="total">' + total + '</td><td class="aplicacion"><span class="text-overflow">' + aplicacion + '</td><td class="'+clase+' opcion">' + opcion + '<i id="' + id + '" class="far fa-times-circle btn_remove"></i></td></tr>';
  $('#cargar').modal('toggle');
  $('#presupuestos tr:last').after(fila);
  i++;
  });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove(); 
        var nFilas = $("#presupuestos tr").length;
    });
    $("#cantidad,#precio").on("change", function(){
        var precio = $("#precio").val();
        precio = precio.replace(".", "")
        precio = precio.replace(",", ".")
        cantidad = $("#cantidad").val();
        //console.log(precio);
        $("#total").val( precio * cantidad);         
    });
    $('#presupuestos').on('DOMSubtreeModified',function() {
        var opcion1 = 0;
        var opcion2 = 0;
        var opcion3 = 0;
        var opcion4 = 0;
        var todos = 0 ;
        $(".Todos").parent("tr").find(".total").each(function() {
            todos += parseFloat($(this).html());
        });
        $(".opcion1").parent("tr").find(".total").each(function() {
            opcion1 += parseFloat($(this).html());
        }); 
        $(".opcion2").parent("tr").find(".total").each(function() {
            opcion2 += parseFloat($(this).html());
        }); 
        $(".opcion3").parent("tr").find(".total").each(function() {
            opcion3 += parseFloat($(this).html());
        });
        $(".opcion4").parent("tr").find(".total").each(function() {
            opcion4 += parseFloat($(this).html());
        });    
            if (opcion1 != 0) {
                opcion1 = opcion1 + todos;
                $("#opcion1").html("Opcion 1:$"+ opcion1); 
            }else{
                $("#opcion1").html("Opcion 1:$");
            }
            if (opcion2 != 0) {
                opcion2 = opcion2 + todos;
                $("#opcion2").html("Opcion 2:$"+ opcion2);
            }else{
                $("#opcion2").html("Opcion 2:$");
            }
            if (opcion3 != 0) {
                opcion3 = opcion3 + todos;
                $("#opcion3").html("Opcion 3:$"+ opcion3);
            }else{
                $("#opcion3").html("Opcion 3:$");
            }
            if (opcion4 != 0) {
                opcion4 = opcion4 + todos;
                $("#opcion4").html("Opcion 4:$"+ opcion4);
            }else{
                $("#opcion4").html("Opcion 4:$");
            }            
  });
    $('#editarPed').click(function() {
        var todos = 0 ;
        var opcion = 0;
        $(".Todos").parent("tr").find(".total").each(function() {
            todos += parseFloat($(this).html());
        });
        $(".opcion1").parent("tr").find(".total").each(function() {
            opcion += parseFloat($(this).html());
        }); 
        $(".opcion2").parent("tr").find(".total").each(function() {
            opcion += parseFloat($(this).html());
        }); 
        $(".opcion3").parent("tr").find(".total").each(function() {
            opcion += parseFloat($(this).html());
        });
        var productos = "";
        var elementosTD = document.getElementsByTagName("td");
        for(i=0;i<elementosTD.length;i++){
            productos += elementosTD[i].textContent;
            productos += ",";
            if (elementosTD[i].textContent == "Todos"  || elementosTD[i].textContent == "opcion1" || elementosTD[i].textContent == "opcion2" || elementosTD[i].textContent == "opcion3") {
            productos+= "/";
            }
        }
        productos = productos.slice(0,-2);
        $("#sol_id").val({{ $solicitud->sol_id }});
        $("#cliente").val($("#idCli").val());
        $("#nomCli").val($("#nomCliente").val());
        $("#nomPro").val($("#nomProfesional").val());
        $("#productos").val(productos);
        $("#profesional").val($("#idPro").val());
        $("#vendedor").val($("#vendedorSol").val());
        $("#canaldeventa").val($("#canalventa").val());
        $("#obra").val($("#obras").val());
        $("#observacion").val($("#observa").val());
        $("#descuento").val({{ $solicitud->descuento }});
        $("#senia").val({{ $solicitud->senia }});
        var despacho;
        if ('{{ $solicitud->despacho }}' == '') {despacho ='entregar'}else{despacho ='{{ $solicitud->despacho }}'}

        $("#despacho").val(despacho);
        $("#detalles").val('{{ $solicitud->detalles }}');
        $("#{{ $solicitud->estado }}").prop("checked", true);
        @php
        if ($solicitud->subEstado != null) {
            $subEstados = str_replace(' ', '', $solicitud->subEstado);
            $subEstados = explode(",", $subEstados);
            $numeros = count($subEstados);
            for ($i=0; $i <$numeros ; $i++) { 
            echo '$("#'.$subEstados[$i].'").prop("checked", true);';
            }       
        }
        @endphp
        $("#totalPed").val(todos + opcion);
        var total = todos + opcion;
        var descuento = total / 100 * $("#descuento").val();
        var seña =  $("#senia").val();
        var saldo = total - descuento ;
        saldo = saldo - seña; 
        $("#saldo").val(saldo.toFixed(2));
        $("#nuevoPed").modal('show');
    });

    $('#agregarPto').click(function() {
        var td = [];
        var productos = "";
        var elementosTD = document.getElementsByTagName("td");
        for(i=0;i<elementosTD.length;i++){
            productos += elementosTD[i].textContent;
            productos += ",";
            if (elementosTD[i].textContent == "Todos"  || elementosTD[i].textContent == "opcion1" || elementosTD[i].textContent == "opcion2" || elementosTD[i].textContent == "opcion3") {
            productos+= "/";
            }
        }
        productos = productos.slice(0,-2);
        //console.log(productos);  
        var sol_id = {{ $solicitud->sol_id }};
        var cliente = $("#idCli").val();
        var profesional;
        (!$("#idPro").val()) ? profesional = null : profesional = $("#idPro").val() ;
        var vendedor = $("#vendedorSol").val();
        var canalventa = $("#canalventa").val();
        var observacion =$("#observa").val();
        var obra = $("#obras").val();
        //console.log(obra);
        td.push({sol_id,productos,cliente,profesional,vendedor,canalventa,obra,observacion});
        var datos = JSON.stringify(td);
        //console.log(datos);
       $.ajax({
            type: "POST",
            url: '{{ route('solicitudes.updatePresupuesto') }}',
            data: datos,
            success: function(data) {
                location.href="http://localhost/marmoleria/public/solicitudes/edit/"+data;        
            }
        })       
    });    
    $('#imprimirPto').click(function() { 
        window.open("http://localhost/marmoleria/public/solicitudes/pto/pdf/{{ $solicitud->sol_id }}");         
    });
    $('#imprimirPed').click(function() {
        window.open("http://localhost/marmoleria/public/solicitudes/ped/pdf/{{ $solicitud->sol_id }}");
    });
    $("#senia,#descuento").on("change", function(){
        var total = $("#totalPed").val();  
        var descuento = total / 100 * $("#descuento").val();
        var seña =  $("#senia").val();
        var saldo = total - descuento ;
        saldo = saldo - seña; 
        $("#saldo").val(saldo);       
    });
    $("#espera").on("click", function(){
        $("#produccionEst").collapse('hide');
        $("#finalizadoEst").collapse('hide');
        $("#reclamoEst").collapse('hide');
        $("#MesaDeCorte").prop("checked", false);
        $("#MesaDeCorte").prop("checked", false);
        $("#PulidosyPegados").prop("checked", false);
        $("#Otros").prop("checked", false);
        $("#avisar").prop("checked", false);
        $("#avisado").prop("checked", false); 
          
    });
    $("#produccion").on("click", function(){
        $("#esperaEst").collapse('hide');
        $("#finalizadoEst").collapse('hide');
        $("#reclamoEst").collapse('hide');
        $("#AsignacionDeMateriaPrima").prop("checked", false);
        $("#Medidas").prop("checked", false);
        $("#Planos").prop("checked", false);
        $("#DemoraEnObra").prop("checked", false);
        $("#MaterialesPorParteDelCliente").prop("checked", false);
        $("#Seña").prop("checked", false);
        $("#avisar").prop("checked", false);
        $("#avisado").prop("checked", false);
    });
    $("#finalizado").on("click", function(){
        $("#esperaEst").collapse('hide');
        $("#produccionEst").collapse('hide');
        $("#reclamoEst").collapse('hide');
        $("#AsignacionDeMateriaPrima").prop("checked", false);
        $("#Medidas").prop("checked", false);
        $("#Planos").prop("checked", false);
        $("#DemoraEnObra").prop("checked", false);
        $("#MaterialesPorParteDelCliente").prop("checked", false);
        $("#Seña").prop("checked", false);
        $("#MesaDeCorte").prop("checked", false);
        $("#MesaDeCorte").prop("checked", false);
        $("#PulidosyPegados").prop("checked", false);
        $("#Otros").prop("checked", false);
    });
    $("#reclamo").on("click", function(){
        $("#esperaEst").collapse('hide');
        $("#produccionEst").collapse('hide');
        $("#reclamoEst").collapse('hide'); 
        $("#finalizadoEst").collapse('hide'); 
        $("#AsignacionDeMateriaPrima").prop("checked", false);
        $("#Medidas").prop("checked", false);
        $("#Planos").prop("checked", false);
        $("#DemoraEnObra").prop("checked", false);
        $("#MaterialesPorParteDelCliente").prop("checked", false);
        $("#Seña").prop("checked", false);
        $("#MesaDeCorte").prop("checked", false);
        $("#MesaDeCorte").prop("checked", false);
        $("#PulidosyPegados").prop("checked", false);
        $("#Otros").prop("checked", false);
        $("#avisar").prop("checked", false);
        $("#avisado").prop("checked", false);   
    });
    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
    
</script>   
@endsection