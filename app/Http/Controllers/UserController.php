<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    /**
     * Muestra todos los elementos presentes en la base de datos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userobj = User::all();
        return $userobj;
    }


    /**
     * Crea un nuevo elemento y lo almacena en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones que nos permitirán si estos datos existen
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $userobj = User::create($request->all());
        return $userobj;
    }

    /**
    * Muestra un elemento específico llamándolo desde su ID.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $userobj = User::find($id);

        return $userobj;
    }

    /**
     * Actualiza un elemento específico llamándolo desde su ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userobj = User::find($id);
        $userobj->update($request->all());

        return $userobj;
    }


    /**
     * Borra el elemento de la base de datos llamándolo desde su ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userobj = User::destroy($id);
        return $userobj;
    }
}
