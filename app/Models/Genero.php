<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'generos';
    public $incrementing = false;

    protected $primaryKey = 'id'; // or null
    protected $keyType = 'string';

    protected $fillable = ['id','nombre'];

}
