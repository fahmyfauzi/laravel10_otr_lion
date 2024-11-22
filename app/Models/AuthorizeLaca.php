<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizeLaca extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'authorization_date',
        'type',
        'no',
        'validy',
        'mr',
        'rii',
        'etops'
    ];
}
