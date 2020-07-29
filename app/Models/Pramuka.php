<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pramuka extends Model
{
    protected $table = 'pramuka';

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
