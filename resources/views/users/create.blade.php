@extends('layout')

@section('title', "Crear Usuario")
    
@section('content')
    @if ($errors->any())
    {{-- <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>--}}
    @endif
    <h1>crear usuario</h1>
    <form method="POST" action="{{ url('usuarios/crear') }}">
        <input class="form-control" type="text" name="name" id="">
        @if ($errors->has('name'))
            <p>{{ $errors->first('name') }}</p>
        @endif
        <input class="form-control" type="email" name="email" id="">
        <input class="form-control" type="password" name="password" id="">
        <button type="submit">crear usuario</button>
    </form>
     
@endsection