<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seni extends Model
{
    protected $table = "seni";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
