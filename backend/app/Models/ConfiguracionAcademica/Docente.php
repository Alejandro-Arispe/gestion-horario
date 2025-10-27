<?php

namespace App\Models\ConfiguracionAcademica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docente';
    protected $primaryKey = 'id_docente';
    public $timestamps = false;

    protected $fillable = [
        'ci', 'nombre_completo', 'correo', 'telefono', 'sexo', 'activo', 'id_facultad'
    ];

    public function facultad() {
        return $this->belongsTo(Facultad::class, 'id_facultad'); // Relación N:1
    }
}
