<?php

namespace App\Http\Controllers\ConfiguracionAcademica;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConfiguracionAcademica\Docente;

class DocenteController extends Controller
{
    public function index() {
        return response()->json(Docente::with('facultad')->get());
    }

    public function store(Request $request) {
        $request->validate([
            'ci' => 'required|unique:docente',
            'nombre_completo' => 'required',
            'correo' => 'required|email|unique:docente',
            'id_facultad' => 'required|exists:facultad,id_facultad'
        ]);
        $docente = Docente::create($request->all());
        return response()->json($docente, 201);
    }

    public function update(Request $request, $id) {
        $docente = Docente::findOrFail($id);
        $docente->update($request->all());
        return response()->json($docente);
    }

    public function destroy($id) {
        Docente::destroy($id);
        return response()->json(['message' => 'Eliminado']);
    }
}
