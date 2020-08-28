<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\CategoriaReceteta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    /**
     * RecetaController constructor.
     */
    public function __construct()
    {

        $this->middleware('auth');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Auth::user()->recetas;
        return view('recetas.index')->with(compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categorias = CategoriaReceta::all(['nombre', 'id']);

        return view('recetas.create')
            ->with(compact('categorias'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            "titulo" => "required|min:3",
            "categoria" => "required",
            "preparacion" => "required",
            "ingredientes" => "required",
            "imagen" => "required|image",
        ]);
        //RETORNA LA RUTA DONDE SE ALMACENA
        $rutaimg = $request["imagen"]->store('upload_recetas', 'public');
        //Resize img
        $img = Image::make(public_path("storage/" . $rutaimg))->fit(1000, 500);
        $img->save();


        \auth()->user()->recetas()->create([
            'titulo' => $data["titulo"],
            "ingredientes" => $data["ingredientes"],
            "preparacion" => $data["preparacion"],
            "imagen" => $rutaimg,
            "categoria_id" => $data["categoria"],

        ]);
        return redirect()->route('recetas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
