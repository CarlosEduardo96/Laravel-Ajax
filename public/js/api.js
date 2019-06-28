$(document).ready(function(){
    var tr="<tr>\n";
    var ftr="</tr>\n";
    var td="<td>\n";
    var ftd="<td>\n";
    $('#guardar').click(function(){
            var token=$('#token').val();
            var nombre=$('#nombre').val();
            var edad= $('#edad').val();
            var correo= $('#correo').val();
            var sexo= $('#sexo').val();
            
            console.log(nombre+edad+sexo+correo);
            var edit=$('#editar').val();
            if(edit==0){
                var data = {
                    "_token": token,"nombre": nombre, "edad": edad,
                    "correo": correo, "sexo": sexo
                };            
                $.ajax({
                    type: "POST",
                    url:'http://localhost:8000/guardar',
                    data: data,
                    success: function(respuesta){
                        if(respuesta=="duplicado"){                        
                            alert('¡EL Correo ya esta registrado!');

                        }
                        else{
                            console.log(respuesta);
                            alert("¡Datos guardados con exito!");                            
                            $('#listapersonas').load('/listado');
                        }
                    }
                }).fail(function(respuesta){
                    console.log(respuesta);
                });
            }
            else{                
                var data = {
                    "_token": token,"nombre": nombre, "edad": edad,
                    "correo": correo, "sexo": sexo
                };
                $.ajax({
                    type: 'PUT',
                    url:'http://localhost:8000/'+$('#editar').val(),
                    data: data,
                    success: function(respuesta){                        
                        console.log(respuesta);
                        alert("¡Datos actualizados!");
                        $('#listapersonas').load('/listado');
                    }
                }).fail(function(respuesta){
                    console.log(respuesta);
                });
            }   
    });
    $("#clear").click(function(){
        $('#editar').val(0);
    });
});

function edit(item){
    $('#nombre').val(item.nombre);
    $('#edad').val(item.edad);
    $('#correo').val(item.email);
    $('#sexo').val(item.sexo);
    $('#editar').val(item.id);
    alert("Editando: "+item.id);
}

function del(item){   
    var token=$('#token').val();
    $.ajax({
        url: '/eliminar/'+ item,
        type: 'DELETE',
        data:{ "_token": token },    
        success: function(respuesta){
            alert(respuesta);
            $('#listapersonas').load('/listado');
        }
    });
}


