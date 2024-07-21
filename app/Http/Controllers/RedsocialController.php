<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RedsocialController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarios = DB::table('comentarios')
            ->join('users', 'comentarios.id_usuario', '=', 'users.id')
            ->select('users.*', 'comentarios.*')
            ->orderBy('comentarios.id', 'DESC')
            ->get()
            ;

        return view('home.home', [
            'comentarios' => $comentarios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.create', [
            'comentarios' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_usuario = Auth::user()->id;

        Comentarios::create([
            'id_usuario' => $id_usuario,
            'comentario' => $request->comentario
        ]);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comentario = Comentarios::find($id);

        return view('home.edit', [
            'comentario' => $comentario,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comentario = Comentarios::find($id);
        $comentario->update([
            'comentario' => $request->comentario
        ]);

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comentario = Comentarios::find($id);
        $comentario->delete();

        return redirect('home');
    }
}
