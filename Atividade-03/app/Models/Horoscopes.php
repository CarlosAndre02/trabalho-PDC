<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horoscopes extends Model
{
    protected $table = 'horoscopes';
    protected $fillable = ['name'];
}
