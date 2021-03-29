@extends('layouts.publico')

@section('titulo')
Olvido de Usuario y/o Contraseña
@endsection

@section('content')
<section id="OlvidoPassword">
  <div class="container">
<h1>Registro Nacional de Promotorxs Territoriales de Género y Diversidad a Nivel Comunitario Tejiendo Matria</h1>
<h2>Olvido de Usuario y/o Contraseña</h2>

@if(session()->has('mensaje'))
                <div class="alert alert-success">
                    
                    {{ session()->get('mensaje')}}
                </div> 
            @endif 

<form method="post" enctype="multipart/form-data" action="{{ route('recuperoPass')  }}">
    @csrf
  <div class="form-row">       
        <input type="text" name="nombre" id="nombre" class="form-control"  value="{{ old('nombre') }}" placeholder="Nombre"   required >
    </div>
    <div class="form-row">       
        <input type="text" name="apellido" id="apellido" class="form-control"  value="{{ old('apellido') }}" placeholder="Apellido"   required >
    </div>
    <div class="form-row">       
        <input type="email" name="email" id="email" class="form-control"  value="{{ old('email') }}" placeholder="Email"   required >
    </div>
 <div class="form-row">Si recordás algunos de estos  datos, ingresalo</div>
    <div class="form-row"> 
    <label>Usuario</label>      
        <input type="text" name="usuario" id="usuario" class="form-control"  value="{{ old('usuario') }}" placeholder="Ingresar Usuario"    >
    </div>
    <div class="form-row">
        <label>Contraseña</label>
       <input type="password" name="password" id="password" class="form-control"   placeholder="Contraseñ"    >
    </div>   
   
   
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Continuar</button>
    </div>
    
</form>


</div>

</section>
@endsection