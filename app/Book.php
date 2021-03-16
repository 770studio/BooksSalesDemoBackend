<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{


    use HasFactory;

    protected $guarded = [];


    public function rents() {
        $this->hasMany(Rent::class);
    }


}
