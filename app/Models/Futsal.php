<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Futsal extends Model
{
    protected $table = "futsal";

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
}
