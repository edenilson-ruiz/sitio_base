<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AreaAtencionCentro extends Pivot
{
    protected $table = 'area_atencion_centro';

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class,'area_atencion_centro_empleado','area_atencion_centro_id','empleado_id')->withTimestamps();
    }
}
