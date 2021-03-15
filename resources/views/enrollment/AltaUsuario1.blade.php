@extends('layouts.publico')

@section('titulo')
Alta de usuario
@endsection

@section('content')
<section id="AltaUsuario">
  <div class="container">
<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Alta de Usuario</h2>
<p>Recordá que es fundamental contar con un E-mail válido para que te enviemos
la contraseña provisoria. Si no contas con uno, crealo y escribinos
a tejienomatria@mingeneros.gob.ar</p>
<p>{{ $usuario->nombre." ".$usuario->apellido}}<br>
DNI {{$usuario->dni}}<br>
Fecha de Nacimiento {{ $usuario->fecha_nacimiento }}</p>
@if(session()->has('mensaje'))
                <div class="alert alert-success">
                    
                    {{ session()->get('mensaje')}}
                </div> 
            @endif 
<p>Para finalizar indicanos con que usuario querés ingrear al sistema</p>
<form method="post" enctype="multipart/form-data" action="{{ route('enrollment.grabarUsuario', ['id_promotorx'=>$usuario->id_promotorx]) }}">
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