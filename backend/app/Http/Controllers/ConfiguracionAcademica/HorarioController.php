<?php

namespace App\Http\Controllers\Planificacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planificacion\Horario;

class HorarioController extends Controller
{
    // Mostrar horarios con relaciones
    public function index() {
        return response()->json(Horario::with(['docente', 'grupo', 'aula'])->get());
    }

    // Crear horario
    public function store(Request $request) {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'id_docente' => 'required|exists:docente,id_docente',
            'id_grupo' => 'required|exists:grupo,id_grupo',
            'id_aula' => 'required|exists:aula,id_aula'
        ]);
        $horario = Horario::create($request->all());
        return response()->json($horario, 201);
    }

    // Actualizar horario
    public function update(Request $request, $id) {
        $horario = Horario::findOrFail($id);
        $horario->update($request->all());
        return response()->json($horario);
    }

    // Eliminar horario
    public function destroy($id) {
        Horario::destroy($id);
        return response()->json(['message' => 'Eliminado']);
    }
}
