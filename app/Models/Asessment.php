<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asessment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'quality_inspector_id',
        'assesment_material_1',
        'assesment_material_2',
        'assesment_material_3',
        'assesment_material_4',
        'assesment_material_5',
        'assesment_material_6',
        'assesment_material_7',
        'assesment_material_8',
        'assesment_material_9',
        'asessment_result',
        'status'
    ];
}
