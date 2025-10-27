<?php

namespace App\Models\Planificacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ConfiguracionAcademica\Docente;
use App\Models\ConfiguracionAcademica\Grupo;
use App\Models\ConfiguracionAcademica\Aula;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horario';
    protected $primaryKey = 'id_horario';
    public $timestamps = false;

    protected $fillable = [
        'dia', 'hora_inicio', 'hora_fin', 'id_docente', 'id_grupo', 'id_aula'
    ];

    // Relaciones N:1
    public function docente() { return $this->belongsTo(Docente::class, 'id_docente'); }
    public function grupo()   { return $this->belongsTo(Grupo::class, 'id_grupo'); }
    public function aula()    { return $this->belongsTo(Aula::class, 'id_aula'); }
}
