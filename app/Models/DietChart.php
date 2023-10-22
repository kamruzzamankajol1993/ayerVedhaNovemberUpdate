<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'file', 'patient_id','early_morning','brisk_walk','breakfast','lunch','evening','dinner'
    ];
}
