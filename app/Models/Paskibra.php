<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paskibra extends Model
{
    protected $table = "paskibra";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
