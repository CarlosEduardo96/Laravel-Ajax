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