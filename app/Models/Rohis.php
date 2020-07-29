<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rohis extends Model
{
    protected $table = "rohis";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
