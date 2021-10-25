<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AreaAtencionCentroEmpleado extends Pivot
{
    protected $table = 'area_atencion_centro_empleado';

    protected $primaryKey = 'id'; // or null
}


