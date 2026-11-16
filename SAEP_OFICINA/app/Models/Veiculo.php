<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';

    protected $fillable = [
        'cliente_id',
        'marca',
        'modelo',
        'ano',
        'placa',
        'cor'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'veiculo_id');
    }
}