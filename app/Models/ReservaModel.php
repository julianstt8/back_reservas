<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaModel extends Model
{
    use HasFactory;
    protected $table = 'res_reservacion_usuario';
    protected $primary_key = 'id_reservacion';
    public $timestamps = false;
}
