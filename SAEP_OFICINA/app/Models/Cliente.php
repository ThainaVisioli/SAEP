<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'endereco',
    ];

    protected $casts = [
        'cpf' => 'encrypted',
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class, 'cliente_id');
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'cliente_id');
    }
}
