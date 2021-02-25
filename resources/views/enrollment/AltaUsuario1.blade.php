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



</div>

</section>
@endsection