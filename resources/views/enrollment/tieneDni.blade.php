@extends('layouts.publico')

@section('titulo')
Tenés DNI
@endsection

@section('content')

<h1>¿Tenés DNI argentino?</h1>
<form method="post" enctype="multipart/form-data" action="{{ route('enrollment.tieneDni') }}">
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