<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importo el modelo
use App\Movie;

class CatalogController extends Controller
{
    public function getIndex(){
		// Me traigo todas las películas del modelo
		$peliculas = Movie::get();

        // Pasarle datos a una vista
        return View('catalog.index', compact('peliculas'));
    }

    public function getShow($id){
		// Uso del método estático find para buscar por id
		$pelicula = Movie::find($id);
		return View('catalog.show', compact('pelicula'));

        // return View('catalog.show')->with('pelicula', $this->arrayPeliculas[$id])->with('pos', $id);
    }

    public function getCreate(){
        return View('catalog.create');
    }

    public function getEdit($id){
		$pelicula = Movie::find($id);
		return View('catalog.create', compact('pelicula'));

        // return View('catalog.create')->with('pelicula', $this->arrayPeliculas[$id]);
    }

    // Para formularios, Laravel genera todos los métodos dentro del objeto Request al darle al submit
    public function postCreate(Request $request){

        // Objeto del modelo Movie
        $peli = new Movie;

        // Relleno datos del objeto con valores del formulario
        $peli->title = $request->title;
        $peli->year = $request->year;
        $peli->director = $request->director;
        $peli->poster = $request->poster;
        $peli->rented = false;
        $peli->synopsis = $request->synopsis;
        $peli->save(); // Ejecuta sentencia preparada

        return redirect('catalog');

        /**
         * OTRA OPCION
         * Movie::create($request->all());
         * todo lo de $peli->title no sería necesario
         * PARA QUE ESTO FUNCIONE, Laravel protege la creación masiva
         * Ir a app > Movie y añadir
         * protected $illable = ['title', 'director', 'year', 'poster', 'synopsis'];
         * donde le pasamos todos los valores que se van a poder modificar
         */
    }

    public function putEdit($id, Request $request){
        $peli = Movie::find($id); // No creo nueva instancia de película, sino que la busco la que hay con ese id

        $peli->title = $request->title;
        $peli->year = $request->year;
        $peli->director = $request->director;
        $peli->poster = $request->poster;
        $peli->synopsis = $request->synopsis;
        $peli->save(); // Ejecuta sentencia preparada

        return redirect('catalog');
    }

    public function putRented($id){
        $peli = Movie::find($id);

        $peli->rented = !$peli->rented;
        $peli->save();

        return redirect('catalog');
    }

    public function deleteMovie($id){
        $peli = Movie::find($id);

        $peli->delete();

        return redirect('catalog');

        /**
         * También se puede hacer inyectando en la funcion directamente el modelo.
         * Internamente Laravel hará el find
         * public function deleteMovie(Movie $peli)
         * y quitando la línea de $peli = Movie::find($id);
         */
    }
}
