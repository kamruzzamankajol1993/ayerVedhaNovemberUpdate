<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgrementFormOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'opd_no',
        'name',
        'age',
        'gender',
        'diagnosis',
        'physician',
        'dos',
        'doc',
        'poorv_karma',
        'snehpanam',
        'pradhan_karma',
        'blood_pressure',
        'nadi',
        'samyak_lakshana_vegaki',
        'samyak_lakshana_manaki',
        'samyak_lakshana_laingaki',
        'laingaki',
        'type_of_shodhanam',
        'samsarjana_krama',
        'diet_on_day_before',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function agrement_form_one_sneha_lists()
    {
        return $this->hasMany('App\Models\AgrementFormOneSnehaList');
    }

    public function vaman_yoga_lists()
    {
        return $this->hasMany('App\Models\VamanYogaList');
    }
}
