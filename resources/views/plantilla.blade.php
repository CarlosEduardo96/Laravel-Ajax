<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ejemplo Ajax</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegacion -->
    @yield('barramenu')
    <!-- Barra de navegacion -->
    <!-- Cuerpo -->
    <div class="container">
        <div class="row my-5 justify-content-md-center">
            <div class="col-md-8 my-4">
                @yield('contenido')
                <div class="my-4">
                    <h1 class="text-center text-info">Litas de Personas </h1>
                    <table class="table table-hover my-4">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Opcion</th>
                        </tr>
                        </thead>
                        <tbody id="listapersonas">
                            @foreach ($personas as $item)
                            <tr>
                                <th> {{ $item->id }} </th>
                                <td id="nombre{{$item->id}}">{{ $item->nombre }}</td>
                                <td id="edad{{$item->id}}">{{ $item->edad }}</td>
                                <td id="sexo{{$item->id}}">{{ $item->sexo }}</td>
                                <td id="email{{$item->id}}">{{ $item->email }}</td>
                                <td >                                                                          
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <input type="button" value="Editar" onclick="edit({{$item}})" class="btn btn-warning">                
                                        </div>
                                        <div class="form-group col">
                                            <form>
                                                @csrf                                                    
                                                <input type="button" value="Eliminar" onclick="del({{$item->id}})" class="btn btn-danger d-inline"> 
                                            </form>      
                                        </div>
                                    </div>                                                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- fin del cuerlpo -->
    <!-- Pie de pagina -->
    <footer class="py-5 bg-light">
        <div class="container">
            <p class="m-0 text-center text-dark">Copyright &copy;  Charlycode {{ date('Y') }}</p>
        </div>        
    </footer>
    <!-- fin de pie de pagina -->
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/api.js') }}"></script>
</body>
</html>