<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $guarded = false;

    public function user(){
        return $this->hasMany(User::class);
    }

    public function Booking(){
        return $this->hasMany(Booking::class);
    }
}
