@extends('layouts.publico')

@section('titulo')
Registro al sitio
@endsection

@section('content')
<section id="nonDniForm">
    <div class="container">
<h1>Registro al sitio</h1>
<p>Recordá que es fundamental contar con un Mail Válido para el envío de la contraseña provisoria. si no contás con uno aún crealo y volvé a ingresar.</p>
@if(session()->has('mensaje'))
                <div class="alert alert-success">
                    
                    {{ session()->get('mensaje')}}
                </div> 
            @endif 

<form method="post" enctype="multipart/form-data" action="{{ route('enrollment.sendToEMAIL') }}">
    @csrf
    <div class="form-row">
        <div class="col-lg-6">
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"  required >
        </div>
        <div class="col-lg-6">
            <label>Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control"    required >
        </div>
    </div>
    <div class="form-row">
        <label>Provincia</label>
       <select class="form-control" name="provincia">
          <option value="CABA">CABA</option>
          <option value="GBA">GBA</option>  
          <option value="Buenos Aires">Bs. As.</option>
          <option value="Catamarca">Catamarca</option>
          <option value="Chaco">Chaco</option>
          <option value="Chubut">Chubut</option>
          <option value="Cordoba">Cordoba</option>
          <option value="Corrientes">Corrientes</option>
          <option value="Entre Rios">Entre Rios</option>
          <option value="Formosa">Formosa</option>
          <option value="Jujuy">Jujuy</option>
          <option value="La Pampa">La Pampa</option>
          <option value="La Rioja">La Rioja</option>
          <option value="Mendoza">Mendoza</option>
          <option value="Misiones">Misiones</option>
          <option value="Neuquen">Neuquen</option>
          <option value="Rio Negro">Rio Negro</option>
          <option value="Salta">Salta</option>
          <option value="San Juan">San Juan</option>
          <option value="San Luis">San Luis</option>
          <option value="Santa Cruz">Santa Cruz</option>
          <option value="Santa Fe">Santa Fe</option>
          <option value="Sgo. del Estero">Sgo. del Estero</option>
          <option value="Tierra del Fuego">Tierra del Fuego</option>
         <option value="Tucuman">Tucuman</option>
       </select>
    </div>   
    <div class="form-row">
        <label>Organización en la que participas</label>
            <input type="text" name="organizacion" id="organizacion" class="form-control"  required >
    </div>
    <div class="col-lg-6">
            <label>Email de contacto</label>
            <input type="email" name="email" id="email" class="form-control"    required >
        </div>
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">CONTINUAR</button>
    </div>
    
</form>
</div>
</section>
@endsection