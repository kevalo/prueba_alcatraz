<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Formulario;

class FormController extends Controller
{

    /**
     * Muestra el formulario.
     *
     * @return View
     */
    public function main()
    {
        return view('FormController.main', ['departamentos' => Departamento::all()]);
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
	        'nombres' => 'required',
	        'apellidos' => 'required',
	        'departamento' => 'required',
	        'municipio' => 'required',
	        'observaciones' => 'required',
	    ]);

    	$newFormData = Formulario::create($validatedData);
    	if($newFormData){
    		return redirect()->back()->with('successMsg', 'Se guardó el formulario!');
    	}else{
			return redirect()->back()->with('errorMsg', 'No se púdo guardar el formulario');
    	}

    }
}
