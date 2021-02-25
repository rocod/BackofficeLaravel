@extends('layouts.publico')

@section('titulo')
Validación de Datos de DNI
@endsection

@section('content')
<section id="FormValidaRenaper">
  <div class="container">
<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Alta de Usuario</h2>
<form method="post" enctype="multipart/form-data" action="{{ route('enrollment.verificarEnRenaper') }}">
    @csrf
    <div class="form-row">
        <label>DNI</label>
        <input type="text" name="dni" id="dni" class="form-control"  value="{{ old('dni') }}"   required >
    </div>
    <div class="form-row">
        <label>Nro trámite</label>
       <input type="text" name="nroTramite" id="nroTramite" class="form-control"  value="{{ old('nroTramite') }}"   required >
    </div>   
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Verificar</button>
    </div>
    
</form>
</div>
</section>
@endsection