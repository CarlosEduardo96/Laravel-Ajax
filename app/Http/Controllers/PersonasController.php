<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
class PersonasController extends Controller
{
    public function inicio() {
        $personas=App\Personas::all();
        return view('formulario',compact('personas'));
    }

    public function Request(Request $request){        
        $request->validate([
            '_token'=>'required',
            'nombre' => 'required',
            'edad' => 'required',
            'correo'=> 'required',
            'sexo'=> 'required'
        ]);
        
        $datos=DB::table('personas')->where('email', '=', $request->correo)->get();
        if(count($datos)>0){
            return "duplicado";            
        }
        else{
            $persona=new App\Personas;
            $persona->nombre=$request->nombre;
            $persona->edad=$request->edad;
            $persona->sexo=$request->sexo;
            $persona->email=$request->correo;
            $persona->save();
            return $persona;           
        }
    } 
    
    public function list(){
        $personas=App\Personas::all();
        return view('lista',compact('personas'));
    }


    public function edit(Request $request,$item){
        
        $persona= App\Personas::findOrFail($item);
        $persona->nombre=$request->nombre;
        $persona->edad=$request->edad;
        $persona->sexo=$request->sexo;
        $persona->email=$request->correo;
        $persona->save();
        return $persona;
    }

    public function delete($item){
        
        $persona= App\Personas::findOrFail($item);
        $persona->delete();
        return "¡Datos Eliminados Correctamente!";
    }
}
