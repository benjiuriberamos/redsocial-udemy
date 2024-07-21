<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        /* 1 forma de llenar datos */
        // $comentariosModel = new Comentarios();
        // $comentariosModel->id_usuario = $request->id_usuario;
        // $comentariosModel->comentario = $request->comentario;
        // $comentariosModel->save();

        /* 2 forma de llenar datos */
        // $comentario = Comentarios::create([
        //     'id_usuario' => 1,
        //     'comentario' => 'Micomentario',
        // ]);

        /* 3 forma de llenar datos */
        // $comentario = DB::table('comentarios')->insert([
        //     'id_usuario' => 1,
        //     'comentario' => 'Micomentario mediante query builder',
        // ]);

        return view('home.home');
    }
}
