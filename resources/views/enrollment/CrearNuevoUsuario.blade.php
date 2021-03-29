@extends('layouts.publico')

@section('titulo')
Alta de usuario
@endsection

@section('content')
<section id="AltaUsuario">
  <div class="container">
<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Reingreso de Usuario</h2>

@if(session()->has('mensaje'))
                <div class="alert alert-success">
                    
                    {{ session()->get('mensaje')}}
                </div> 
            @endif 
<p>Elegí un nuevo usuario para ingrear al sistema</p>
<form method="post" enctype="multipart/form-data" action="{{ route('enrollment.grabarUsuarioNuevo', ['id_usuarix'=>$usuario->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-row">       
        <input type="text" name="usuario" id="usuario" class="form-control"  value="{{ old('usuario') }}" placeholder="Ingresar Usuario"   required >
    </div>
    <div class="form-row">
        <label>Repetir Usuario</label>
       <input type="text" name="usuario2" id="usuario2" class="form-control"  value="{{ old('usuario2') }}" placeholder="Repetir Usuario"   required >
    </div>   
   
   
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
    </div>
    
</form>


</div>

</section>
@endsection