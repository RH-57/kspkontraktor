<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSocial extends Model
{
    protected $fillable = [
        'name',
        'url',
        'icon',
    ];
}
