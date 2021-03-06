<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class );
    }
    public function user()
    {
        return $this->belongsTo(User::class );
    }

}
