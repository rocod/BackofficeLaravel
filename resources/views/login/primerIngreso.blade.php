@extends('layouts.publico')

@section('titulo')
Alta de usuario
@endsection

@section('content')
<section id="AltaUsuario">
  <div class="container">
<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Ingreso por primera vez</h2>
<p>Te vamos a pedir que cambies tu contraseña</p>

@if(session()->has('mensaje'))
                <div class="alert alert-success">
                    
                    {{ session()->get('mensaje')}}
                </div> 
            @endif 

<form method="post" enctype="multipart/form-data" action="{{ route('login.primerIngreso', ['id_usuarix'=>$usuario->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-row">       
        <input type="text" name="clave" id="clave" class="form-control"  value="{{ old('clave') }}" placeholder="Ingresá tu nueva contraseña"   required >
    </div>
    <div class="form-row">
        <label>Tu contraseña deberá<br> tener entre 8 y 10 caracteres<br>
            Contener al menos una letra y un número.
         </label>
       <input type="text" name="clave2" id="clave2" class="form-control"  value="{{ old('clave2') }}" placeholder="Reingresá tu nueva contraseña"   required >
    </div>   
   
   
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
    </div>
    
</form>


</div>

</section>
@endsection