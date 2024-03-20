<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;
    protected $fillable=['nombre','email','telefono','cargo', 'empresa' , 'mensaje', 'tipocontacto' ,'urlweb', 'source'];
}
