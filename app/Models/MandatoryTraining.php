<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatoryTraining extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'human_factory',
        'sms_training',
        'rvsm_pbn_training',
        'etops_training',
        'rii_training',
    ];
}
