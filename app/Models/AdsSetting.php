<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsSetting extends Model
{
    use HasFactory;

    protected $table = 'ads_settings';

    protected $fillable = [
        'client_id',
        'slot_id',
        'ad_format',
        'responsive',
        'custom_style',
    ];
}
