<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    protected $fillable = ['account_id'];

    public function account()
    {
        return $this->belongsTo('\App\Models\Account', 'account_id', 'id');
    }
}
