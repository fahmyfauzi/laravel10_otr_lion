<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtrApplication extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'personnel_id',
        'user_id',
        'authorize_laca_id',
        'mandatory_training_id',
        'ame_license_id',
        'pic_coodinator_id',
        'pic_status',
        'submited_at',
        'pic_check_at'
    ];
}
