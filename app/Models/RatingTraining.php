<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingTraining extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'course',
        'year',
        'otr_application_id',
    ];
}
