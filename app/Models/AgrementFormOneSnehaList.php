<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgrementFormOneSnehaList extends Model
{
    use HasFactory;

    protected $fillable = [
        'agrement_form_one_id',
        'sneha_name',
        'day_one',
        'day_two',
        'day_three',
        'day_four',
        'day_five',
        'day_six',
        'day_seven',
        'remark',
    ];

    public function agrement_form_ones()
    {
        return $this->belongsTo('App\Models\AgrementFormOne');
    }
}
