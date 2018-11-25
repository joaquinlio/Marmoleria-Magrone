@extends('layout')
@section('content')
    <h1>Usuario {{ $user->id }}</h1>
    <p>Nombre de usuario {{ $user->name}}</p>
    <p>Email {{ $user->email}}</p>
@endsection