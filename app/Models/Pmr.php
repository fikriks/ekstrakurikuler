<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pmr extends Model
{
    protected $table = "pmr";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
