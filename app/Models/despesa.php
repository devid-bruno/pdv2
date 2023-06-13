<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class despesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'quem_pagou',
        'valor',
        'forma_pagamento',
        'categoria',
    ];
}
