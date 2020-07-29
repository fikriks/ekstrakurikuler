<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volly extends Model
{
    protected $table = "volly";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
