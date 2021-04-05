@extends('layouts.publico')

@section('titulo')
Tenés DNI
@endsection

@section('content')

<section id="tieneDni">
    <div class="title-body">
        <h2 class="subT2 colorBlanco mt-3 align-title">Registro Nacional de Promotoras y Promotores
            Territoriales de Género y Diversidad a Nivel
            Comunitario "Tejiendo Matria"
        </h2>
        @if(session()->has('mensaje'))
                    <div class="alert alert-success">
                        
                        {{ session()->get('mensaje')}}
                    </div> 
                @endif
            <div class="tm-logo-D-hidden">
            </div>
        <p class="parrafoSubti colorBlanco pt-3 d-none d-sm-block">Ingreso al sitio</p>
        <h2 class="subT2 colorBlanco mt-3">¿Tenés DNI argentino?</h2>
    </div>
    <div class="container">
            @if(session()->has('mensaje'))
            <div class="alert alert-success">
                
                {{ session()->get('mensaje')}}
            </div> 
                @endif
            <form method="post" enctype="multipart/form-data" action="{{ route('enrollment.tieneDni') }}">
                @csrf
            <div class="form-row">
                <label class="content-input">
                <input type="radio" name="tieneDni" id="si" class="content-input" value="si"   required >Sí
                <i></i>
                </label>
            </div>           
            <div class="form-row">
                <label>No</label>
            <input type="radio" name="tieneDni" id="no" class="form-control"  value="no"   required >
            </div>         
            <div class="form-row">
                <button type="submit" class="btn btn-primary btn-lg">CONTINUAR</button>
            </div>
        </form>
    </div>
</section>
@endsection