<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nome',
        'cnpj',
        'telefone',
        'email',
    ];

    protected $hidden = [
        'cnpj',
    ];

    public $timestamps = true;
}