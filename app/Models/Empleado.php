<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = ['nombre','correo'];

    public function areas_atencion_centro()
    {
        return $this->belongsToMany(AreaAtencionCentro::class,'area_atencion_centro_empleado','empleado_id','area_atencion_centro_id')->withTimestamps();
    }
}
