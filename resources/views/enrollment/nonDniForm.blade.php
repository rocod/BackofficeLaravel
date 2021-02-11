@extends('layouts.publico')

@section('titulo')
Registro al sitio
@endsection

@section('content')

<h1>Registro al sitio</h1>
<p>Recordá que es fundamental contar con un Mail Válido para el envío de la contraseña provisoria. si no contás con uno aún crealo y volvé a ingresar.</p>
<form method="post" enctype="multipart/form-data" action="{{ route('enrollment.sendToEMAIL') }}">
    @csrf
    <div class="form-row">
        <label>Sí</label>
        <input type="radio" name="tieneDni" id="si" class="form-control"  value="si"   required >
    </div>
    <div class="form-row">
        <label>No</label>
       <input type="radio" name="tieneDni" id="no" class="form-control"  value="no"   required >
    </div>   
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">CONTINUAR</button>
    </div>
    
</form>
@endsection