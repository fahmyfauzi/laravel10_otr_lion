<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        'name',
        'photo',
        'place_of_birth',
        'date_of_birth',
        'phone',
        'company_no_id',
        'last_formal_education'
    ];
}
