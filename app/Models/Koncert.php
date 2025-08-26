<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koncert extends Model
{
    protected $table = 'koncerts';
    protected $guarded = false;

    public function users() {
        return $this->hasMany(user::class);
    }
    public function order() {
        return $this->hasMany(order::class);

    }
}
