<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TollStation extends Model
{
        protected $table = 'toll_station';

        protected $fillable = [
            'name',
            'city',
            'value'
        ];

        
}
