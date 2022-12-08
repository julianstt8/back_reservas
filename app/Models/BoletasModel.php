<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletasModel extends Model
{
    use HasFactory;
    protected $table = 'res_boletas';
    protected $primary_key = 'id_boleta';
    public $timestamps = false;
}
