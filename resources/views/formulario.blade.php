@extends('plantilla')

@section('contenido')

@if (session('mensajeacuerdo'))
<div class="my-4 alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('mensajeacuerdo') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif
    <h1 class="text-center text-info border-bottom border-primary">Agregar Usuarios</h1>

<form method="POST" class="my-4">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="iditar" id="editar" value=0>
    
        <div class="form-row">
            <div class="form-group col">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" placeholder="Edad" class="form-control">
            </div>
            
        </div>
        <div class="form-row">            
            <div class="form-group col"> 
                <label for="correo">Correo:</label>
                <input type="text" name="correo" id="correo" placeholder="User@gmail.com" class="form-control">
            </div>         
            <div class="form-group col-4">
                <label for="sexo">Sexo:</label>
                <select name="sexo" class="form-control" id="sexo">
                    <option value="FEMENINO">FEMENINO</option>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="OTROS" selected>OTROS</option>
                </select>
            </div>   
        </div>
        <div class="form-row my-4">  
            <div class="form-group">
                <input type="button" value="¡Guardar!" id="guardar" class="btn btn-success">
                
                <input type="reset" value="Limpiar" id="clear" class="btn btn-warning">
            </div>         
        </div>
        
    </form>
    
@endsection