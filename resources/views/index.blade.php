@extends('layout')
@section('title','Profesionales')
@section('content')
<div class="container">
    <div class="card-deck p-5 text-center" >
            <div class="card p-3 border-secondary">
                    <blockquote class="blockquote mb-0 card-body">
                    <i class="fas fa-plus fa-5x"></i>
                      <p>Nueva Solicitud</p>
                    </blockquote>
                  </div>
                  <div class="card p-3 border-secondary">
                        <blockquote class="blockquote mb-0 card-body">
                        <i class="far fa-list-alt fa-5x"></i>
                          <p>Control Diario</p>
                        </blockquote>
                      </div>
        </div>
        <div class="card-deck p-5 text-center">
                <div class="card p-3 border-secondary">
                        <blockquote class="blockquote mb-0 card-body">
                        <i class="fas fa-file-signature fa-5x"></i>
                        <p>Solicitudes</p>
                        </blockquote>
                      </div>
                      <div class="card p-3 border-secondary">
                    <blockquote class="blockquote mb-0 card-body">
                        <i class="far fa-address-card fa-5x"></i>
                        <p>Opciones</p>
                    </blockquote>
                    </div>
            </div>
        </div>
</div>      
@endsection