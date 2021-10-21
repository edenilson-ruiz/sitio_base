<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'centros';

    protected $fillable = ['nombre','codigo','codcent','direccion'];

    public function areas_atencion()
    {
        return $this->belongsToMany(AreaAtencion::class)->withTimestamps();
    }

}
