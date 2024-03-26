<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Libro;
use App\Models\LibroAutor;
use App\Models\Autor;

class LibroController extends Controller
{
    //
    
    # Listar Libros
    public function index()
    {
        $libros = Libro::with(['libroAutores'])->get();
        return $libros;
    }

    # Ver un libro
    public function has_One($libroID)
    {
        $libro = Libro::with(['libroAutores'])->find($libroID);

        if (is_null($libro)) {
            return 'El libro no esta en la BD';
        }

        return $libro;
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $libro = Libro::create([
            'titulo' => $params['tittle'],
            'precio' => $params['precio'],
            'fechaPublicacion' => $params['fechaPublicacion']
        ]);

        if (isset($params['autores']) && is_array($params['autores'])) {
            foreach ($params['autores'] as $key => $autor) {
                if (isset($autor['id'])) {
                    LibroAutor::create([
                        'libroID' => $libro->id,
                        'autorID' => $autor['id']
                    ]);
                } else {
                    $autorObj = Autor::create([
                        'nombre' => $autor['nombre'],
                        'biografia' => $autor['biografia']
                    ]);

                    LibroAutor::create([
                        'libroID' => $libro->id,
                        'autorID' => $autorObj->id
                    ]);
                }
            }
        }

        return $libro;
    }

    public function update($id, Request $request)
    {
        $params = $request->all();
        $libro = Libro::find($id)->update([
            'titulo' => $params['tittle'],
            'precio' => $params['precio'],
            'fechaPublicacion' => $params['fechaPublicacion']
        ]);

        return $libro ? 'El libro fue actualizado.': 'Error al actualizar.';
    }

    # Eliminar un libro
    public function destroy($libroID)
    {
        $libro = Libro::find($libroID)->delete();

        if ($libro) {
            return 'Libro eliminado.';
        } else {
            return 'No se pudo eliminar.';
        }
    }
}
