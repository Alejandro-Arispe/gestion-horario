<?php

namespace App\Models\ConfiguracionAcademica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materia';
    protected $primaryKey = 'id_materia';
    public $timestamps = false;

    protected $fillable = ['nombre', 'codigo', 'nivel', 'id_gestion'];

    public function gestion() {
        return $this->belongsTo(GestionAcademica::class, 'id_gestion');
    }
}
