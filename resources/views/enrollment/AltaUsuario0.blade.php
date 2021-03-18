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
Fecha de Nacimiento {{ $usuario->fecha_nacimiento }}<br>
E-mail: {{$usuario->email}} </p> 
<p>Los datos son correctos?</p>
<div class="row">
    <div class="col">
        <a class="btn btn-danger">No, son incorrectos</a>  
    </div>
    <div class="col">
    <a  class="btn btn-primary" href="/altaUsuario/{{ $usuario->id_promotorx }}">Si, continuar</a>  
    </div>
</div>

</div>
</section>
@endsection