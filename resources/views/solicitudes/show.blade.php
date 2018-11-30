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
<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col" colspan="9"><h2>{{ $solicitud->tipo }} N° {{ $solicitud->sol_id }}</h2></th>
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
            <th><a class="btn btn-outline-primary" href="{{ route('solicitudes.create') }}">Nueva solicitud</a></th>
        </tr>
        
        @php
        for ($i=0; $i <$numeros ; $i++) { 
            $producto = explode(",", $productos[$i]);
            echo "
            <tr>
                <th>$producto[0]</th>
                <td>$$producto[1]</td>
                <td class='precio'>$producto[2]</td>
                <td class='total'>$producto[3]</td>
                <td>$producto[4]</td>
                <td class='$producto[5]'>$producto[5]</td>
                <td>$solicitud->estado</td>
                <td>$solicitud->subEstado</td>
            </tr>";
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