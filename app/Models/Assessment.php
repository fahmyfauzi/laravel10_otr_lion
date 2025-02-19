<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'quality_inspector_id',
        'authorize_laca_id',
        'mandatory_training_id',
        'assessment_material_1',
        'assessment_material_2',
        'assessment_material_3',
        'assessment_material_4',
        'assessment_material_5',
        'assessment_material_6',
        'assessment_material_7',
        'assessment_material_8',
        'assessment_material_9',
        'assessment_material_10',
        'assessment_material_11',
        'assessment_material_12',
        'assessment_result',
        'status',
        'asessed_at',
    ];

    protected $casts = [
        'total_result' => 'float',
    ];

    public function qualityInspector()
    {
        return $this->belongsTo(User::class, 'quality_inspector_id');
    }


    public function authorizeLaca()
    {
        return $this->belongsTo(AuthorizeLaca::class);
    }

    public function mandatoryTraining()
    {
        return $this->belongsTo(MandatoryTraining::class);
    }
}
