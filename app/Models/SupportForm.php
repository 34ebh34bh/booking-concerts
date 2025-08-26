<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportForm extends Model
{
    protected $table = 'support_forms';
    protected $guarded = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function messages() {
        return $this->hasMany(SupportSayForm::class, 'suppform_id');
    }

}
