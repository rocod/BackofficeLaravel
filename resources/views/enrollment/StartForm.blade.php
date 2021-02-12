@extends('layouts.publico')

@section('titulo')
Mensaje Registro al Sitio
@endsection

@section('content')

<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Registro al sitio</h2>
<p>Para verificar tu identidad solicitamos completar el siguiente formulario, con los datos que ingresaste al inscribirte en el Registro. Luego de verificarlos, te enviaremos por mail el usuario y contraseña.</p>
<div class="button"><a href="{{ route('enrollment.nonDniForm') }}">Completar Formulario</a></div>
@endsection