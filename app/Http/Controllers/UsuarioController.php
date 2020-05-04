<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.index');
    }   
    
    public function edit()
    {
        return view('usuario.edit');
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function vincularServico(Request $request)
    {        
        dd($request);
        return "";
    }
}
