<?php

namespace App\Http\Controllers\ConfiguracionAcademica;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConfiguracionAcademica\GestionAcademica;

class GestionController extends Controller
{
    public function index() {
        return response()->json(GestionAcademica::all());
    }

    public function store(Request $request) {
        $request->validate(['nombre' => 'required']);
        $gestion = GestionAcademica::create($request->all());
        return response()->json($gestion, 201);
    }

    public function update(Request $request, $id) {
        $gestion = GestionAcademica::findOrFail($id);
        $gestion->update($request->all());
        return response()->json($gestion);
    }

    // Activar una gestión y desactivar las demás
    public function activar($id) {
        GestionAcademica::query()->update(['activo' => false]);
        $gestion = GestionAcademica::findOrFail($id);
        $gestion->update(['activo' => true]);
        return response()->json(['message' => 'Gestión activada']);
    }
}
