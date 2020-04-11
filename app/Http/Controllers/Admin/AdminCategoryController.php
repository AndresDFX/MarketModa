<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    //Middleware para controlar el acceso a estas rutas
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $categorias = Category::where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(2 );
        return view ('admin.category.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion deacuerdo al migracion de la peticion
        $request->validate([
            'nombre'=>'required|max:50|unique:categories,nombre',
            'slug' => 'required|max:50|unique:categories,slug',

        ]);

        //Crear una nueva categoria y guardarla en la BD
        $cat = new Category();
        $cat->nombre            = $request->nombre;
        $cat->slug              = $request->slug;
        $cat->descripcion       = $request->descripcion;
        $cat->save();

        return redirect()->route('admin.category.index')->with('datos', 'Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //Hacemos un where dentro de la BD, si existe retornamos la variable en el ambito de la vista y switch de Si
        $cat = Category::where('slug', $slug)->firstOrFail();
        $editar = 'Si';
        return view('admin.category.show', compact('cat', 'editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //Hacemos un where dentro de la BD, si existe retornamos la variable en el ambito de la vista y switch de Si
        $cat = Category::where('slug', $slug)->firstOrFail();
        $editar = 'Si';
        return view('admin.category.edit', compact('cat', 'editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Buscar en la BD por el id
        $cat = Category::findOrFail($id);

        //Validacion deacuerdo al migracion de la peticion
        $request->validate([
            'nombre' => 'required|max:50|unique:categories,nombre'. $cat->id,
            'slug' => 'required|max:50|unique:categories,slug' . $cat->id,

        ]);


        $cat->nombre            = $request->nombre;
        $cat->slug              = $request->slug;
        $cat->descripcion       = $request->descripcion;
        $cat->save();

        return redirect()->route('admin.category.index')->with('datos', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();
        return redirect()->route('admin.category.index')->with('datos', 'Registro eliminado correctamente');
    }


}
