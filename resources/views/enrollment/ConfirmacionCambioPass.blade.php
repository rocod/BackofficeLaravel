@extends('layouts.publico')

@section('titulo')
Confirmación de recupero de contraseña
@endsection

@section('content')
<section id="AltaUsuario">
  <div class="container">
<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Recupero de contraseña</h2>

<p>Te enviamos un email con la contraseña provisoria a {{ $email }}. Si la casilla es incorrecta o no tenés acceso a ella escribinos a tejiendomatria@mingeneros.gob.ar y lo solucionaremos</p>
<a class="btn btn-primary" href="/login2">Iniciar sesión</a>


</div>

</section>
@endsection