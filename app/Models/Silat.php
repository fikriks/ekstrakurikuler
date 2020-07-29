<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Silat extends Model
{
    protected $table = "silat";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
