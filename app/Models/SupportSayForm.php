<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportSayForm extends Model
{
    protected $table = 'support_say_forms';
    protected $guarded = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function supp_form(){
        return $this->belongsTo(SupportForm::class);
    }
}
