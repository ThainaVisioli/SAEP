<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';

    protected $fillable = [
        'num_sala',
        'bloco',
        'empresa_id',
    ];

    public $timestamps = true;

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}