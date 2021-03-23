@extends('layouts.publico')

@section('titulo')
Login
@endsection

@section('content')


<section id="login">
  <div class="position-left-hand-down"></div>
  <div class="position-right-hand-down"></div>
 <div class="container-fluid ">
      <!-- en el de abajo saco las clases y creo dos nuevas 
     (una para cada div de adentro)-->
    <div class="position-left-hand-up"></div>
    <div class="position-right-hand-up"></div>
   <div class="content-body">
     <div class="title-body">
       <h2 class="subT2 colorBlanco mt-3">Registro Nacional de Promotoras y Promotores
           Territoriales de Género y Diversidad a Nivel
           Comunitario "Tejiendo Matria"
       </h2>
       @if(session()->has('mensaje'))
                <div class="alert alert-success">
                    
                    {{ session()->get('mensaje')}}
                </div> 
            @endif
       <div class="d-block d-sm-none mt-2">
         <img src="img/TejiendoMatriaMovil.svg" >
       </div>
       <p class="parrafoSubti colorBlanco pt-3 d-none d-sm-block">Ingreso al sitio</p>
     </div>
   </div>
   <div class="row">
      <div class="col-lg-4 offset-lg-4 mt-3 text-center ">
        <form>
          <div class="mb-3">            
            <input type="text" class="form-control textoInput" id="usuario" name="usuario" required placeholder="Ingresá tu usuario">           
          </div>
          <div class="mb-3 mt-4">          
            <input type="password" class="form-control textoInput input2" required placeholder="Ingresá tu contraseña">
            <label class="form-check-label olvide mt-1"><a href="#">Olvidé Mi Usuario y/o Contraseña</a></label>
          </div>   
          <!--<div class="g-recaptcha" data-sitekey="6LdRS0EaAAAAANebsnYsfeQ6PDyvpFef9FBo3jNn"></div>  -->              
          <button type="submit" class="btn btn-primary entrar">ENTRAR</button>
        </form>
      </div> 
   </div>
   <div class="row fondo_manos">
      <div class="col-lg-4 offset-lg-4 mt-1 text-center ">
        <p class="parrafoPrimeraVez colorBlanco pt-3">¿Es la primera vez que accedés?</p>
        <div class="btn btn-primary crearUsuario"><a href="{{ route('enrollment.tieneDni') }}">CREAR USUARIO</a></div>
      </div>
   </div>     
 </div> 

@endsection