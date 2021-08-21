<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'usuarios';

    protected $fillable = [

    'nombre','apellido' ,'cedula','email','contrasena','updated_at','created_at'
    
     ];

   
    
}
