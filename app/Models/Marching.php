<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marching extends Model
{
    protected $table = "marching";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
