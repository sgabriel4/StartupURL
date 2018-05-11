<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function showLinks(){
    	$links = \Links::all();
    	echo "<a href='". url('/create') ."'> Acortar mas URL</a>";
    	echo "</br>";
    	echo "</br>";
    	foreach($links as $link){
    		echo "ID: #" . $link->id . " - URL: " . $link->url . " - Enlace Creado: http://localhost:8000/" . $link->codigo . " - Creado el: " . $link->created_at . "</br>";
    	}
    }

    public function redirect($codigo){
    	$link = \Links::where('codigo', $codigo)->first();
    	if(!$link){
    		return "No se encontro el enlace";
    	}else{
    		return \Redirect::to($link->url);
    	}
    }

    public function showForm(){
    	return view('create');
    } 

    public function createLink(Request $request){
    	$url = $request->input('url');
    	$codigo = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

    	if(\Links::where('codigo', $codigo)->first()){
    		return "Error del lado del servidor, intente de nuevo generar un nuevo código.!";
    	}

    	$link = new \Links;
    	$link->url = $url;
    	$link->codigo = $codigo;
    	$link->save();

    	//return \Redirect::to('/');
    	return "<a href='". url('/') . "/" . $link->codigo ."'>Visita el Enlace</a>";
    }
}
