<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $usuarios = Usuario::all();

        return $usuarios;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

      $usuario =  Usuario::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'cedula' => $request->input('cedula'),
            'email' => $request->input('email'),
            'contrasena' => crypt::encrypt($request->input('contrasena'))
        ]);


       



        return $usuario;
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $usuario = Usuario::where('id',$id)->first();
        
      

            



        $datos = [
            "nombre" => $usuario["nombre"],
         "apellido" =>    $usuario["apellido"],
           "cedula" =>  $usuario["cedula"],
           "correo" =>  $usuario["email"],
           "contrasena" => crypt::decrypt($usuario["contrasena"])
            
        ];
        

        return $datos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
     Usuario::find($id)->update([
     "nombre" => $request->nombre,
     "apellido"=> $request->apellido ,
     "cedula"=> $request->cedula ,
     "email"=> $request->email,
     "contrasena" => crypt::encrypt($request->contrasena) 
    ]);

   

        $usuario = Usuario::where('id',$id)->get();

        return $usuario;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario = Usuario::where('id',$id)->get();

    Usuario::find($id)->delete($id);

        return $usuario;
    }


 
   
}
