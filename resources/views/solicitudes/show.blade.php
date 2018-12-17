@extends('layout')

@section('title')
Sol N°{{ $solicitud->sol_id }}
@endsection
    
@section('content') 
    @php
    $productos = explode("/", $solicitud->productos);
    $numeros = count($productos);
    //dd($productos);
    @endphp
<div class="container">
        <fieldset disabled>
    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="fecha">Fecha</label>
        <input type="text" class="form-control" id="fecha" placeholder="" value="{{ $solicitud->fecha }}">
      </div>
      <div class="col-md-4 mb-3">
        <label for="cliente">Cliente</label>
        <input type="text" class="form-control" id="cliente" placeholder="" value="{{ $solicitud->nomCli }}">
      </div>
      <div class="col-md-4 mb-3">
        <label for="fecha">Profecional</label>
        <input type="text" class="form-control" id="fecha" placeholder="" value="{{ $solicitud->nomPro }}">
      </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
          <label for="fecha">Vendedor</label>
          <input type="text" class="form-control" id="fecha" placeholder="" value="{{ $solicitud->vendedor }}">
        </div>
        <div class="col-md-4 mb-3">
          <label for="despacho">Despacho</label>
          <input type="text" class="form-control" id="despacho" placeholder="" value="{{ $solicitud->despacho }}">
        </div>
        <div class="col-md-4 mb-3">
          <label for="canaldeventa">Canal de Venta</label>
          <input type="text" class="form-control" id="canaldeventa" placeholder="" value="{{ $solicitud->canaldeventa }}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="total">Total del Pedido</label>
          <input type="text" class="form-control" id="total" placeholder="" value="{{ $solicitud->totalPed }}">
        </div>
        <div class="col-md-3 mb-3">
          <label for="descuento">Descuento</label>
          <input type="text" class="form-control" id="descuento" placeholder="" value="{{ $solicitud->descuento }}">
        </div>
        <div class="col-md-3 mb-3">
          <label for="senia">Seña</label>
          <input type="text" class="form-control" id="senia" placeholder="" value="{{ $solicitud->senia }}">
        </div>
        <div class="col-md-3 mb-3">
            <label for="saldo">Saldo </label>
            <input type="text" class="form-control" id="saldo" placeholder="" value="{{ $solicitud->saldo }}">
          </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" placeholder="" value="{{ $solicitud->estado }}">
        </div>
        <div class="col-md-6 mb-3">
          <label for="subEstado">SubEstado</label>
          <input type="text" class="form-control" id="subEstado" placeholder="" value="{{ $solicitud->subEstado }}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="estado">Detalles</label>
          <textarea name="detalles" id="detalles" class="form-control" rows="3">{{ $solicitud->detalles }}</textarea>
        </div>
        <div class="col-md-6 mb-3">
          <label for="subEstado">Imagen</label>
          <img src="{{$solicitud->imagen}}" alt="" class="img-thumbnail" style="width: 200px">
        </div>
      </div>
    </fieldset>

<table class="table table-sm">
    <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col" colspan="9"><h2>Productos</h2></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Total</th>
            <th scope="col">Aplicacion</th>
            <th scope="col">Opcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Sub Estado</th>
        </tr>
        @php
        for ($i=0; $i <$numeros ; $i++) { 
            $producto = explode(",", $productos[$i]);
            $precioInt = (int) $producto[1];
            $precio = number_format($precioInt,2,",",".");
            $totalInt = (int) $producto[3];
            $total = number_format($totalInt,2,",",".");
            echo "
            <tr>
                <input type='hidden' class='total' value='$producto[3]'><input type='hidden' class='$producto[5]' value='$producto[5]'>
                <th>$producto[0]</th>
                <td>$$precio</td>
                <td>$producto[2]</td>
                <td>$total</td>
                <td>$producto[4]</td>
                <td>$producto[5]</td>
                <td>$solicitud->estado</td>
                <td>$solicitud->subEstado</td>
            </tr>";
        }   
        @endphp
       
    </tbody>
</table>

<h5>Calculo de Subtotales <span id="opcion1" class="badge badge-pill badge-warning"></span><span id="opcion2" class="badge badge-pill badge-warning mr-2"></span><span id="opcion3" class="badge badge-pill badge-warning mr-2"></span></h5>
</div>
<script>
    window.onload = function() {
    var opcion1 = 0;
    var opcion2 = 0;
    var opcion3 = 0;
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
        if (opcion1 != 0) {
            opcion1 = opcion1 + todos;
            $("#opcion1").html("Opcion 1:$"+ opcion1); 
        }
        if (opcion2 != 0) {
            opcion2 = opcion2 + todos;
            $("#opcion2").html("Opcion 2:$"+ opcion2);
        }
        if (opcion3 != 0) {
            opcion3 = opcion3 + todos;
            $("#opcion3").html("Opcion 3:$"+ opcion3);
        } 
    };
</script>
@endsection