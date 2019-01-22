<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['rate_id', 'user_id', 'key_id' ,'is_paid'];

    public function rate()
    {
        return $this->belongsTo('\App\Models\Rate');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function key()
    {
        return $this->belongsTo('\App\Models\Key');
    }
}
