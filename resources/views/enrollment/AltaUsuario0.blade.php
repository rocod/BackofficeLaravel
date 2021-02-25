@extends('layouts.publico')

@section('titulo')
Alta de usuario
@endsection

@section('content')
<section id="AltaUsuario">
  <div class="container">
<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Alta de Usuario</h2>
<p>{{ $usuario->nombre." ".$usuario->apellido}}<br>
DNI {{$usuario->dni}}<br>
Fecha de Nacimiento {{ $usuario->fecha_nacimiento }}</p> 
<p>Los datos son correctos?</p>
<div class="row">
    <div class="col">
        <a>No, son incorrectos</a>  
    </div>
    <div class="col">
    <a href="altaUsuario/{{ $usuario->id }}">Si, continuar</a>  
    </div>
</div>

</div>
</section>
@endsection