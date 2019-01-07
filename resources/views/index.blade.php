@extends('layout')
@section('title','Magrone')
@section('content')
<div class="container">
  <div class="card-deck p-5 text-center" >
    <div id="solicitud" class="card p-3 border-secondary">
      <blockquote class="blockquote mb-0 card-body">
      <i class="fas fa-plus fa-5x"></i>
      <p>Nueva Solicitud</p>
      </blockquote>
    </div>
    <div  id="controlDiario" class="card p-3 border-secondary">
      <blockquote class="blockquote mb-0 card-body">
      <i class="far fa-list-alt fa-5x"></i>
      <p>Control Diario</p>
      </blockquote>
    </div>
  </div>
    <div class="card-deck p-4 text-center">
      <div id="solicitudes" class="card p-3 border-secondary">
        <blockquote class="blockquote mb-0 card-body">
        <i class="fas fa-file-signature fa-5x"></i>
        <p>Solicitudes</p>
        </blockquote>
      </div>
      <div class="card p-3 border-secondary accordion" id="accordionExample">
        <blockquote class="blockquote mb-0 card-body" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <div class="card">
          <div class="card-header" id="headingOne">
              <i class="far fa-address-card fa-5x"></i>
              <p>Opciones</p> 
          </div>
          
        </div> 
        </blockquote>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('productos.index')}}">Productos</a></li>
                <li class="list-group-item"><a href="{{ route('clientes.index')}}">Clientes</a></li>
                <li class="list-group-item"><a href="{{ route('profesionales.index')}}">Profesionales</a></li>
                <li class="list-group-item"><a href="{{ route('vendedores.index')}}">Vendedores</a></li>
                <li class="list-group-item"><a href="{{ route('canalesdeventa.index')}}">Canal de Venta</a></li>
              </ul> 
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#solicitud').on('click', function () {
    location.href= "{{ route('solicitudes.create')}}";
  });
  $('#controlDiario').on('click', function () {
    location.href= "{{ route('paneldecontrol.index')}}";
  });
  $('#solicitudes').on('click', function () {
    location.href= "{{ route('solicitudes.index')}}";
  });
</script>     
@endsection