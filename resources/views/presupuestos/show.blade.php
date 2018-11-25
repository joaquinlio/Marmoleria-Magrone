@extends('layout')

@section('title', "Crear Presupuesto")
    
@section('content') 
    @php
    $productos = explode("/", $presupuesto->productos);
    $numeros = count($productos);
    //dd($productos);
    @endphp
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $presupuesto->pto_id }}</h1>
        <p>
            <a class="btn btn-primary" data-toggle="modal" data-target="#nuevoPresupuesto">Nuevo Presupuesto</a>
        </p>
    </div>
<table class="table table-sm">
    <thead class="thead-dark">
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
            echo "<tr><th>$producto[0]</th>
            <td>$$producto[1]</td>
            <td class='precio'>$producto[2]</td>
            <td class='total'>$producto[3]</td>
            <td>$producto[4]</td>
            <td class='$producto[5]'>$producto[5]</td></tr>";
        }   
        @endphp
    
    </tbody>
</table>
<h5>Calculo de Subtotales <span id="opcion1" class="badge badge-pill badge-warning"></span><span id="opcion2" class="badge badge-pill badge-warning mr-2"></span><span id="opcion3" class="badge badge-pill badge-warning mr-2"></span></h5>
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
        console.log(opcion1);
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