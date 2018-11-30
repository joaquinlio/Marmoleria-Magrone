@extends('layout')
@section('title','Panel De Control')
@section('content')
<main role="main" class="container">
    <table class="table table-borderless text-center">
        <thead>
            <tr>
              <th class="text-center" scope="col" colspan="4"><h2>Control Diario</h2></th>
            </tr>
        </thead>
        <tbody>
          <tr class="table-info">
              <th scope="col">Presupuestos</th>
              <th scope="col">Pedidos</th>
              <th scope="col">Finalizados</th>
              <th scope="col">Despacho</th>
          </tr>
          <tr>
            <td><a href="{{ route('ptoEstado.index','a confirmar') }}">A Confirmar</a></td>
            <td><a href="{{ route('pedEstado.index','espera') }}">En Espera</a></td>
            <td><a href="{{ route('pedEstado.index','avisar') }}">A Avisar</a></td>
            <td><a href="{{ route('pedEstado.index','entregar') }}">A Entregar</a></td>
          </tr>
          <tr>
            <td><a href="{{ route('ptoEstado.index','archivado') }}">Archivados</a></td>
            <td><a href="{{ route('pedEstado.index','produccion') }}">En Produccion</a></td>
            <td><a href="{{ route('pedEstado.index','avisado') }}">Avisados</a></td>
            <td><a href="{{ route('pedEstado.index','entregado') }}">Entregados</a></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><a href="{{ route('pedEstado.index','reclamo') }}">Reclamos</a></td>
            <td><a href="{{ route('pedEstado.index','retirar') }}">A Retirar</a></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="{{ route('pedEstado.index','retirado') }}">Retirado</a></td>
          </tr>
        </tbody>
      </table>
</main>                        
@endsection