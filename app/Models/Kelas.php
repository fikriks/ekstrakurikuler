<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "class";

    public function rohis()
    {
        return $this->hasOne('App\Models\Rohis');
    }
}
