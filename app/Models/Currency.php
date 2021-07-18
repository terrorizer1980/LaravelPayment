<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'iso';

    protected $fillable = [
        'iso'
    ];
}
