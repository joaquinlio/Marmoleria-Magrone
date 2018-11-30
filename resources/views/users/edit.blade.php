@extends('layout')

@section('title', "Editar Usuario")
    
@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    @endif
    {{ dd($user) }}
    <h1>Editar usuario</h1>
    <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
        {{ method_field('PUT') }}
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name)  }}">
        <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->email)  }}">
        <input class="form-control" type="password" name="password" id="">
        <button type="submit">Editar usuario</button>
    </form>
     
@endsection