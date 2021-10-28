<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaAtencion extends Model
{
    use HasFactory;

    protected $table = 'areas_atencion';

    protected $fillable = ['nombre','descripcion','tiempo_atencion_min'];

    public function centros()
    {
        return $this->belongsToMany(Centro::class)->withTimestamps();
    }
}
